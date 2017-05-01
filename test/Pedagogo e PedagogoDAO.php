<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 30/04/2017
 * Time: 00:55
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
require_once(realpath($_SERVER["DOCUMENT_ROOT"]."\TCC\Model\Bean\Pedagogo.php"));
require_once(realpath($_SERVER["DOCUMENT_ROOT"]."\TCC\Model\DAO\PedagogoDAO.php"));
$obj = new Pedagogo("SIAPE - Anderson", "Nome - Anderson", "1980-06-24", "Email - Anderson", "anderson", "anderson");
PedagogoDAO::getInstance()->create($obj);
var_dump(PedagogoDAO::getInstance()->read($obj->getSiape()));
$obj->setSenha("senha");
PedagogoDAO::getInstance()->update($obj);
echo "<br/>";
var_dump(PedagogoDAO::getInstance()->read($obj->getSiape()));
PedagogoDAO::getInstance()->delete($obj->getSiape());

?>

</body>

</html>
