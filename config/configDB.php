<?php

class configDB {
    private static ?PDO $instance = null;
    private static string $host;
    private static string $user;
    private static string $pass;

    public function __construct() {
        if (!isset(self::$instance)) {
            $this->getValues();
            $this->connect();
        }
    }

    private function connect(): void {
        try {
            self::$instance = new PDO(
                self::$host, 
                self::$user, 
                self::$pass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            throw new PDOException("Error de conexión: " . $e->getMessage());
        }
    }

    private function getValues(): void {
       
        if (getenv('DB_HOST')) {
            $host = getenv('DB_HOST');
            $name = getenv('DB_NAME');
            $user = getenv('DB_USER');
            $pass = getenv('DB_PASSWORD');
            $port = getenv('DB_PORT') ?: 3306;

            
            self::$host = "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4";
            self::$user = $user;
            self::$pass = $pass;

        } else {
            
            $conf = parse_ini_file('config.ini', true);
            self::$host = $conf['DATABASE']['host'];
            self::$user = $conf['DATABASE']['user'];
            self::$pass = $conf['DATABASE']['pass'];
        }
    }

    public function getInstance(): PDO {
        if (!isset(self::$instance)) {
            new self();
        }
        return self::$instance;
    }
}
?>