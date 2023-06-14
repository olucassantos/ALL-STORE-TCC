<?php
include "admin/classes/DadosDoBanco.php";
include "banco.php";

?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="auto">

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
</head>
<style>
  body {
    background-color: #343a40;
    color: #f8f9fa;
  }

  .navbar {
    background-color: #212529;
  }

  .navbar-brand,
  .navbar-nav .nav-link {
    color: #f8f9fa;
  }

  .navbar-brand:hover,
  .navbar-nav .nav-link:hover {
    color: white;
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
    color: white;
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
    color: white;
    height: 16px;
    text-decoration: none;
  }

  .container a:hover {
    color: white;
    height: 16px;
  }


  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }





  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }

  .btn-bd-primary {
    --bd-violet-bg: #712cf9;
    --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

    --bs-btn-font-weight: 600;
    --bs-btn-color: var(--bs-white);
    --bs-btn-bg: var(--bd-violet-bg);
    --bs-btn-border-color: var(--bd-violet-bg);
    --bs-btn-hover-color: var(--bs-white);
    --bs-btn-hover-bg: #6528e0;
    --bs-btn-hover-border-color: #6528e0;
    --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
    --bs-btn-active-color: var(--bs-btn-hover-color);
    --bs-btn-active-bg: #5a23c8;
    --bs-btn-active-border-color: #5a23c8;
  }

  .bd-mode-toggle {
    z-index: 1500;
  }

  /* Estilo para o header minimizado */
  .minimized {
    height: 50px;
  }

  /* Estilo para o botão quando o header está minimizado */
  .minimized #minimize-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
  }
</style>

<body>


  <div class="container-fluid mt-4">
    <?php
    $categoria = new DadosCategoria();
    $produto = new DadosProduto();

    $sql_categories = "SELECT * FROM categoria";
    $total_categories = $categoria->totalRegistros($sql_categories);

    ?>


    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">ALL STORE PRODUTOS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./produtos.php">TODOS OS PRODUTOS DA LOJA!</a>
            </li>
            <li class="nav-item">

            </li>

        </div>
    </nav>

    <div class="container-fluid mt-4">
      <div class="row">

        <div class="col-md-12 mb-4">
          <?php
          for ($i = 0; $i < $total_categories; $i++) {
            $categoria->verCategorias($sql_categories);
            $categoria_id = $categoria->getCategorias()[$i]['id_categoria'];
          ?>

            <h5 class="card-header bg-dark"><?php echo $categoria->getCategorias()[$i]['categoria']; ?></h5>

            <div class="row mt-3">
              <?php
              $sql_products = "SELECT * FROM produto WHERE id_categoria = $categoria_id";
              $produtos = $produto->verProdutos($sql_products);

              foreach ($produtos as $produto) {
              ?>
                <div class="col-md-3">
                  <div class="card">
                    <div class="img-container">
                      <a href="index.php?link=2&id=<?php echo $produto->getId(); ?>">
                        <img src="admin/fotos/<?php echo $produto->getImagemProduto(); ?>" class="card-img-top" alt="
        <?php echo $produto->getTituloProduto(); ?>">
                      </a>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><a href="index.php?link=2&id=<?php echo $produto->getId(); ?>"><?php echo $produto->getTituloProduto(); ?></a></h5>
                      <p class="card-text"><strong><?php echo $produto->getPreco(); ?></strong></p>

                      <form action="op_carrinho.php" method="POST">
                        <input type="hidden" name="acao" value="INSERIR">
                        <input type="hidden" name="txt_valor" value="<?php echo $produto->getPreco(); ?>">
                        <input type="hidden" name="id_produto" value="<?php echo $produto->getId(); ?>">
                        <button type="submit" name="adicionar_carrinho" class="btn btn-primary">Adicionar ao Carrinho</button>
                      </form>

                    </div>
                  </div>
                </div>

              <?php } ?>
            </div>

          <?php } ?>

        </div>
      </div>
    </div>

</body>