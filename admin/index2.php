<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL STORE</title>
    <link href="css/css2.css" rel="stylesheet"/>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js">
    </script>
    <script type="text/javascript" src="js/abas.js">
    </script>

</head>
<body>


    
    <div id="principal">


     <div id="cabecalho">
     <?php
     
      include_once ("cabecalhocli.php");
      
      ?>
</div><!-- fim topo -->
 <div id="corpo">
       
       <nav id="esquerdo">   
        <?php
               include_once ("menu2.php");
?>
    </nav>
     <div id="direito">
     <?php

$link = isset($_GET["link"]) ? $_GET["link"] : "";
$pag[1] = "home2.php";
$pag[6] = "lst/lst_produto.php";
$pag[7] = "frm/frm_produto.php";
if (empty($link)) {
   include "home2.php";
} else if (file_exists($pag[$link])) {
   include $pag[$link];
} else {
   include "home2.php";
}

?>
</div>
</div>
</body>
</html>