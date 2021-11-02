<?php
class ProdutoController extends Controller {
    private Model $model;
    public function __construct() {$this->model = new Model();}
    public function index(): void {
        $produtos = $this->model->findAll("produtos");
        $this->view("produtos", ["produtos" => $produtos]);
    }
    public function show(int $id): void {
        $produto = $this->model->findById("produtos", $id);
        $this->json($produto ?? ["erro" => "Produto nao encontrado"]);
    }
}
