<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 30/04/2017
 * Time: 01:11
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
require_once(realpath($_SERVER["DOCUMENT_ROOT"]."\TCC\Model\Bean\Departamento.php"));
require_once(realpath($_SERVER["DOCUMENT_ROOT"]."\TCC\Model\DAO\DepartamentoDAO.php"));
$obj = new Departamento(0, "Departamento Imaginario");
DepartamentoDAO::getInstance()->create($obj);
var_dump(DepartamentoDAO::getInstance()->read($obj->getIdDepartamento()));
$obj->setNome("Departamento Totalmente Imaginario");
DepartamentoDAO::getInstance()->update($obj);
echo "<br/>";
var_dump(DepartamentoDAO::getInstance()->read($obj->getIdDepartamento()));
DepartamentoDAO::getInstance()->delete($obj->getIdDepartamento());

?>

</body>

</html>
