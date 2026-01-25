<?php
declare(strict_types=1);

namespace App\Soap\Repository;

use App\Infrastructure\Database;
use PDO;


class ModuloRepository
{

    // =========================
    // |  Conexión a DB (PDO)  |
    // =========================

    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }



    // ==========================
    // |  Consultas de MÓDULOS  |
    // ==========================

    /**
    * Obtiene un módulo completo por su ID.
    * Usado por el servicio SOAP: infoModulo
    *
    * return => datos completos del módulo o null si no existe
    */
    public function findById(int $id): ?array
    {
        $sql = "
            SELECT *
            FROM modulos
            WHERE id = :id
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result !== false ? $result : null;
    }


    // ================================
    // |  Consultas de DEPARTAMENTOS  |
    // ================================

    /**
    * Obtiene el listado de departamentos sin duplicados.
    * Usado por el servicio SOAP: infoDepartamentos
    *
    * return => Lista de nombres de departamentos
    */
    public function findDepartments(): array
    {
        $sql = "SELECT DISTINCT departamento FROM modulos";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return $result !== false ? $result : [];
    }


    // ================================
    // |  Consultas de NOMENCLATURAS  |
    // ================================

    /**
    * Obtiene las nomenclaturas de los módulos con datos mínimos
    * para construir la interfaz (listado + selección).
    *
    * Usado por el servicio SOAP: infoNomenclaturas
    *
    * return => Lista de módulos con id, departamento, curso y nomenclatura
    */
    public function findNomenclatures(): array
    {
        $sql = "
            SELECT
                id,
                departamento,
                curso,
                nomenclatura_modulo
            FROM modulos
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result !== false ? $result : [];
    }

}