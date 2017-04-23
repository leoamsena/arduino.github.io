<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 19/04/2017
 * Time: 14:46
 */

/**
 * Class Conexao Esta Classe é responsavel pela conexão com o BD.
 */
class Conexao {
    /**
     * @var PDO respnsavel pela conexão com o BD.
     */
    public static $instance;

    /**
     * Evita que a classe seja instanciada publicamente.
     *
     */
    private function __construct()
    {
        //
    }

    /**
     * Evita que a classe seja clonada.
     * @return void
     */
    private function __clone()
    {
        //
    }

    /**
     * Método unserialize do tipo privado para prevenir a
     * desserialização da instância dessa classe.
     * @return void
     */
    private function __wakeup()
    {
        //
    }

    /**
     * Testa se há instância definida na propriedade,
     * caso sim, a classe não será instanciada novamente.
     * @return Conexao|PDO
     */
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new PDO('mysql:host=localhost;dbname=mydb', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return self::$instance;
    }
}