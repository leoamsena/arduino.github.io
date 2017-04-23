<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 19/04/2017
 * Time: 14:46
 */
/*
 * Método de conexão sem padrões
 */
class Banco{

    public $conn;

    public function conectar()
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch
        (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

}