<?php
// inclua aqui sua classe DadosCategoria e outros arquivos necessários
include "admin/classes/Dadosdacategoria.php";

if(isset($_GET['categoria_id'])) {
    $categoria_id = $_GET['categoria_id'];
    $dadosCategoria = new DadosCategoria();
    $dadosCategoria->setId($categoria_id);
    $dadosCategoria->mostrarDados();
    
    header("Location: produtos3.php?categoria_id=");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

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
    <link rel="shortcut icon" href="imagens/favi.ico" type="image/x-icon">
     
    <!-- Custom styles for this template -->
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="shortcut icon" href="imagens/favi.ico" type="image/x-icon">
</head>
<style>

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

<script>
  const toggleNav = document.querySelector('#toggleNav');
  const navbarNav = document.querySelector('#navbarNav');

  toggleNav.addEventListener('click', () => {
    navbarNav.classList.toggle('show');
  });
</script>

  <!-- FORMULÁRIO DE CONTATO -->
  <div class="container mt-5">
    <h1 class="text-center">Entre em contato conosco</h1>
    <form id="contact-form" method="post" action="enviar-email.php" role="form">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome" required>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="form-group">
            <label for="email"></
            <div class="col-md-6">
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
  </div>
</div>

<div class="col-md-6">
  <div class="form-group">
    <label for="phone">Telefone</label>
    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Digite seu telefone">
  </div>
</div>

<div class="col-md-12">
  <div class="form-group">
    <label for="subject">Assunto</label>
    <input type="text" class="form-control" id="subject" name="subject" placeholder="Digite o assunto" required>
  </div>
</div>

<div class="col-md-12">
  <div class="form-group">
    <label for="message">Mensagem</label>
    <textarea class="form-control" rows="5" id="message" name="message" placeholder="Digite sua mensagem" required></textarea>
  </div>
</div>

<div class="col-md-12">
  <button type="submit" class="btn btn-primary">Enviar</button>
</div>

</div>
</form>
</div>
<footer class="bg-dark text-white py-3">
    <div class="container">
      <?php include_once("rodape.php"); ?>
    </div>
  </footer>
</body>

<!-- Bootstrap core JS -->
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</html>

