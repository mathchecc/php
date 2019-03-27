<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar</title>		
	</head>
	<body>
	<a href="info/index.php">Info Usuarios</a><br>
	<a href="/Cadastro/Listar.php">Listar Usuarios</a><br>
		<h1>Cadastrar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="processa.php">
		
		    <label>Nascimento: </label>
			<input type="date" name="data" placeholder="" required><br><br>
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" required><br><br>
			
			<label>Setor: </label>
			<input type="text" name="setor" placeholder="Digite o setor" required><br><br>
			
			<label>Cargo: </label>
			<input type="text" name="cargo" placeholder="Digite o cargo" required><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email" placeholder="Digite o e-mail" required><br><br>
			
			<label>Ramal: </label>
			<input type="number" name="ramal" placeholder="Digite o numero de ramal" required><br><br>
			
			<label>ATIVO: </label>
			<input type="checkbox" name="situacao" value=ATIVO placeholder="Digite a situacao do usuario"><br><br>
			
			<label>INATIVO: </label>
			<input type="checkbox" name="situacao" value=INATIVO placeholder="Digite a situacao do usuario"><br><br>
			
		
			

			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>