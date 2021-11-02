<?php
require_once "core/Router.php";
require_once "core/Controller.php";
require_once "core/Model.php";
require_once "core/Database.php";

$router = new Router();
$router->add("/", "HomeController@index");
$router->add("/produtos", "ProdutoController@index");
$router->add("/produtos/{id}", "ProdutoController@show");
$router->dispatch($_SERVER["REQUEST_URI"]);
