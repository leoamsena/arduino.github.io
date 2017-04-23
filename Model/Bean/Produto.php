<?php
/**
 * Created by PhpStorm.
 * User: Luis 4raujo
 * Date: 23/08/15
 * Time: 07:17
 */

class Produto {

    private $id;
    private $nome;

   public function setNome($nome){ $this->nome = $nome; }
   public function getNome(){ return $this->nome; }

} 