<?php
  include_once("./classes/lista.php");
  $lista = new lista();
  $lista->setNumPagina($_GET["pg"] ?? 1);
  $pagina = $_GET["pg"] ?? 1;
  $lista->setUrl("index.php?link=4");
?>

<h2>Lista de Banner</h2>

<table cellpadding"0" cellspacing="0" border="1">
<thead>

<tr>
<th>id_banner</th>
<th>titulo_banner</th>
<th>ativo_banner</th>
<th>Editar</th>
<th>Excluir</th>

</tr>
<tbody>
    <?php    $lista->listaBanner();
     ?>
   <tr>
       <td colspan="5"><?PHP   $lista->geraNumeros()       ?></td>



   </tr>
</tbody>


</thead>


</table>