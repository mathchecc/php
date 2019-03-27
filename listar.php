<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Listar</title>		
	</head>
	<body>
	<a href="info/index.php">Info Usuarios</a><br>
	<a href="/cadastro/index.php">Cadastro Usuarios</a><br>
		<h1>Listar UsuÃ¡rio</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		//receber o número da pagina
		$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//setar quantidade de itens por pagina
		$qnt_result_pg = 20;
		
		//calcular inicio da visualizaç?o
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		
		$result_usuarios = "SELECT * FROM rf LIMIT $inicio, $qnt_result_pg";
		$resultado_usuarios = mysqli_query($conn, $result_usuarios);
		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
			echo "Codigo: " . $row_usuario['codusu'] . "<br>";
			echo "Nascimento: " . $row_usuario['datusu'] . "<br>";
			echo "Nome: " . $row_usuario['nomusu'] . "<br>";
			echo "Setor: " . $row_usuario['nomset'] . "<br>";
			echo "Cargo: " . $row_usuario['nomcar'] . "<br>";
			echo "E-mail: " . $row_usuario['nomema'] . "<br>";
			echo "Ramal: " . $row_usuario['numram'] . "<br>";
			echo "Situacao: " . $row_usuario['situsu'] . "<br>";
			echo "<a href='edit_usuario.php?codusu= " . $row_usuario['codusu'] . "'>Editar</a><br><hr>";
		}
		
       //paginaç?o - somar a quantidade de usuarios
       $result_pg = "SELECT COUNT(codusu) AS num_result FROM rf";
	   $resultado_pg = mysqli_query($conn, $result_pg);
	   $row_pg = mysqli_fetch_assoc($resultado_pg);
	   //echo $row_pg['num_result'];
	   
	   //quantidade de pagina
	   $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
	   
	   //limitar links antes e depois
	   $max_links = 2;
	   echo "<a href='listar.php?pagina=1'>Primeira</a>";
	   
	   for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
	   
	   if($pag_ant >= 1){
	   echo "<a href='listar.php?pagina=$pag_ant'>$pag_ant</a>";
	   }
	   }
	   echo "$pagina";
	   
	   for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){
		   
		   if($pag_dep <= $quantidade_pg){
		   
		   echo "<a href='listar.php?pagina=$pag_dep'>$pag_dep</a>";
		   }
	   }
	   
	   echo "<a href='listar.php?pagina=$quantidade_pg'>Ultima</a>";
	   
		
		
		?>
	</body>
</html>