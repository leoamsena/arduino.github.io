<?php

/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 30/04/2017
 * Time: 19:36
 */
require_once (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Controller/includes/Conexao.php"));
require_once (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Controller/includes/GeraLog.php"));
require_once (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Controller/includes/Singleton.php"));
require_once  (realpath($_SERVER["DOCUMENT_ROOT"]."/TCC/Model/Bean/Disciplina.php"));

class DisciplinaDAO extends Singleton
{
    public static function getInstance()
    {
        static $instance;
        if ($instance === null)
            $instance = new static();
        return $instance;
    }

    public function create(Disciplina &$disciplina)
    {
        try {
            if ($disciplina->getIdDisciplina() != 0) {
                $sql = "INSERT INTO disciplina (
                idDisciplina,
                nome)
                VALUES (
                :idDisciplina,
                :nome)";
                $stmt = Conexao::getInstance()->prepare($sql);
                $stmt->bindValue(":idDisciplina", $disciplina->getIdDisciplina());
            } else {
                $sql = "INSERT INTO disciplina (nome) VALUES(:nome)";
                $stmt = Conexao::getInstance()->prepare($sql);
            }
            $stmt->bindValue(":nome", $disciplina->getNome());
            $stmt->execute();
            if ($disciplina->getIdDepartamento() == 0) {
                $sql = "SELECT LAST_INSERT_ID()";
                $stmt = Conexao::getInstance()->prepare($sql);
                $stmt->execute();
                $disciplina->setIdDisciplina(intval($stmt->fetch()["LAST_INSERT_ID()"]));
            }
            return $disciplina;
        }catch (Exception $e){
            GeraLog::getInstance()->inserirLog("Código: " . $e->getCode() . " Mensagem: " . $e->getMessage(), 'error');
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
            //return NULL;
        }
    }

    public function read($idDisciplina) : Disciplina
    {
        try {
            $sql = "SELECT * FROM disciplina WHERE idDisciplina = :idDisciplina";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(":idDisciplina", $idDisciplina, PDO::PARAM_INT);
            $stmt->execute();
            $obj = $stmt->fetch(PDO::FETCH_ASSOC);
            return new Disciplina($obj["idDisciplina"], $obj["nome"]);
        } catch (Exception $e) {
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
        }
    }

    public function update(Disciplina $disciplina)
    {
        try {
            $sql = "UPDATE disciplina set
                nome = :nome
                WHERE idDisciplina = :idDisciplina";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(":nome", $disciplina->getNome());
            $stmt->bindValue(":idDisciplina", $disciplina->getIdDisciplina());
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
        }
    }

    public function delete($idDisciplina)
    {
        try {
            $sql = "DELETE FROM disciplina WHERE idDisciplina = :idDisciplina";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(":idDisciplina", $idDisciplina);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
            die("Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.");
            //return false;
        }
    }
}