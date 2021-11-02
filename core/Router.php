<?php
class Router {
    private array $routes = [];
    
    public function add(string $path, string $handler): void {
        $this->routes[$path] = $handler;
    }
    
    public function dispatch(string $uri): void {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, "/") ?: "/";
        
        foreach ($this->routes as $path => $handler) {
            $pattern = preg_replace("/\{(\w+)\}/", "(?P<$1>[^/]+)", $path);
            $pattern = "#^" . $pattern . "$#";
            
            if (preg_match($pattern, $uri, $matches)) {
                [$controller, $action] = explode("@", $handler);
                $controller = new $controller();
                $params = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
                $controller->$action(...$params);
                return;
            }
        }
        http_response_code(404);
        echo "404 - Pagina nao encontrada";
    }
}
