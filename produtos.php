
<?php 
include "admin/classes/DadosDoBanco.php";
include "banco.php";
?>
<?php
// inclua aqui sua classe DadosCategoria e outros arquivos necessários
include "admin/classes/Dadosdacategoria.php";


$categoria = new DadosCategoria();
$produto = new DadosProduto();

$sql_categories = "SELECT * FROM categoria";
$total_categories = $categoria->totalRegistros($sql_categories);

?>
<?php


if(isset($_GET['categoria_id'])) {
    $categoria_id = $_GET['categoria_id'];
    $dadosCategoria = new DadosCategoria();
    $dadosCategoria->setId($categoria_id);
    $dadosCategoria->mostrarDados();
    
    header("Location: produtos.php?categoria=");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <script src="../assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.111.3">
  <title>All-Store</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="imagens/favi.ico" type="image/x-icon">
</head>
<style>
        body {
            background-color: white;
            color: #f8f9fa;
        }

        .navbar {
            background-color: #212529;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: black;
        }

        .navbar-brand:hover, .navbar-nav .nav-link:hover {
            color: violet;
        }

        .navbar-toggler-icon {
            background-color: #f8f9fa;
        }

        .navbar-toggler {
            border-color: #f8f9fa;
        }

        .navbar-collapse {
            justify-content: flex-end;
        }

        .container {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .category {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .product-card {
            margin-bottom: 2rem;
        }

        .product-card img {
            height: 200px;
            object-fit: cover;
        }

        .product-card .card-body {
            margin-top: auto;
        }

        .product-card img-container {
            height: 250px;
            overflow: hidden;
        }

        .card-header {
            background-color: #6c757d;
            color: #f8f9fa;
        }

        .card-header a {
            color: #f8f9fa;
        }

        .card-header a:hover {
            color: violet;
            height: 16px;
            text-decoration: none;
        }

        .card {
            background-color: #495057;
            color: #f8f9fa;
        }

        .card a {
            color: #212529;
        }

        .card a:hover {
            color: violet;
            height: 16px;
            text-decoration: none;
        }

        .container a:hover{
            color: violet;
            height: 16px;
        }
    </style>
    
<body>
<section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <img src="imagens/banner.png" alt="" height="300">
        </div>
      </div>
      <header class="bg-white fixed-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-light container">
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

<script>
  const toggleNav = document.querySelector('#toggleNav');
  const navbarNav = document.querySelector('#navbarNav');

  toggleNav.addEventListener('click', () => {
    navbarNav.classList.toggle('show');
  });
</script>
<?php

$produto = new DadosProduto();



?>

<div class="container-fluid mt-4">
  <div class="row">
    <?php
      $sql_products = "SELECT * FROM produto";
      $produtos = $produto->verProdutos($sql_products);
      foreach ($produtos as $produto) {
    ?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <a href="index.php?link=2&id=<?php echo $produto->getId(); ?>">
          <img class="card-img-top" src="admin/fotos/<?php echo $produto->getImagemProduto(); ?>" alt="<?php echo $produto->getTituloProduto(); ?>">
        </a>
        <div class="card-body">
        <h5 class="card-title"><a href="index.php?link=2&id=<?php echo $produto->getId(); ?>"><?php echo $produto->getTituloProduto(); ?></a></h5>
          <h6 class="card-subtitle mb-2 text-muted text-white"><?php echo $produto->getPreco(); ?></h6>

          
        </div>
        <div class="card-footer">
          <button class="btn btn-primary btn-block">Comprar</button>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

<script>
  $(document).ready(function() {
    // ativa o tooltip do Bootstrap
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
<footer class="bg-dark text-white py-3">
    <div class="container">
      <?php include_once("rodape.php"); ?>
    </div>
  </footer>
  <!-- Bootstrap core JS -->
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
