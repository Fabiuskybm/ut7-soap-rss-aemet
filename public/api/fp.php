<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';



// ==================
// |  Cliente SOAP  |
// ==================

$wsdl = 'http://localhost/soap/service.wsdl';

$client = new SoapClient($wsdl, [
    'cache_wsdl' => WSDL_CACHE_NONE,
    'exceptions' => true,
    'encoding' => 'UTF-8',
    'location' => 'http://localhost/soap/index.php',
    'uri' => 'urn:fpsoap',
]);



// ======================
// |  Router del proxy  |
// ======================

$action = getActionOrFail();

switch ($action) {

    case 'departamentos':
        $res = $client->__soapCall('infoDepartamentos', []);
        echo $res->return;
        break;

    case 'nomenclaturas':
        $res = $client->__soapCall('infoNomenclaturas', []);
        echo $res->return;
        break;

    case 'modulo':
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if ($id <= 0) {
            jsonError('Parámetro id obligatorio');
        }

        $res = $client->__soapCall('infoModulo', [['id' => $id]]);
        echo $res->return;
        break;

    default:
        jsonError('Acción no válida');
}
