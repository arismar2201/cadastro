<?php 
require_once("../../conexao.php"); 

$id = $_POST['id'];
/*
$query = $pdo->query("SELECT * FROM clientes where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$cpf_usu = $res[0]['cpf'];

*/


$pdo->query("DELETE FROM clientes WHERE id = '$id'");


echo 'Excluído com Sucesso!';

?>