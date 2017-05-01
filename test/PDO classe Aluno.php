<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 22/04/2017
 * Time: 00:03
 */

require_once("Controller/includes/Conexao.php");
require_once("Controller/includes/GeraLog.php");
require_once("Model/Bean/Aluno.php");
require_once("Model/DAO/AlunoDAO.php");

$matricula = "201515tii0322";
/*try {
    $stmt = Conexao::getInstance()->prepare("SELECT * FROM aluno_faz_curso WHERE Aluno_matricula = :Aluno_matricula ");
    $stmt->bindValue(":Aluno_matricula", $matricula, PDO::PARAM_STR);
    $stmt->execute();
    $obj = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $teste = Array();
    foreach($obj as $aluno_faz_curso) {
        echo "O Aluno: " . $aluno_faz_curso["Aluno_matricula"] . ", faz o curso: " . $aluno_faz_curso["Curso_idCurso"] . "<br/>";
        array_push($teste, $aluno_faz_curso["Curso_idCurso"]);
    }
    echo "Qtd == ".count($obj);
    echo "<br/>";
    var_dump($obj);
    echo "<br/><br/><br/>Novo:";
    //$teste = Array("1","2");
    foreach ($teste as $ocorrencia){
        echo "Ocorrencia: ".$ocorrencia."<br/>";
    }
    var_dump($teste);

}catch (Exception $e){
GeraLog::getInstance()->inserirLog("Código: " . $e->getCode() . " Mensagem: " . $e->getMessage(), "error");
    die("Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.");
}*/

$stmt = Conexao::getInstance()->prepare("SELECT * FROM aluno WHERE matricula = :matricula");
$stmt->bindParam(":matricula", $matricula);
$stmt->execute();
$obj = $stmt->fetchAll(PDO::FETCH_CLASS, 'Aluno');
$obj = $obj[0];
//$obj = $stmt->fetchAll(PDO::FETCH_OBJ);
var_dump($obj);
echo "<br/><br/><br/>";
var_dump(AlunoDAO::getInstance()->read("201515tii0322"));