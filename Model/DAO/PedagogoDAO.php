<?php

/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 29/04/2017
 * Time: 18:23
 */
require_once (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Controller/includes/Conexao.php"));
require_once (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Controller/includes/GeraLog.php"));
require_once (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Controller/includes/Singleton.php"));
require_once  (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Model/Bean/Pedagogo.php"));

class PedagogoDAO extends Singleton
{
    public static function getInstance()
    {
        static $instance;
        if ($instance === null)
            $instance = new static();
        return $instance;
    }

    public function create(Pedagogo $pedagogo)
    {
        try {
            Conexao::getInstance()->beginTransaction();
            $sql = "INSERT INTO pedagogo (
                siape,
                nome,
                nascimento,
                email,
                usuario,
                senha)
                VALUES (
                :siape,
                :nome,
                :nascimento,
                :email,
                :usuario,
                :senha)";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(":siape", $pedagogo->getSiape());
            $stmt->bindValue(":nome", $pedagogo->getNome());
            $stmt->bindValue(":nascimento", $pedagogo->getNascimento());
            $stmt->bindValue(":email", $pedagogo->getEmail());
            $stmt->bindValue(":usuario", $pedagogo->getUsuario());
            $stmt->bindValue(":senha", $pedagogo->getSenha());
            $stmt->execute();
            Conexao::getInstance()->commit();
            return $pedagogo;
        }catch (Exception $e){
            Conexao::getInstance()->rollBack();
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage(), 'error');
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
            //return NULL;
        }
    }

    public function read($siape) : Pedagogo
    {
        try {
            Conexao::getInstance()->beginTransaction();
            $sql = "SELECT * FROM pedagogo WHERE siape = :siape";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(":siape", $siape, PDO::PARAM_STR);
            $stmt->execute();
            $obj = $stmt->fetch(PDO::FETCH_ASSOC);
            Conexao::getInstance()->commit();
            return new Pedagogo($obj["siape"], $obj["nome"], $obj["nascimento"], $obj["email"], $obj["usuario"], $obj["senha"]);
        } catch (Exception $e) {
            Conexao::getInstance()->rollBack();
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
        }
    }

    public function update(Pedagogo $pedagogo)
    {
        try {
            Conexao::getInstance()->beginTransaction();
            $sql = "UPDATE pedagogo set
                nome = :nome,
                nascimento = :nascimento,
                email = :email,
                usuario = :usuario,
                senha = :senha
                WHERE siape = :siape";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(":nome", $pedagogo->getNome());
            $stmt->bindValue(":nascimento", $pedagogo->getNascimento());
            $stmt->bindValue(":email", $pedagogo->getEmail());
            $stmt->bindValue(":usuario", $pedagogo->getUsuario());
            $stmt->bindValue(":senha", $pedagogo->getSenha());
            $stmt->bindValue(":siape", $pedagogo->getSiape());
            $stmt->execute();
            Conexao::getInstance()->commit();
            return true;
        } catch (Exception $e) {
            Conexao::getInstance()->rollBack();
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
        }
    }

    public function delete($siape)
    {
        try {
            Conexao::getInstance()->beginTransaction();
            $sql = "DELETE FROM pedagogo WHERE siape = :siape";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(":siape", $siape);
            $stmt->execute();
            Conexao::getInstance()->commit();
            return true;
        } catch (Exception $e) {
            Conexao::getInstance()->rollBack();
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
            //return false;
        }
    }

    public function logar($usuario, $senha){
        try {
            $sql = "SELECT * FROM pedagogo WHERE usuario = :usuario AND senha = :senha";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(":usuario", $usuario);
            $stmt->bindValue(":senha", $senha);
            $stmt->execute();
            $obj = $stmt->fetch(PDO::FETCH_ASSOC);
            if($obj === false)
                return false;
            else
                return new Pedagogo($obj["siape"], $obj["nome"], $obj["nascimento"], $obj["email"], $obj["usuario"], $obj["senha"]);
        }catch (Exception $e){
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
        }
    }
}