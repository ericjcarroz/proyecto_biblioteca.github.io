<?php 


class Database{


    private $hostname = "localhost";
    private $database = "bd_biblioteca";
    private $username = "root";
    private $password = "root";
    #private $chartset = "utf8";

    function conectar(){
        try {

            $conexion = "mysql:host=".$this->hostname.";dbname=".$this->database;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,

            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);

            return $pdo;

        } catch (PDOException $e) {
            echo "Error conexión". $e->getMessage();
            exit;
        }
    }
}


?>