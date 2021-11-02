<?php
class HomeController extends Controller {
    public function index(): void {
        $this->view("home", ["titulo" => "Bem-vindo ao Mini MVC"]);
    }
}
