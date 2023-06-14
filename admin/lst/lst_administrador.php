<?php 

	include_once("./classes/lista.php");	
	$lista = new Lista();	
	$lista->setNumPagina($_GET["pg"] ?? 1);
	$lista->setUrl("index.php?link=11");
	
?>

<h2> Lista dos Administradores </h2>

<table cellpadding="0" cellspacing="0" border="1">
	<thead>
		<tr>
			<th>ID </th>
			<th>Nome </th>
			<th>Login </th>
			<th>Editar </th>
			<th>Excluir </th>
		</tr>
	</thead>
	
	<tbody>
		<?php $lista->listaAdministrador();	?>
		
		<tr>
			<td colspan="5"><?php  $lista ->geraNumeros() ?></td> 
		</tr>
	</tbody>

</table>