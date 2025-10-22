<?php
namespace App\Database;
use PDO;
use PDOexception;
/**
 * Capa de Acceso a Datos- Esta capa se encarga únicamente de interactuar con la base de datos (DB).
 * 
 */

 class Db
{
    public $connection;

    public function __construct()
    {
        try {
            $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"];
            $this->connection = new PDO(
                "mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, 
                USER_NAME, 
                PASSWORD,
                $options
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        }
    }

    public function run($query, $args = [])
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($args);
        return $stmt;
    }

    // Nuevo método
    public function findAll(string $table, string $columns = '*'): array
    {
        $query = "SELECT $columns FROM $table";
        $stmt = $this->run($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function close()
    {
        $this->connection = null;
    }
}








?>