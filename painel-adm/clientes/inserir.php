<?php 
require_once("../../conexao.php"); 

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$ufc = $_POST['ufc'];
$fone = $_POST['fone'];
$celular = $_POST['celular'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$data = $_POST['data'];
$obs = $_POST['obs'];
$ativo = $_POST['ativo'];

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
	echo 'O cpf é Obrigatório!';
	exit();
}


//VERIFICAR SE O REGISTRO JÁ EXISTE NO BANCO
if($antigo != $cpf){
	$query = $pdo->query("SELECT * FROM clientes where cpf = '$cpf' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O CPF já está Cadastrado!';
		exit();
	}
}


//VERIFICAR SE O REGISTRO COM MESMO EMAIL JÁ EXISTE NO BANCO
if($antigo2 != $email){
	$query = $pdo->query("SELECT * FROM clientes where email = '$email' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'O Email já está Cadastrado!';
		exit();
	}
}





//SCRIPT PARA SUBIR FOTO NO BANCO
$nome_img = preg_replace('/[ -]+/' , '-' , @$_FILES['imagem']['name']);
$caminho = '../../img/clientes/' .$nome_img;
if (@$_FILES['imagem']['name'] == ""){
  $imagem = "sem-foto.jpg";
}else{
    $imagem = $nome_img;
}

$imagem_temp = @$_FILES['imagem']['tmp_name']; 
$ext = pathinfo($imagem, PATHINFO_EXTENSION);   
if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida!';
	exit();
}


if($id == ""){
	$res = $pdo->prepare("INSERT INTO clientes SET nome = :nome, endereco = :endereco, bairro = :bairro, cep = :cep, ufc = :ufc, fone = :fone, celular = :celular, rg = :rg, cpf = :cpf, cnpj = :cnpj, email = :email, data = :data, obs = :obs, ativo = :ativo, foto = '$imagem'");	

	$res2 = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, cpf = :cpf, email = :email, senha = :senha, nivel = :nivel");	
	$res2->bindValue(":senha", '123');
	$res2->bindValue(":nivel", 'usuario');

}else{
	if($imagem == "sem-foto.jpg"){
		$res = $pdo->prepare("UPDATE clientes SET nome = :nome, endereco = :endereco, bairro = :bairro, cep = :cep, ufc = :ufc, fone = :fone, celular = :celular, rg = :rg, cpf = :cpf, cnpj = :cnpj, email = :email, data = :data, obs = :obs, ativo = :ativo WHERE id = '$id'");
	}else{
		$res = $pdo->prepare("UPDATE clientes SET nome = :nome, endereco = :endereco, bairro = :bairro, cep = :cep, ufc = :ufc, fone = :fone, celular = :celular, rg = :rg, cpf = :cpf, cnpj = :cnpj, email = :email, data = :data, obs = :obs, ativo = :ativo, foto = '$imagem' WHERE id = '$id'");
	}
	

	
	
}

$res->bindValue(":nome", $nome);
$res->bindValue(":endereco", $endereco);
$res->bindValue(":bairro", $bairro);
$res->bindValue(":cep", $cep);
$res->bindValue(":ufc", $ufc);
$res->bindValue(":fone", $fone);
$res->bindValue(":celular", $celular);
$res->bindValue(":rg", $rg);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":cnpj", $cnpj);
$res->bindValue(":email", $email);
$res->bindValue(":data", $data);
$res->bindValue(":obs", $obs);
$res->bindValue(":ativo", $ativo);



$res->execute();

echo 'Salvo com Sucesso!';

?>