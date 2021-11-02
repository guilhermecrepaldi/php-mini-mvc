<?php
class Database {
    private static ?Database $instance = null;
    private PDO $pdo;
    
    private function __construct() {
        $this->pdo = new PDO(
            "mysql:host=localhost;dbname=mvc_app;charset=utf8",
            "root", "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    
    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function query(string $sql, array $params = []): PDOStatement {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
    
    public function lastInsertId(): int {
        return (int)$this->pdo->lastInsertId();
    }
}
