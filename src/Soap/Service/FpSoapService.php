<?php
declare(strict_types=1);

namespace App\Soap\Service;

use App\Soap\Repository\ModuloRepository;


class FpSoapService
{

    // =========================
    // |  Dependencias / Repo  |
    // =========================

	private ModuloRepository $repo;

	public function __construct()
	{
		$this->repo = new ModuloRepository();
	}



    // ======================
    // |  Operaciones SOAP  |
    // ======================

    /**
     * SOAP: infoModulo
     * - Entrada: wrapper con { id }
     * - Salida: ['return' => '{...json...}']
     */
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

        $module = $this->repo->findById($id);

        if ($module === null) {
            return $this->ret(
                $this->respond(false, [
                    'error' => 'No existe un módulo con ese id'
                ])
            );
        }

        return $this->ret(
            $this->respond(true, [
                'data' => $module
            ])
        );
    }


    /**
     * SOAP: infoDepartamentos
     * - Salida: ['return' => '{...json...}']
     */
    public function infoDepartamentos(): array
    {
        $departments = $this->repo->findDepartments();

        return $this->ret(
            $this->respond(true, [
                'data' => $departments
            ])
        );
    }


    /**
     * SOAP: infoNomenclaturas
     * - Salida: ['return' => '{...json...}']
     */
    public function infoNomenclaturas(): array
    {
        $items = $this->repo->findNomenclatures();

        return $this->ret(
            $this->respond(true, [
                'data' => $items
            ])
        );
    }



    // ========================
    // |  HELPERS (internos)  |
    // ========================

    /**
    * Extrae el id desde el wrapper document/literal:
    * - Si viene como objeto: $req->id
    * - Si viene como valor directo: (int) $req
    */
    private function parseId(mixed $req): int
    {
        return is_object($req) && isset($req->id) ? (int) $req->id : (int) $req;
    }


    /**
    * Genera JSON homogéneo:
    * { ok: true, ... }
    * { ok: false, error: "..." }
    */
    private function respond(bool $ok, array $payload = []): string
    {
        return json_encode(
            array_merge(['ok' => $ok], $payload),
            JSON_UNESCAPED_UNICODE
        );
    }


    /**
    * Wrapper SOAP document/literal:
    * obliga a devolver <return>...</return>
    */
    private function ret(string $json): array 
    { 
        return ['return' => $json]; 
    }

}