<?php
declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use App\Soap\Service\FpSoapService;


header('Content-Type: text/xml; charset=utf-8');

$wsdl = __DIR__ . '/service.wsdl';

try {
	$server = new SoapServer($wsdl, [
		'cache_wsdl' => WSDL_CACHE_NONE,
		'encoding' => 'UTF-8',
	]);

	$server->setObject(new FpSoapService());
	$server->handle();

} catch (Throwable $e) {
	throw new SoapFault('Server', $e->getMessage());
}