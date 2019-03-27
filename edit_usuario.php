<?php
session_start();
include_once("conexao.php");
$codusu = filter_input(INPUT_GET, 'codusu', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM rf WHERE codusu = '$codusu'";
$resultado_usuario = mysqli_query($conn, $result_usuario); 
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar Usuario</title>		
	</head>
	<body>
	<a href="/Cadastro/index.php">Cadastro Usuarios</a><br>
	<a href="info/index.php">Info Usuarios</a><br>
	<a href="/Cadastro/listar.php">Listar Usuarios</a><br>
		<h1>Editar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_usuario.php">
		
		<input type="hidden" name="codigo" value="<?php echo $row_usuario['codusu']; ?>">
		
		    <label>Nascimento: </label>
			<input type="date" name="data" placeholder="" value="<?php echo $row_usuario['datusu']; ?>"><br><br>
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nomusu']; ?>"><br><br>
			
			<label>Setor: </label>
			<input type="text" name="setor" placeholder="Digite o setor" value="<?php echo $row_usuario['nomset']; ?>"><br><br>
			
			<label>Cargo: </label>
			<input type="text" name="cargo" placeholder="Digite o cargo" value="<?php echo $row_usuario['nomcar']; ?>"><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email" placeholder="Digite o e-mail" value="<?php echo $row_usuario['nomema']; ?>"><br><br>
			
			<label>Ramal: </label>
			<input type="number" name="ramal" placeholder="Digite o numero de ramal" value="<?php echo $row_usuario['numram']; ?>"><br><br>
			
			<label>ATIVO: </label>
			<input type="checkbox" name="situacao" value=ATIVO placeholder="Digite a situacao do usuario"><br><br>
			
			<label>INATIVO: </label>
			<input type="checkbox" name="situacao" value=INATIVO placeholder="Digite a situacao do usuario"><br><br>
			

			<input type="submit" value="Editar">
		</form>
	</body>
</html>