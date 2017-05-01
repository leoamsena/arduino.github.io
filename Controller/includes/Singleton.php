<?php

/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 21/04/2017
 * Time: 23:42
 */
abstract class Singleton
{
    /**
     * Retorna uma instância única de uma classe.
     *
     * @staticvar Singleton $instance A instância única dessa classe.
     *
     * @return Singleton A Instância única.
     */
    public static function getInstance()
    {
        static $instance;
        if ($instance === null)
            $instance = new static();
        return $instance;
        /*if (static::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;*/
    }
    /**
     * Construtor do tipo protegido previne que uma nova instância da
     * Classe seja criada através do operador `new` de fora dessa classe.
     */
    protected function __construct()
    {
    }

    /**
     * Método clone do tipo privado previne a clonagem dessa instância
     * da classe
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Método unserialize do tipo privado para prevenir a desserialização
     * da instância dessa classe.
     *
     * @return void
     */
    private function __wakeup()
    {
    }

}