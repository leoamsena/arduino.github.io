<?php

/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 21/04/2017
 * Time: 22:49
 */
class Disciplina
{
    private $idDisciplina;
    private $nome;

    /**
     * Disciplina constructor.
     *
     * @param $idDisciplina
     * @param $nome
     */
    public function __construct($idDisciplina, $nome)
    {
        $this->idDisciplina = $idDisciplina;
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getIdDisciplina()
    {
        return $this->idDisciplina;
    }

    /**
     * @param mixed $idDisciplina
     */
    public function setIdDisciplina($idDisciplina)
    {
        $this->idDisciplina = $idDisciplina;
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