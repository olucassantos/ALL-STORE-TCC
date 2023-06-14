<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL STORE</title>
    <link href="css/css.css" rel="stylesheet"/>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js">
    </script>
    <script type="text/javascript" src="js/abas.js">
    </script>

</head>
<body>


    
    <div id="principal">


     <div id="cabecalho">
     <?php
     
      include_once ("cabecalho.php");
      
      ?>
</div><!-- fim topo -->
 <div id="corpo">
       
       <nav id="esquerdo">   
        <?php
               include_once ("menu.php");
?>
    </nav>
     <div id="direito">
     <?php

$link = isset($_GET["link"]) ? $_GET["link"] : "";
$pag[1] = "home.php";
$pag[2] = "lst/lst_categorias.php";
$pag[3] = "frm/frm_categoria.php";
$pag[4] = "lst/lst_banner.php";
$pag[5] = "frm/frm_banner.php";
$pag[6] = "lst/lst_produto.php";
$pag[7] = "frm/frm_produto.php";
$pag[11] = "lst/lst_administrador.php";
$pag[12] = "frm/frm_administrador.php";
$pag[13] = "lst/lst_cliente.php";
$pag[14] = "frm/frm_cliente.php";

if (empty($link)) {
   include "home.php";
} else if (file_exists($pag[$link])) {
   include $pag[$link];
} else {
   include "home.php";
}

?>
</div>
</div>
</body>
</html>