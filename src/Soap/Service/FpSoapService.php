<?php
declare(strict_types=1);

namespace App\Soap\Service;

use App\Soap\Repository\ModuloRepository;


class FpSoapService
{
	private ModuloRepository $repo;

	public function __construct()
	{
		$this->repo = new ModuloRepository();
	}


    public function infoModulo(mixed $req): array
    {
        $id = $this->parseId($req);

        if ($id <= 0) {
            return $this->ret(
                $this->respond(false, [
                    'error' => 'El id debe ser un entero positivo'
                ])
            );
        }

        $modulo = $this->repo->findById($id);

        if ($modulo === null) {
            return $this->ret(
                $this->respond(false, [
                    'error' => 'No existe un módulo con ese id'
                ])
            );
        }

        return $this->ret(
            $this->respond(true, [
                'data' => $modulo
            ])
        );
    }




    // =============
    // |  HELPERS  |
    // =============

    private function parseId(mixed $req): int
    {
        return is_object($req) && isset($req->id) ? (int) $req->id : (int) $req;
    }


    private function respond(bool $ok, array $payload = []): string
    {
        return json_encode(
            array_merge(['ok' => $ok], $payload),
            JSON_UNESCAPED_UNICODE
        );
    }


    private function ret(string $json): array 
    { 
        return ['return' => $json]; 
    }

}