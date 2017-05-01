<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 29/04/2017
 * Time: 16:31
 */

require_once(realpath($_SERVER["DOCUMENT_ROOT"]."\TCC\Model\DAO\AlunoDAO.php"));
require_once(realpath($_SERVER["DOCUMENT_ROOT"]."\TCC\Model\DAO\PedagogoDAO.php"));

var_dump(AlunoDAO::getInstance());
var_dump(AlunoDAO::getInstance());
echo "<br/><br/>";
PedagogoDAO::getInstance();
PedagogoDAO::getInstance();
echo "<br/><br/>";
AlunoDAO::getInstance();
AlunoDAO::getInstance();
echo "<br/><br/>";
PedagogoDAO::getInstance();
PedagogoDAO::getInstance();