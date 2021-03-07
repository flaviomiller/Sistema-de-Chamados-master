<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="admin"){
      header('Location: ../index.php?err=2');
    }
?>

<?php
include("conecta-puxa-dados-admin.php");
// puxar produtos do banco
$sql_code = "select * from chamados1 WHERE Status='Aberto'";
$execute = $mysqli->query($sql_code) or die($mysqli->error);
$produto = $execute->fetch_assoc();
$num = $execute->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deletar Chamado</title>
  
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 
 </head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<a class="navbar-brand" href="#">E-Chamados</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="Admin-Home.php">Home</a></li>
				<li> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Chamados<span class="caret"></span></a>
					<ul class="dropdown-menu multi-level">
						<li><a href="Abrir-chamado-admin.php">Abrir Chamado</a></li>
						<li><a href="#">Deletar Chamado</a></li>	
						<li><a href="Chamados_abertos.php">Chamados em Aberto <span class="badge badge-danger"><?php echo $num;?></span></a></li>
						<li><a href="Chamados_concluidos.php">Chamados Concluídos</a></li>			
						<li><a href="Ver-chamados-admin.php">Listar Chamado</a></li>
					</ul>
				</li>		
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Técnico<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="insere_tecnico_res.php">Inserir Técnico</a></li>
						<li><a href="remove_tecnico_res.php">Remover Técnico</a></li>
						<li><a href="Ver-tecnicos.php">Ver Técnicos</a></li>
					</ul>
				</li>
      
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Sair</a></li>
			</ul>
		</div>
		</div>
	</nav>
	<div class="container">
		<h2>Preencha com o número da OS que deseja remover:</h2>
		<form method="POST" action="delete_os.php">
			<div class="form-group">
				<label for="local">Número da OS:</label>
				<input type="number" class="form-control" id="oser" placeholder="Número OS" name="oser" required />
			</div>
			<button type="submit" class="btn btn-default">Remover Ordem</button>
		</form>
	</div>
</body>
</html>