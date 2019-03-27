<!DOCTYPE HTML>
<html lang="pt-br">  
    <head>      
        <meta charset="utf-8">
        <title>Relacao Funcionarios</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
	<a href="/cadastro/index.php">Cadastro Usuarios</a><br>
	<a href="/Cadastro/Listar.php">Listar Usuarios</a><br>
		<span id="conteudo"></span>
		<script>
			$(document).ready(function () {
				$.post('listar_usuario.php', function(retorna){
					//Subtitui o valor no seletor id="conteudo"
					$("#conteudo").html(retorna);
				});
			});
		</script>
    </body>
</html>
