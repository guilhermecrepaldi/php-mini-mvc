<?php
class Controller {
    protected function view(string $name, array $data = []): void {
        extract($data);
        require_once "app/views/" . $name . ".php";
    }
    
    protected function json(array $data): void {
        header("Content-Type: application/json");
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    
    protected function redirect(string $url): void {
        header("Location: " . $url);
        exit;
    }
}
