<?php
@session_start();
if(@$_SESSION['nivel_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Admin'){
	echo "<script language='javascript'> window.location='../index.php' </script>";
}

require_once("../conexao.php"); 


//totais dos cards
$hoje = date('Y-m-d');
$mes_atual = Date('m');
$ano_atual = Date('Y');
$dataInicioMes = $ano_atual."-".$mes_atual."-01";

 $query_cad = $pdo->query("SELECT * FROM clientes ");
 $res_cad = $query_cad->fetchAll(PDO::FETCH_ASSOC);
 $totalClientes = @count($res_cad);

 $query_cad = $pdo->query("SELECT * FROM clientes where ativo = 'Ativo' ");
 $res_cad = $query_cad->fetchAll(PDO::FETCH_ASSOC);
 $totalAtivo = @count($res_cad);

 $query_cad = $pdo->query("SELECT * FROM clientes where ativo = 'Inativo' ");
 $res_cad = $query_cad->fetchAll(PDO::FETCH_ASSOC);
 $totalInativo = @count($res_cad);

 $query_cad = $pdo->query("SELECT * FROM usuarios ");
 $res_cad = $query_cad->fetchAll(PDO::FETCH_ASSOC);
 $totalColaborador = @count($res_cad);

?>

<div class="row">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Clientes</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalClientes ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-users fa-2x text-success"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CLIENTE ATIVO</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalAtivo ?> </div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-primary"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">CLIENTE INATIVO</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalInativo ?> </div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-danger"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalServPendentes ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-danger"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>







<div class="row">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Colaborador</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalColaborador ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-users fa-2x text-info"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cadastro</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalProf ?> </div>
					</div>
					<div class="col-auto">
						<i class="fas fa-users fa-2x text-success"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cadastro</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalDisc ?> </div>
					</div>
					<div class="col-auto" align="center">
						<i class="fas fa-clipboard-list fa-2x text-primary"></i>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-secondary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Cadastro</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$totalTurmas ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-secondary"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>