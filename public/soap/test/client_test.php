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

    $res = $client->__soapCall('infoModulo', [['id' => 4]]);
    echo $res->return;
} catch (Throwable $e) {
	http_response_code(500);
	header('Content-Type: text/plain; charset=utf-8');
	echo "ERROR:\n" . $e->getMessage();
}