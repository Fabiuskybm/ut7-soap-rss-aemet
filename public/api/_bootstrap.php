<?php
declare(strict_types=1);


require __DIR__ . '/../../vendor/autoload.php';

header('Content-Type: application/json; charset=utf-8');



/**
 * Respuesta de error JSON estándar y fin de ejecución.
 */
function jsonError(string $message, int $code = 400): void
{
    http_response_code($code);

    echo json_encode([
        'ok'    => false,
        'error' => $message,
    ]);

    exit;
}



if (basename($_SERVER['SCRIPT_NAME']) === '_bootstrap.php') {
    jsonError('Recurso no disponible', 404);
}



/**
 * Devuelve el parámetro action o corta la ejecución si no existe.
 */
function getActionOrFail(): string
{
    $action = $_GET['action'] ?? null;

    if ($action === null || $action === '') {
        jsonError('Parámetro action obligatorio');
    }

    return $action;
}



/**
 * Devuelve la API_KEY de AEMET o corta la ejecución si no está configurada.
 */
function getAemetApiKeyOrFail(): string
{
    $apiKey = getenv('AEMET_API_KEY');

    if ($apiKey === false || trim($apiKey) === '') {
        jsonError('AEMET_API_KEY no configurada en el entorno', 500);
    }

    return $apiKey;
}