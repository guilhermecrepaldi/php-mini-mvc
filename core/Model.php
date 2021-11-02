<?php
class Model {
    protected Database $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function findAll(string $table): array {
        return $this->db->query("SELECT * FROM $table ORDER BY id DESC")->fetchAll();
    }
    
    public function findById(string $table, int $id): ?array {
        $stmt = $this->db->query("SELECT * FROM $table WHERE id = ?", [$id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }
}
