<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 19/04/2017
 * Time: 14:46
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Teste PDO BDA</title>
</head>

<body>

<?php
header("Content-type: text/html; charset=utf-8");
require_once(realpath($_SERVER["DOCUMENT_ROOT"]."\TCC\Model\Bean\Aluno.php"));
require_once(realpath($_SERVER["DOCUMENT_ROOT"]."\TCC\Model\DAO\AlunoDAO.php"));

echo "Consulta matricula 201515tii0322:<br/>";
$aux = AlunoDAO::getInstance()->read("201515tii0322");
var_dump($aux);
echo "<br/><br/>";

echo "Alterando Nome para Alberto, atualizando no BD e realizando nova consulta:<br/>";

$aux->setNome("Alberto");
AlunoDAO::getInstance()->update($aux);
$aux = AlunoDAO::getInstance()->read("201515tii0322");
var_dump($aux);

echo "<br/><br/>";
echo "Voltando o nome para Alberto Elias Do Amaral Júnior, atualizando no BD e realizando nova consulta:<br/>";
$aux->setNome("Alberto Elias Do Amaral Júnior");
AlunoDAO::getInstance()->update($aux);
$aux = AlunoDAO::getInstance()->read("201515tii0322");
var_dump($aux);
echo "<br/><br/><br/>";
echo "Criando novo Aluno:<br/>";
$johnny = new Aluno("201515tii0195", 3,"João Maurício Silvestre Santos Rodrigues", "joaomauriciossr@gmail.com", "1999-05-12", Array(1,2));
var_dump($johnny);
echo "<br/><br/>";
echo "Salvando no BD e realizando consulta:<br/>";
AlunoDAO::getInstance()->create($johnny);
$aux = AlunoDAO::getInstance()->read("201515tii0195");
var_dump($aux);
echo "<br/><br/>";
echo "Alterando cursos, atualizando no BD e realizando nova consulta:<br/>";
$aux->setAlunoFazCurso(Array(1,2,3));
AlunoDAO::getInstance()->update($aux);
var_dump(AlunoDAO::getInstance()->read("201515tii0195"));
echo "<br/><br/>";
echo "Excluindo 201515tii0195 do BD<br/>";
AlunoDAO::getInstance()->delete("201515tii0195");

?>

</body>

</html>
