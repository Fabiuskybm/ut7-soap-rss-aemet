<?php
declare(strict_types=1);

namespace App\Infrastructure;

use PDO;
use PDOException;


class Database
{

    private static ?Database $instance = null;
    private PDO $connection;

    
    private function __construct()
    {
        $config = require __DIR__ . '/../../config/db.php';

        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";

        try {
            $this->connection = new PDO(
                $dsn,
                $config['user'],
                $config['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );

        } catch (PDOException $e) {
            die('Error BD: ' . $e->getMessage());
        }
    }


    public static function getInstance(): Database 
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        
        return self::$instance;
    }


    public function getConnection(): PDO {
        return $this->connection;
    }

    private function __clone() {}
    public function __wakeup(): void {}
}
