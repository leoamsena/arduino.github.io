<?php
function __autoload($class_name) {
    require_once $class_name . '.php';
}

$obj1 = new ProdutoDAO();
$obj1 = new Produto();