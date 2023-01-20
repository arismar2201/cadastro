<?php 
require_once("../conexao.php"); 
@session_start();

$id = $_GET['id'];


setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Manaus');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));


//DADOS DO CLIENTES
$query_orc = $pdo->query("SELECT * FROM clientes where id = '$id' ");
$res_orc = $query_orc->fetchAll(PDO::FETCH_ASSOC);
$nome = $res_orc[0]['nome'];
$endereco = $res_orc[0]['endereco'];
$bairro = $res_orc[0]['bairro'];
$cep = $res_orc[0]['cep'];
$ufc = $res_orc[0]['ufc'];
$fone = $res_orc[0]['fone'];
$celular = $res_orc[0]['celular'];
$rg = $res_orc[0]['rg'];
$cpf = $res_orc[0]['cpf'];
$cnpj = $res_orc[0]['cnpj'];
$email = $res_orc[0]['email'];
$data = $res_orc[0]['data'];
$obs = $res_orc[0]['obs'];
$ativo = $res_orc[0]['ativo'];
$obs = $res_orc[0]['obs'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Cliente</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style>

		@page {
			margin: 0px;

		}


		.footer {
			margin-top:20px;
			width:100%;
			background-color: #ebebeb;
			padding:10px;
		}

		.cabecalho {    
			background-color: #ebebeb;
			padding:10px;
			margin-bottom:30px;
			width:100%;
			height:100px;
		}

		.titulo{
			margin:0;
			font-size:28px;
			font-family:Arial, Helvetica, sans-serif;
			color:#6e6d6d;

		}

		.subtitulo{
			margin:0;
			font-size:17px;
			font-family:Arial, Helvetica, sans-serif;
		}

		.areaTotais{
			border : 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right:25px;
			margin-left:25px;
			position:absolute;
			right:20;
		}

		.areaTotal{
			border : 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right:25px;
			margin-left:25px;
			background-color: #f9f9f9;
			margin-top:2px;
		}

		.pgto{
			margin:1px;
		}

		.fonte13{
			font-size:13px;
		}

		.esquerda{
			display:inline;
			width:50%;
			float:left;
		}

		.direita{
			display:inline;
			width:50%;
			float:right;
		}

		.table{
			padding:15px;
			font-family:Verdana, sans-serif;
			margin-top:20px;
		}

		.texto-tabela{
			font-size:12px;
		}


		.esquerda_float{

			margin-bottom:10px;
			float:left;
			display:inline;
		}


		.titulos{
			margin-top:10px;
		}

		.image{
			margin-top:-10px;
		}

		.margem-direita{
			margin-right: 80px;
		}

		hr{
			margin:8px;
			padding:1px;
		}

		.container{
			padding-left:50px;
			padding-right:50px;
		}


	</style>

</head>
<body>


	<div class="cabecalho">
		
			<div class="row titulos">
				<div class="col-sm-2 esquerda_float imagem">	
					<img src="../img/imagem3.png" width="150px">
				</div>
				<div class="col-sm-9">	
					<h4 class="titulo"><b><?php echo strtoupper($nome_cliente) ?></b></h4>
					<h10 class="subtitulo"><?php echo $endereco_cliente . ' Tel: '.$telefone_cliente  ?></h10>

				</div>
			</div>
		

	</div>

	<div class="container">

		<div class="row">
			<div class="col-sm-7 esquerda">	
				<big> Cliente Nº <?php echo $id ?>  </big>
			</div>
			<div class="col-sm-5 direita" align="right">	
				<big> <small> Data: <?php echo $data_hoje; ?></small> </big>
			</div>
		</div>


		


		<br><br>
		<p class="titulo" align="center"><b>CADASTRO DE CLIENTE</b></p>
		<br><br>

<h4>

<p><b>Nome:</b><i><?php echo $nome ?></i> </p>
<p><b>Endereço:</b><i><?php echo $endereco ?></i></p>
 <b>Bairro:</b><i><?php echo $bairro ?></i></p>
<p><b>Telefone:</b><i><?php echo $fone?></i>  <b>Celular:</b><i><?php echo $celular?></i></p>
<p><b>Cpf:</b><i><?php echo $cpf ?></i>  <b>Cnpj:</b><i><?php echo $cnpj?></i></p>
<p><b>Estado:</b><i><?php echo $ufc ?></i>  <b>Data Cadastro:</b><i><?php echo $data?></i></p>
<p><b>Situação:</b><i><?php echo $ativo ?></i></p>

</h4>
                                          

				






				</body>
				</html>
