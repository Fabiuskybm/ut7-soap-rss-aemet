<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';

/**
 * Proxy AEMET
 * - El navegador llama a /api/aemet.php?action=...
 * - La API_KEY vive SOLO en backend (env var), nunca en JS.
 *
 * Nota AEMET (importante):
 * - Muchos endpoints devuelven un JSON “envoltorio” con una URL en "datos".
 * - Para texto: 1ª llamada => "datos" (URL /sh/...), 2ª llamada => contenido (a veces texto plano, no JSON).
 */



// ======================
// |  Router del proxy  |
// ======================

$action = getActionOrFail();

switch ($action) {
    case 'isobaras': {
        $apiKey = getAemetApiKeyOrFail();
        $url = aemetApiUrl('mapasygraficos/analisis', $apiKey);

        $res = httpGetJson($url);
        $imageUrl = requireDatosUrl($res, 'isobaras');

        jsonOk([
            'type' => 'image',
            'title' => 'Mapa de isobaras de España',
            'imageUrl' => $imageUrl,
        ]);
        break;
    }

    case 'canarias': {
        $rows = fetchAemetTextRows('prediccion/ccaa/hoy/coo', 'canarias');

        jsonOk([
            'type' => 'table',
            'title' => 'Predicción de Canarias (hoy)',
            'rows' => $rows,
        ]);
        break;
    }

    case 'grancanaria': {
        $rows = fetchAemetTextRows('prediccion/provincia/manana/353', 'gran canaria');

        jsonOk([
            'type' => 'table',
            'title' => 'Predicción de Gran Canaria (mañana)',
            'rows' => $rows,
        ]);
        break;
    }

    default:
        jsonError('Acción no válida', 400);
}



// =============
// |  HELPERS  |
// =============

/**
 * Construye la URL final de la API OpenData de AEMET, incluyendo api_key.
 */
function aemetApiUrl(string $path, string $apiKey): string
{
    return 'https://opendata.aemet.es/opendata/api/' . ltrim($path, '/')
        . '?api_key=' . urlencode($apiKey);
}


/**
 * AEMET 1ª llamada suele devolver un JSON con "datos" (URL).
 * Este helper valida y devuelve esa URL.
 */
function requireDatosUrl(array $res, string $errTag): string
{
    $datosUrl = $res['datos'] ?? null;

    if (!is_string($datosUrl) || $datosUrl === '') {
        jsonError('Respuesta AEMET inválida: falta "datos" (' . $errTag . ')', 502);
    }

    return $datosUrl;
}


/**
 * Request HTTP genérico (GET) con Accept configurable.
 * Devuelve el body como string o lanza jsonError si falla.
 */
function httpGet(string $url, string $acceptHeader): string
{
    $ctx = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => "Accept: {$acceptHeader}\r\n",
            'timeout' => 15,
        ]
    ]);

    $raw = @file_get_contents($url, false, $ctx);

    if ($raw === false) {
        jsonError('No se pudo conectar con AEMET', 502);
    }

    return $raw;
}


/**
 * GET esperando JSON.
 * - Decodifica a array.
 * - Si viene "estado" >= 400, lo tratamos como error.
 */
function httpGetJson(string $url): array
{
    $raw = httpGet($url, 'application/json');

    $data = json_decode($raw, true);

    if (!is_array($data)) {
        jsonError('Respuesta AEMET no es JSON válido', 502);
    }

    if (isset($data['estado']) && (int)$data['estado'] >= 400) {
        $desc = $data['descripcion'] ?? 'Error AEMET';
        jsonError($desc, 502);
    }

    return $data;
}


/**
 * GET para contenido de "datos" (URL /sh/...) que a veces viene como texto plano.
 * Convertimos a UTF-8 por si AEMET responde en ISO-8859-15.
 */
function httpGetText(string $url): string
{
    $raw = httpGet($url, '*/*');

    return mb_convert_encoding($raw, 'UTF-8', 'UTF-8, ISO-8859-15, ISO-8859-1');
}


/**
 * Patrón “predicción de texto”:
 * 1) Llamar al endpoint => JSON con "datos"
 * 2) Llamar a "datos" => texto plano
 * 3) Split por líneas => rows
 */
function fetchAemetTextRows(string $path, string $errTag): array
{
    $apiKey = getAemetApiKeyOrFail();
    $url = aemetApiUrl($path, $apiKey);

    $res1 = httpGetJson($url);
    $datosUrl = requireDatosUrl($res1, $errTag);

    $texto = trim(httpGetText($datosUrl));

    if ($texto === '') {
        jsonError('No se encontró el texto de predicción (' . $errTag . ')', 502);
    }

    $lines = preg_split("/\r\n|\n|\r/", $texto) ?: [];

    return array_values(array_filter(
        array_map('trim', $lines),
        fn($l) => $l !== ''
    ));
}


/**
 * Respuesta JSON OK homogénea para el frontend.
 */
function jsonOk(array $payload): void
{
    echo json_encode(['ok' => true] + $payload);
}