<?php 

include_once("./classes/lista.php");
$lista = new lista();
$lista->setNumPagina($_GET["pg"] ?? 1);
$pagina = $_GET["pg"] ?? 1;
$lista->setUrl("index.php?link=13");
	
?>

<h2> Lista dos clientes </h2>

<table cellpadding="0" cellspacing="0" border="1">
	<thead>
		<tr>
			<th>ID </th>
			<th>Titulo </th>
			<th>Ativo </th>
			<th>Editar </th>
			<th>Excluir </th>
		</tr>
	</thead>
	
	<tbody>
		<?php $lista->listacliente("search_term")	?>
		
		<tr>
			<td colspan="5"><?php  $lista ->geraNumeros() ?></td> 
		</tr>
	</tbody>

</table>