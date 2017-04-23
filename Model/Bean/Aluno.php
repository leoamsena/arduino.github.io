<?php

/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 21/04/2017
 * Time: 17:06
 */
class Aluno
{
    private $matricula;
    private $ano_Periodo;
    private $nome;
    private $email;
    private $nascimento;
    private $aluno_faz_curso;

    /**
     * Aluno constructor.
     *
     * @param $matricula
     * @param $ano_Periodo
     * @param $nome
     * @param $email
     * @param $nascimento
     * @param $aluno_faz_curso Array de ID's de curso
     */
    public function __construct($matricula, $ano_Periodo, $nome, $email, $nascimento, $aluno_faz_curso)
    {
        $this->matricula = $matricula;
        $this->ano_Periodo = $ano_Periodo;
        $this->nome = $nome;
        $this->email = $email;
        $this->nascimento = $nascimento;
        $this->aluno_faz_curso = $aluno_faz_curso;
    }

    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    /**
     * @return mixed
     */
    public function getAnoPeriodo()
    {
        return $this->ano_Periodo;
    }

    /**
     * @param mixed $ano_Periodo
     */
    public function setAnoPeriodo($ano_Periodo)
    {
        $this->ano_Periodo = $ano_Periodo;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getAlunoFazCurso() : Array
    {
        return $this->aluno_faz_curso;
    }

    /**
     * @param mixed $aluno_faz_curso
     */
    public function setAlunoFazCurso($aluno_faz_curso)
    {
        $this->aluno_faz_curso = $aluno_faz_curso;
    }


}