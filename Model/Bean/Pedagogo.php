<?php

/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 21/04/2017
 * Time: 18:13
 */
class Pedagogo
{
    private $siape;
    private $nome;
    private $nascimento;
    private $email;
    private $usuario;
    private $senha;

    /**
     * Pedagogo constructor.
     *
     * @param $siape
     * @param $nome
     * @param $nascimento
     * @param $usuario
     * @param $senha
     */
    public function __construct($siape, $nome, $nascimento, $email, $usuario, $senha)
    {
        $this->siape = $siape;
        $this->nome = $nome;
        $this->nascimento = $nascimento;
        $this->email = $email;
        $this->usuario = $usuario;
        $this->senha = $senha;
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
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


}