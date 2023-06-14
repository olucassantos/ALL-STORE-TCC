
<?php
session_start();

include_once("admin/classes/manipulacaoDeDados.php");
include_once("admin/classes/DadosDoBanco.php");
include_once("admin/classes/Dadosdacategoria.php");
$cad = new manipulacaoDeDados();
include "biblio.php";

$produto  = new DadosProduto();
$carrinho = new DadosCarrinho();
$venda		= new DadosVenda();
$itens		= new DadosItensVenda();

$id_pedido = isset($_SESSION["id_pedido_curso"]) ? $_SESSION["id_pedido_curso"] : "";

if ($id_pedido != "") {
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

    .navbar-brand,
    .navbar-nav .nav-link {
      color: white;
    }

    .navbar-brand:hover,
    .navbar-nav .nav-link:hover {
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
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <img src="imagens/logocerto.png.png" alt="" height="350">
        </div>
      </div>
</section>
</head>

<body>
  <div id="base-carrinho">
    <h2 class="fundo_azul">
      <img src="imagens/barra-carrinho01.png" alt="">
    </h2>
    <h3>
      <img src="imagens/meu-carrinho.png" alt="">
    </h3>
    <div class="dados-carrinho">
      <span>Para excluir, coloque a quantidade zero e clique em "Atualizar"</span>
      <form name="frm_carrinho" action="op_carrinho.php" method="post">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Descrição do produto</th>
              <th>Quantidade</th>
              <th>Preço unitário</th>
              <th>Subtotal</th>
              <th>Atualizar</th>
            </tr>
          </thead>
          <tbody>
          <?php
				$sql= "SELECT c.*, p.* FROM carrinho c, produto p where c.id_produto = p.id_produto and id_pedido = '$id_pedido'";
				$totalReg = $carrinho->totalRegistros($sql);
				$valorTotal = 0;
					for($i=0;$i<$totalReg;$i++){
						$carrinho -> verCarrinho($sql, $i);
						$subtotal = $carrinho->getPreco() * $carrinho->getQtde();
						$valorTotal += $subtotal; 
						$codprod[$i] = $carrinho->getIdProduto();
						
			
			?>
				<tr>
					<td> 
						<img src="admin/fotos/<?php echo $carrinho->getImagemProduto()?>"alt="Curso de Firebird" width="92" height="139"> 
						<strong> <?php echo $carrinho->getTituloProduto(); ?>  </strong>
					</td>
					<td> <input type="number" id="alterar" name="codprod[<?php echo $i?>][QTDE]" value="<?php echo $carrinho->getQtde(); ?>" size="3" maxlength="3" min="0" max = "100" step="1" />  </td>
					<td><?php echo "R$ " .number_format($carrinho->getValor(),2,',','.'); ?> </td>
					<td> <?php echo "R$ " .number_format($subtotal,2,',','.'); ?> </td>
					
					
					<td> 
						<input type="hidden" name="acao" value="ALTERAR" />
						<input type="hidden" name="codprod[<?php echo $i?>][IDPRODUTO]" value="<?php echo $carrinho->getIdProduto(); ?>" />
						<input type="submit" name="Alterar" value="Alterar" /> 
					</td>		
				</tr>
				
				
				<?php } ?>
				<tr>
					<td colspan="5"> Valor total: <?php echo "R$ " .number_format($valorTotal,2,',','.'); ?> </td> 
				</tr>
			</tbody>
		</table>
	</form>
      <div id="linha">
        <a href=""><img src="imagens/finalizar-compra.png" alt=""></a>
        <a href=""><img src="imagens/continuar-comprando.png" alt=""></a>
      </div>
    </div>
    </div>
  </div>
  <?php } else { ?>
	<p>Não existe nenhum item no seu carrinho de compras</p>
<?php } ?>
  <footer class="bg-dark text-white py-3">
    <div class="container">
      <?php include_once("rodape.php"); ?>
    </div>
  </footer>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
