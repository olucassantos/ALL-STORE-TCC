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

include "admin/classes/DadosDoBanco.php";

$cliente = new DadosCliente()
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
    <link rel="shortcut icon" href="imagens/favi.ico" type="image/x-icon">
     
    <!-- Custom styles for this template -->
    <link href="assets/css/custom.css" rel="stylesheet">
</head>

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

<div class="container my-5">
  <h2 class="text-center mb-4">Cadastro de Cliente e Vendedor</h2>
  <form action="processa_cadastro.php" method="POST" class="row g-3">
    <div class="col-md-6">
      <label for="cliente" class="form-label">Nome:</label>
      <input type="text" class="form-control" id="cliente" name="cliente" value="<?php echo $cliente->getCliente(); ?>" required>
    </div>
    <div class="col-md-6">
      <label for="endereco" class="form-label">Endereço:</label>
      <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $cliente->getEndereco(); ?>" required>
    </div>
    <div class="col-md-6">
      <label for="cidade" class="form-label">Cidade:</label>
      <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $cliente->getCidade(); ?>" required>
    </div>
    <div class="col-md-6">
      <label for="bairro" class="form-label">Bairro:</label>
      <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $cliente->getBairro(); ?>" required>
    </div>
    <div class="col-md-6">
      <label for="estado" class="form-label">Estado:</label>
      <input type="text" class="form-control" id="estado" name="uf" value="<?php echo $cliente->getUf(); ?>" required>
    </div>
    <div class="col-md-6">
      <label for="cep" class="form-label">CEP:</label>
      <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $cliente->getCep(); ?>" required>
    </div>
    <div class="col-md-6">
      <label for="cep" class="form-label">Complemento:</label>
      <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $cliente->getComplemento(); ?>" required>
    </div>
    <div class="col-md-6">
      <label for="cep" class="form-label">Numero:</label>
      <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $cliente->getNumero(); ?>" required>
    </div>
    <div class="col-md-6">
      <label for="cep" class="form-label">DDD:</label>
      <input type="text" class="form-control" id="ddd" name="ddd" value="<?php echo $cliente->getDDD(); ?>" required>
    </div>
    <div class="col-md-6">
      <label for="telefone" class="form-label">Telefone:</label>
      <input type="text" class="form-control" id="telefone" name="fone" value="<?php echo $cliente->getFone(); ?>" required>
    </div>
    <div class="col-md-6">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $cliente->getEmail(); ?>" required>
    </div>
    <div class="col-md-6">
      <label for="senha" class="form-label">Senha:</label>
      <input type="password" class="form-control" id="senha" name="senha" required>
    </div>
    <div class="col-md-6">
      <label for="sexo" class="form-label">Sexo:</label>
      <input type="text" class="form-control" id="sexo" name="sexo" value="<?php echo $cliente->getSexo(); ?>" required>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
      <a href="./index.php" class="btn btn-secondary">Cancelar</a>
    </div>
<footer class="bg-dark text-white py-3">
    <div class="container">
      <?php include_once("rodape.php"); ?>
    </div>
  </footer>
<!-- Bootstrap core JS -->
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>