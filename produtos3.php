<?php
// inclua aqui suas classes e arquivos necessários
include "admin/classes/DadosDoBanco.php";
include "admin/classes/Dadosdacategoria.php";

if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
  // Se o parâmetro categoria estiver presente e não estiver vazio
  // faça o redirecionamento para produtos3.php
  header("Location: produtos3.php?categoria=".$_GET['categoria']);
  exit();
}


?>




<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton e colaboradores do Bootstrap">
  <meta name="generator" content="Hugo 0.111.3">
  <title>All-Store</title>
  <link href="./style.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="imagens/favi.ico" type="image/x-icon">
  
</head>
<style>
        body {
            background-color: white;
            color: #f8f9fa;
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
</section>
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
          <main>
          <div class="container">
  <h2 class="my-4">
    <?php
    // obter o ID da categoria a partir do parâmetro na URL
    $categoria_id = isset($_GET['categoria_id']) ? $_GET['categoria_id'] : null;

    // verificar se um ID de categoria válido foi fornecido
    if ($categoria_id === null) {
      // exibir uma mensagem de erro ou redirecionar para a página inicial, por exemplo
      echo "Categoria inválida";
      exit;
    }

    // criar instância da classe DadosDoProduto
    $produto = new DadosProduto();

    // buscar os produtos para a categoria selecionada
    $sql_products = "SELECT * FROM produto WHERE id_categoria = $categoria_id";
    $produtos = $produto->verProdutos($sql_products);

    // iterar sobre os produtos
    foreach ($produtos as $produto) {
      // exibir os produtos aqui
    }
    ?>
  </h2>

  <div class="row">
    <?php
    $categoria = new DadosCategoria(); // criando a instância da classe fora do loop
    $categorias = $categoria->getCategorias();
    $sql_categories = "SELECT * FROM categoria WHERE id_categoria = $categoria_id" ;
$total_categories = $categoria->totalRegistros($sql_categories);
    for ($i = 0; $i < $total_categories; $i++) {
      $categoria->verCategorias($sql_categories);
      $categoria_id = $categoria->getCategorias()[$i]['id_categoria'];

      // buscar os produtos para a categoria atual
      $sql_products = "SELECT * FROM produto WHERE id_categoria = $categoria_id";
      $produtos = $produto->verProdutos($sql_products);

      foreach ($produtos as $produto) {
        // exibir os produtos aqui
        ?>
        <div class="col-lg-4 col-md-6 mb-4">
        <a href="index.php?link=2&id=<?php echo $produto->getId(); ?>">
          <div class="card h-100">
            <a href="#"><a href="index.php?link=2&id=<?php echo $produto->getId(); ?>"><img class="card-img-top" src="admin/fotos/<?php echo $produto->getImagemProduto(); ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#"><a href="index.php?link=2&id=<?php echo $produto->getId(); ?>"><?php echo $produto->getTituloProduto()  ?></a>
              </h4>
              <h5><?php echo "R$" . $produto->getPreco(); ?></h5>

            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Comprar</a>
            </div>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>

</div>
</main>
</ul>
<footer class="bg-dark text-white py-3">
    <div class="container">
      <?php include_once("rodape.php"); ?>
    </div>
  </footer>
 <!-- Scripts do Bootstrap (requer jQuery) -->
 <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  

<!-- Bootstrap core JS -->
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>