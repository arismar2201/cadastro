<?php 

require_once("../conexao.php"); 
@session_start();

$id = $_GET['id'];

$html = file_get_contents($url."rel/clientes2_html.php?id=$id");
echo $html;


?>