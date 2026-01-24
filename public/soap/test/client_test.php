<?php
declare(strict_types=1);

require __DIR__ . '/../../../vendor/autoload.php';

$wsdl = 'http://localhost/soap/service.wsdl';

try {
	$client = new SoapClient($wsdl, [
        'cache_wsdl' => WSDL_CACHE_NONE,
        'trace' => true,
        'exceptions' => true,
        'encoding' => 'UTF-8',
        'location' => 'http://localhost/soap/index.php',
        'uri' => 'urn:fpsoap',
    ]);

	header('Content-Type: text/plain; charset=utf-8');

    $resModules = $client->__soapCall('infoModulo', [['id' => 4]]);
    $resDepartments = $client->__soapCall('infoDepartamentos', []);
    $resNomenclatures = $client->__soapCall('infoNomenclaturas', []);

    echo json_encode([
        'infoModulo' => json_decode($resModules->return, true),
        'infoDepartamentos' => json_decode($resDepartments->return, true),
        'infoNomenclaturas' => json_decode($resNomenclatures->return, true),
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Throwable $e) {
	http_response_code(500);
	header('Content-Type: text/plain; charset=utf-8');
	echo "ERROR:\n" . $e->getMessage();
}