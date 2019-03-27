<?php
include_once "conexao.php";

//consultar no banco de dados
$result_usuario = "SELECT * FROM rf ORDER BY codusu ASC";
$resultado_usuario = mysqli_query($conn, $result_usuario);

?>
<table class="table">
   <thead>
       <tr>
	      <th></th>
          <th>Nascimento</th>
          <th>Nome</th>
          <th>Setor</th>
		  <th>Cargo</th>
		  <th>E-mail</th>
		  <th>Ramal</th>
		  <th>Situacao</th>
       </tr>
   </thead>
  <tbody>

<?php


//Verificar se encontrou resultado na tabela "rf"
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
	while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
		?>
		
      <tr>
         <th></th>
         <td><?php echo $row_usuario['datusu']; ?></td>
         <td><?php echo $row_usuario['nomusu']; ?></td>
         <td><?php echo $row_usuario['nomset']; ?></td>
		 <td><?php echo $row_usuario['nomcar']; ?></td>
		 <td><?php echo $row_usuario['nomema']; ?></td>
		 <td><?php echo $row_usuario['numram']; ?></td>
		 <td><?php echo $row_usuario['situsu']; ?></td>
      </tr>
	
		<?php
		
	}
}else{
	echo "Nenhum usuário encontrado";
}
?>
  </tbody>
</table>

