<?php

/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 21/04/2017
 * Time: 22:55
 */
class Professor
{
    private $siape;
    private $nome;
    private $nascimento;
    private $Departamento_idDepartamento;

    /**
     * Professor constructor.
     *
     * @param $siape
     * @param $nome
     * @param $nascimento
     * @param $Departamento_idDepartamento
     */
    public function __construct($siape, $nome, $nascimento, $Departamento_idDepartamento)
    {
        $this->siape = $siape;
        $this->nome = $nome;
        $this->nascimento = $nascimento;
        $this->Departamento_idDepartamento = $Departamento_idDepartamento;
    }

    /**
     * @return mixed
     */
    public function getSiape()
    {
        return $this->siape;
    }

    /**
     * @param mixed $siape
     */
    public function setSiape($siape)
    {
        $this->siape = $siape;
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

    /**
     * @return mixed
     */
    public function getNascimento()
    {
        return $this->nascimento;
    }

    /**
     * @param mixed $nascimento
     */
    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;
    }

    /**
     * @return mixed
     */
    public function getDepartamentoIdDepartamento()
    {
        return $this->Departamento_idDepartamento;
    }

    /**
     * @param mixed $Departamento_idDepartamento
     */
    public function setDepartamentoIdDepartamento($Departamento_idDepartamento)
    {
        $this->Departamento_idDepartamento = $Departamento_idDepartamento;
    }




}