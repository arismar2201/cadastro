<?php 
require_once("../../conexao.php"); 

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];

$antigo = $_POST['antigo'];
$antigo2 = $_POST['antigo2'];
$id = $_POST['txtid2'];

if($nome == ""){
	echo 'O nome é Obrigatório!';
	exit();
}

if($email == ""){
	echo 'O email é Obrigatório!';
	exit();
}

if($cpf == ""){
	echo 'O CPF é Obrigatório!';
	exit();
}

//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $cpf){
	$query = $pdo->query("SELECT * FROM usuarios where cpf = '$cpf' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O CPF já está Cadastrado!';
		exit();
	}
}


//VERIFICAR SE O REGISTRO COM MESMO EMAIL JÁ EXISTE NO BANCO
if($antigo2 != $email){
	$query = $pdo->query("SELECT * FROM usuarios where email = '$email' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O Email já está Cadastrado!';
		exit();
	}
}


if($id == ""){
	$res = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, cpf = :cpf, email = :email, senha = :senha, nivel = :nivel");	

		/*
	$res2->bindValue(":senha", '123');
	$res2->bindValue(":nivel", 'professor');
*/
	}else{
		$res = $pdo->prepare("UPDATE usuarios SET nome = :nome, cpf = :cpf, email = :email, senha = :senha, nivel = :nivel WHERE id = '$id'");
	}
	

$res->bindValue(":nome", $nome);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":email", $email);
$res->bindValue(":senha", $senha);
$res->bindValue(":nivel", $nivel);



$res->execute();

echo 'Salvo com Sucesso!';


?>