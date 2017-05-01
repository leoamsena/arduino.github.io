<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 30/04/2017
 * Time: 19:45
 */
require_once (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Controller/includes/Singleton.php"));
require_once("../Model/Bean/Pedagogo.php");
require_once("../View/ViewPedagogo.php");
require_once("../Model/DAO/PedagogoDAO.php");

class ControllerPedagogo extends Singleton {

    /*private  $objView;

    public function  __construct(){
        //Instaciando o objeto View
        $this->objView = new ViewProduto();
    }

    public function listar(){
        $produtoDao = new ProdutoDAO();
        $lista = $produtoDao->listarTudo();

        $_REQUEST["lista"] = $lista;

        $this->objView->listarTudo();
    }*/
    public function logar(){
        //echo var_dump($_POST);
        $user = PedagogoDAO::getInstance()->logar($_POST["Usuario"], $_POST["Senha"]);
        if($user){//VIEW
            echo "Seja bem Vindo ".$user->getNome();
        }else{//VIEW
            echo "Usuario ou Senha incorretos";
        }
    }

}