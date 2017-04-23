<?php

/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 21/04/2017
 * Time: 22:51
 */
class Departamento
{
    private $idDepartamento;
    private $nome;

    /**
     * Departamento constructor.
     *
     * @param $idDepartamento
     * @param $nome
     */
    public function __construct($idDepartamento, $nome)
    {
        $this->idDepartamento = $idDepartamento;
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * @param mixed $idDepartamento
     */
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }




}