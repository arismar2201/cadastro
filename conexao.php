<?php
require_once("config.php");

date_default_timezone_set('America/Manaus');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
	
} catch (Exception $e) {
	echo "Erro ao conectar com o banco de dados! " . $e;
}

?>