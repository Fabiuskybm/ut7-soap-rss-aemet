<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';


/**
 * RSS EuropaPress proxy
 * - El navegador llama a /api/rss.php?action=europapress
 * - El backend descarga el XML (evita CORS), parsea y devuelve JSON.
 * - Cache server-side para evitar 429 Too Many Requests.
 */



// ======================
// |  Router del proxy  |
// ======================

$action = getActionOrFail();

switch ($action) {

    case 'europapress': {

        $feedUrl = 'https://www.europapress.es/rss/rss.aspx?ch=00066';

        $cacheFile = sys_get_temp_dir() . '/ut7_rss_europapress.xml';
        $ttlSeconds = 120;

        $xml = getCachedOrFetch($feedUrl, $cacheFile, $ttlSeconds);

        $items = parseRssItems($xml, 20);

        jsonOk([
            'type' => 'items',
            'title' => 'Europa Press - Nacional',
            'items' => $items,
        ]);

        break;
    }

    default:
        jsonError('Acción no válida', 400);
        break;
}



// =============
// |  HELPERS  |
// =============


/**
 * Obtiene el contenido del RSS utilizando un sistema de caché en servidor.
 *
 * - Si existe un fichero de caché reciente (según TTL), se usa directamente.
 * - Si la caché ha expirado, se descarga el RSS desde la fuente original
 *   y se guarda una nueva copia en caché.
 *
 * Este mecanismo evita peticiones excesivas al proveedor RSS
 * y previene bloqueos por rate-limit (HTTP 429).
 */
function getCachedOrFetch(string $url, string $cacheFile, int $ttlSeconds): string
{

    if (is_file($cacheFile) && (time() - filemtime($cacheFile) < $ttlSeconds)) {
        $cached = @file_get_contents($cacheFile);

        if (is_string($cached) && trim($cached) !== '') {
            return $cached;
        }
    }

    $xml = httpGetText($url);

    @file_put_contents($cacheFile, $xml);

    return $xml;
}


/**
 * Realiza una petición HTTP GET y devuelve el contenido como texto.
 *
 * Se utiliza para descargar el feed RSS desde una URL externa.
 * En caso de error de red, timeout o bloqueo,
 * intenta devolver una versión en caché anterior si existe,
 * garantizando que la aplicación siga funcionando.
 */
function httpGetText(string $url): string
{
    $ctx = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => "Accept: application/rss+xml, application/xml, text/xml, */*\r\nUser-Agent: UT7-RSS/1.0\r\n",
            'timeout' => 30,
        ],
    ]);

    $raw = @file_get_contents($url, false, $ctx);


    if ($raw === false || trim($raw) === '') {

        $cacheFile = sys_get_temp_dir() . '/ut7_rss_europapress.xml';

        if (is_file($cacheFile)) {
            $cached = @file_get_contents($cacheFile);

            if (is_string($cached) && trim($cached) !== '') {
                return $cached;
            }
        }

        jsonError('No se pudo descargar el RSS', 502);
    }

    return mb_convert_encoding($raw, 'UTF-8', 'UTF-8, ISO-8859-15, ISO-8859-1');
}


/**
 * Parsea el XML RSS y extrae los elementos <item>.
 *
 * - Convierte el XML en una estructura SimpleXML.
 * - Normaliza los datos relevantes de cada noticia
 *   (título, descripción, enlace, fecha e imagen).
 * - Limita el número de resultados devueltos
 *   para mejorar el rendimiento y la experiencia de usuario.
 */
function parseRssItems(string $xmlString, int $limit = 20): array
{
    libxml_use_internal_errors(true);

    $xml = simplexml_load_string($xmlString);

    if ($xml === false || !isset($xml->channel)) {
        jsonError('RSS inválido (no se pudo parsear XML)', 502);
    }

    $out = [];
    $count = 0;

    foreach ($xml->channel->item as $item) {
        if ($count >= $limit) break;

        $title = trim((string)($item->title ?? ''));
        $link = trim((string)($item->link ?? ''));
        $desc = trim((string)($item->description ?? ''));

        $dateRaw = trim((string) ($item->pubDate ?? ''));
        $date = formatDateEs($dateRaw);

        $img = '';

        if (isset($item->enclosure)) {
            $attrs = $item->enclosure->attributes();
            $type  = (string)($attrs['type'] ?? '');

            if ($type !== '' && str_starts_with($type, 'image/')) {
                $img = (string)($attrs['url'] ?? '');
            }
        }

        if ($title === '' || $link === '') {
            continue;
        }

        $out[] = [
            'title' => $title,
            'description' => $desc,
            'link' => $link,
            'pubDate' => $date,
            'imageUrl' => $img,
        ];

        $count++;
    }

    return $out;
}


/**
 * Formatea una fecha RSS a un formato legible en español.
 *
 * Convierte la fecha original del feed RSS
 * a la zona horaria local y la devuelve
 * en un formato claro y comprensible para el usuario final.
 */
function formatDateEs(string $date): string
{
    if ($date === '') return '';

    try {
        $dt = new DateTime($date);

        $fmt = new IntlDateFormatter(
            'es_ES',
            IntlDateFormatter::NONE,
            IntlDateFormatter::NONE,
            'Europe/Madrid',
            IntlDateFormatter::GREGORIAN,
            "EEEE, d 'de' MMMM 'de' y, HH:mm"
        );

return $fmt->format($dt);

    } catch (Exception $e) {
        return $date;
    }
}


/**
 * Envía una respuesta JSON homogénea indicando éxito.
 *
 * Centraliza el formato de respuesta del backend,
 * devolviendo siempre la clave "ok" junto con los datos,
 * para facilitar el tratamiento uniforme en el frontend.
 */
function jsonOk(array $payload): void
{
    echo json_encode(['ok' => true] + $payload, JSON_UNESCAPED_UNICODE);
}