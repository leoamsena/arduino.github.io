<?php
/*
 * @description Responsável por requisitar o Controller e a chamada do métodos específicao passado via GET
 * @author Luis Araujo
 * @version 1.0
 */
//require_once("includes/Conexao.php");

$metodo = $_GET['acao'];
$classe = $_GET['classe'];
$controllerClasse = "Controller".$classe;

//Require Controller
require_once("../Controller/" .$controllerClasse. ".php");

/*
echo var_dump($_POST);
echo "<br/>";
echo "Classe == ".$classe." | Metodo == ".$metodo;
echo "<br/>";
*/

//Chamada do metodo
$controllerClasse::getInstance()->$metodo();