<?php 
// inclua aqui sua classe DadosCategoria e outros arquivos necessários
include "admin/classes/Dadosdacategoria.php";
if(isset($_GET['categoria_id'])) {
  $categoria_id = $_GET['categoria_id'];
  $dadosCategoria = new DadosCategoria();
  $dadosCategoria->setId($categoria_id);
  $dadosCategoria->mostrarDados();
  
  header("Location: produtos3.php?categoria=");
  exit();
}




    $link = isset($_GET["link"]) ? $_GET["link"] : ""; 
    $pag[1] = "home.php"; 
    $pag[2] = "detalhe.php"; 
    $pag[3] = "carrinho.php"; 
    $pag[4] = "produtos.php"; 
    $pag[5] = "login.php"; 
    $pag[6] = "cadastro_cliente.php"; 
    $pag[7] = "fale-conosco.php"; 
    $pag[8] = "produtos3.php";
    $pag[9] = "quem_somos.php";
    $pag[10] = "painel_cliente.php";
?>
<?php

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton e colaboradores do Bootstrap">
  <meta name="generator" content="Hugo 0.111.3">
  <title>AllStore</title>
  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="imagens/favi.ico" type="image/x-icon">
  <link href="./style.css" rel="stylesheet">
  <style>
 
 
 .navbar {
     background-color: whitesmoke;
 }

 .navbar-brand, .navbar-nav .nav-link {
     color: white;
 }

 .navbar-brand:hover, .navbar-nav .nav-link:hover {
     color: violet;
 }

/* Estilo para a tabela */
.table {
margin-top: 20px;
margin-bottom: 20px;
}

/* Estilo para os botões */
.btn {
border-radius: 0;
}

.btn-primary {
background-color: #007bff;
border-color: #007bff;
}

.btn-primary:hover {
background-color: #0069d9;
border-color: #0062cc;
color: violet;
}

.btn-secondary {
background-color: #6c757d;
border-color: #6c757d;
}

.btn-secondary:hover {
background-color: #5a6268;
border-color: #545b62;
color: violet;
}




  </style>
</head>

<body>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check2" viewBox="0 0 16 16">
      <path
        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path
        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path
        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path
        d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>

  <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <img src="imagens/logocerto.png.png" alt="" height="350">
        </div>
      </div>
</section>
  <div class="container-fluid bg-dark">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
      <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
      <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="imagens/bannercerto.png" class="d-block w-100" alt="..." height="250" weight="120">
      </div>
      <div class="carousel-item">
        <img src="imagens/banner6.png" class="d-block w-100" alt="..." height="300" weight="120">
      </div>
      <div class="carousel-item">
        <img src="imagens/banner7.png" class="d-block w-100" alt="..." height="300" weight="120">
      </div>
      

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Próximo</span>
    </a>
  </div>
</div>

 
</section>
<header class="bg-dark fixed-top">
  <nav class="navbar navbar-expand-lg navbar-white bg-dark container">
    <a class="navbar-brand" href="index.php">All-STORE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="toggleNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="./index.php">Início</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Produtos
          </a>
          <ul class="dropdown-menu">
            <?php
            $dadosCategoria = new DadosCategoria();
            $categorias = $dadosCategoria->getTodasCategorias();
            foreach ($categorias as $categoria) {
              echo "<li><a class='dropdown-item' href='produtos3.php?categoria_id=".$categoria['id_categoria']."'>".$categoria['categoria']."</a></li>";

            }
            ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="fale-conosco.php">Fale Conosco</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quem_somos.php">Quem Somos?</a>
        </li>

      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="./login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./cadastro_cliente.php">Cadastro</a>
        </li>
      </ul>
    </div>
  </nav>
</header>




<div class="album py-5">
  <div class="container">
    <?php
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
  </main>

  <footer class="bg-dark text-white py-3">
    <div class="container">
      <?php include_once("rodape.php"); ?>
    </div>
  </footer>
</body>
 <!-- Scripts do Bootstrap (requer jQuery) -->

  

<!-- Bootstrap core JS -->
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</html>
