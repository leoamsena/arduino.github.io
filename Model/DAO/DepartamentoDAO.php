<?php

/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 30/04/2017
 * Time: 01:04
 */
require_once (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Controller/includes/Conexao.php"));
require_once (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Controller/includes/GeraLog.php"));
require_once (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Controller/includes/Singleton.php"));
require_once  (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Model/Bean/Departamento.php"));
class DepartamentoDAO extends Singleton
{
    public static function getInstance()
    {
        static $instance;
        if ($instance === null)
            $instance = new static();
        return $instance;
    }

    public function create(Departamento &$departamento)
    {
        try {
            if ($departamento->getIdDepartamento() != 0) {
                $sql = "INSERT INTO departamento (
                idDepartamento,
                nome)
                VALUES (
                :idDepartamento,
                :nome)";
                $stmt = Conexao::getInstance()->prepare($sql);
                $stmt->bindValue(":idDepartamento", $departamento->getIdDepartamento());
            } else {
                $sql = "INSERT INTO departamento (nome) VALUES(:nome)";
                $stmt = Conexao::getInstance()->prepare($sql);
            }
            $stmt->bindValue(":nome", $departamento->getNome());
            $stmt->execute();
            if ($departamento->getIdDepartamento() == 0) {
                $sql = "SELECT LAST_INSERT_ID()";
                $stmt = Conexao::getInstance()->prepare($sql);
                $stmt->execute();
                $departamento->setIdDepartamento(intval($stmt->fetch()["LAST_INSERT_ID()"]));
            }
            return $departamento;
        }catch (Exception $e){
            GeraLog::getInstance()->inserirLog("Código: " . $e->getCode() . " Mensagem: " . $e->getMessage(), 'error');
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
            //return NULL;
        }
    }

    public function read($idDepartamento) : Departamento
    {
        try {
            $sql = "SELECT * FROM departamento WHERE idDepartamento = :idDepartamento";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(":idDepartamento", $idDepartamento, PDO::PARAM_INT);
            $stmt->execute();
            $obj = $stmt->fetch(PDO::FETCH_ASSOC);
            return new Departamento($obj["idDepartamento"], $obj["nome"]);
        } catch (Exception $e) {
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
        }
    }

    public function update(Departamento $departamento)
    {
        try {
            $sql = "UPDATE departamento set
                nome = :nome
                WHERE idDepartamento = :idDepartamento";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(":nome", $departamento->getNome());
            $stmt->bindValue(":idDepartamento", $departamento->getIdDepartamento());
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
        }
    }

    public function delete($idDepartamento)
    {
        try {
            $sql = "DELETE FROM departamento WHERE idDepartamento = :idDepartamento";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(":idDepartamento", $idDepartamento);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
            //return false;
        }
    }
}