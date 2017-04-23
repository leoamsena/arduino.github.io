<?php

/*
 *@description Controlador de Produtos
 * @author Luis Araujo
 * @version 1.0
 */

class ControllerProduto {

    private $view;
    private  $objView;
    private  $urlDAO;
    private  $urlClass;

    public function  __construct(){
        //Url Class
        $this->urlClass = "../Model/Bean/Produto.php";
        require_once($this->urlClass);

        //Url View
        $this->view = "../View/ViewProduto.php";
        require_once($this->view);

        //Url DAO
        $this->urlDAO = "../Model/DAO/ProdutoDAO.php";
        require_once($this->urlDAO);

        //Instaciando o objeto View
        $this->objView = new ViewProduto();
    }

    public function listar(){

        Conexao::conectar();

        $produtoDao = new ProdutoDAO();
        $lista = $produtoDao->listarTudo();

        $_REQUEST["lista"] = $lista;

        $this->objView->listarTudo();

    }

} 