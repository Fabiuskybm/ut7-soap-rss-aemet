<?php
declare(strict_types=1);

namespace App\Soap\Repository;

use App\Infrastructure\Database;
use PDO;


class ModuloRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }



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
        $result = $stmt->fetch();

        return $result !== false ? $result : null;
    }

}