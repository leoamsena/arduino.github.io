<?php

/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 21/04/2017
 * Time: 22:49
 */
class Curso
{
    private $idCurso;
    private $nome;
    private $Departamento_idDepartamento;

    /**
     * Curso constructor.
     *
     * @param $idCurso
     * @param $nome
     * @param $Departamento_idDepartamento
     */
    public function __construct($idCurso, $nome, $Departamento_idDepartamento)
    {
        $this->idCurso = $idCurso;
        $this->nome = $nome;
        $this->Departamento_idDepartamento = $Departamento_idDepartamento;
    }

    /**
     * @return mixed
     */
    public function getIdCurso()
    {
        return $this->idCurso;
    }

    /**
     * @param mixed $idCurso
     */
    public function setIdCurso($idCurso)
    {
        $this->idCurso = $idCurso;
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