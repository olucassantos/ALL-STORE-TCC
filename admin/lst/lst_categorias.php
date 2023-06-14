<?php
  include_once("./classes/lista.php");
  $lista = new lista();
  $lista->setNumPagina($_GET["pg"] ?? 1);
  $pagina = $_GET["pg"] ?? 1;
  $lista->setUrl("index.php?link=2");
?>

<h2>Lista das Categorias</h2>

<table cellpadding"0" cellspacing="0" border="1">
<thead>

<tr>
<th>id_categoria</th>
<th>categoria</th>
<th>ativo_categoria</th>
<th>Editar</th>
<th>Excluir</th>

</tr>
<tbody>
    <?php    $lista->listaCategoria();
     ?>
   <tr>
       <td colspan="5"><?PHP   $lista->geraNumeros()       ?></td>



   </tr>
</tbody>


</thead>


</table>