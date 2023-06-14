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
<html>
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


    </style>
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
<body>
    <div class="container">
        <h1>Painel do Cliente</h1>
        <?php
        require_once "admin/classes/DadosDoBanco.php";

        $cliente = new DadosCliente();
        $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
        $id = isset($_GET["id"]) ? $_GET["id"] : "";

        if (isset($_GET['id'])) {
            $idCliente = $_GET['id'];
            $cliente->setId($idCliente);
            $cliente->mostrarDados();
        } else {
            echo "<p>Nenhum ID de cliente fornecido.</p>";
        }

        $txt_cliente    = $cliente->getCliente();
        $txt_endereco   = $cliente->getEndereco();
        $txt_cidade     = $cliente->getCidade();
        $txt_bairro     = $cliente->getBairro();
        $txt_uf         = $cliente->getUf();
        $txt_cep        = $cliente->getCep();
        $txt_email      = $cliente->getEmail();
        $txt_sexo       = $cliente->getSexo();
        $txt_fone       = $cliente->getFone();
        $txt_senha      = $cliente->getSenha();
        $txt_ativo      = $cliente->getAtivo();
        ?>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#meus-dados">Alteração de Dados</a>
            </li>
        </ul>
            <div class="tab-pane fade" id="meus-dados">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Meus Dados</h5>
                        <form action="op_cliente.php" method="post" name="form2" id="form2" onsubmit="return validar()">
                            <div class="form-group">
                                <label for="txt_cliente">Nome Completo*</label>
                                <input type="text" class="form-control" name="txt_cliente" id="txt_cliente" value="<?php echo $txt_cliente; ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_endereco">Endereço*</label>
                                <input type="text" class="form-control" name="txt_endereco" id="txt_endereco" value="<?php echo $txt_endereco; ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_cidade">Cidade*</label>
                                <input type="text" class="form-control" name="txt_cidade" id="txt_cidade" value="<?php echo $txt_cidade; ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_bairro">Bairro*</label>
                                <input type="text" class="form-control" name="txt_bairro" id="txt_bairro" value="<?php echo $txt_bairro; ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_uf">UF*</label>
                                <input type="text" class="form-control" name="txt_uf" id="txt_uf" value="<?php echo $txt_uf; ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_cep">CEP*</label>
                                <input type="text" class="form-control" name="txt_cep" id="txt_cep" value="<?php echo $txt_cep; ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_fone">Telefone*</label>
                                <input type="text" class="form-control" name="txt_fone" id="txt_fone" value="<?php echo $txt_fone; ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_sexo">Sexo</label>
                                <select name="txt_sexo" id="txt_sexo" class="form-control">
                                    <option value="M" <?php if ($txt_sexo == "M") echo "selected"; ?>>Masculino</option>
                                    <option value="F" <?php if ($txt_sexo == "F") echo "selected"; ?>>Feminino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txt_email">E-mail (login)*</label>
                                <input type="text" class="form-control" name="txt_email" id="txt_email" value="<?php echo $txt_email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_senha">Senha (Sua senha antiga não sera mostrada!)* </label>
                                <input type="password" class="form-control" name="txt_senha" id="txt_senha" value="<?php echo $txt_senha; ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_ativo">Ativo</label>
                                <select name="txt_ativo" id="txt_ativo" class="form-control">
                                    <option value="1" <?php if ($txt_ativo == "1") echo "selected"; ?>>Sim</option>
                                    <option value="0" <?php if ($txt_ativo == "0") echo "selected"; ?>>Não</option>
                                </select>
                            </div>
                            <input type="hidden" name="acao" value="Alterar_cadastro">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white py-3">
    <div class="container">
      <?php include_once("rodape.php"); ?>
    </div>
  </footer>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        function validar() {
            var email = document.getElementById("txt_email").value;
            var senha = document.getElementById("txt_senha").value;

            if (email.trim() == "") {
                alert("Por favor, preencha o campo E-mail.");
                return false;
            }

            if (senha.trim() == "") {
                alert("Por favor, preencha o campo Senha.");
                return false;
            }
        }
    </script>
</body>
</html>
