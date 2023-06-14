<?php 

include ("admin/classes/DadosDoBanco.php");
include ("banco.php");
if (isset($_GET['id'])) {
  $id = $_GET['id'];
$produto = new DadosProduto();
$produto->setId("$id");
$produto->mostrarDados();
}




?>



<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <img src="admin/fotos/<?php echo $produto->getImagemProduto(); ?>" class="img-fluid rounded" alt="">
        </div>
        <div class="col-md-6">
            <h1><?php echo $produto->getTituloProduto(); ?></h1>
            <h2><?php echo $produto->getPreco(); ?></h2>
            <h3>Condição: <?php echo $produto->getDuracao(); ?></h3>
            <h4>Vendedor: <?php echo $produto->getAutor(); ?></h4>
            <p><?php echo $produto->getDescricao(); ?></p>
            <h5>Estoque: <?php echo $produto->getConteudo(); ?></h5>
            <button type="button" class="btn btn-primary" id="comprarBtn">Comprar</button>
        </div>
    </div>
</div>



<!-- Produtos -->
<div class="col-md-9">
    <div class="row">
        <?php
            // obtém o ID da categoria do produto atual
            $id_categoria = $produto->getIdCategoria();

            // prepara a consulta SQL para buscar os produtos com a mesma categoria
            $sql = "SELECT * FROM produto WHERE id_categoria = :id_categoria AND id_produto != :id_produto";
            $stmt = $PDO->prepare($sql);
            $stmt->bindValue(':id_categoria', $id_categoria);
            $stmt->bindValue(':id_produto', $id);
            $stmt->execute();

            // exibe os produtos com a mesma categoria
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $item) { ?>

                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="./index.php?link=2&id=<?= $item['id_produto'] ?>">
                            <img class="card-img-top" src="admin/fotos/<?= $item['imagem_produto'] ?>" alt="">
                        </a>

                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="./index.php?link=2&id=<?= $item['id_produto'] ?>"><?= $item['titulo_produto'] ?></a>
                            </h4>
                            <h5>R$ <?= $item['preco'] ?></h5>
                            
                        </div>
                        
                    </div>
                </div>

            <?php } ?>
    </div>
</div>
<footer class="bg-dark text-white py-3">
    <div class="container">
      <?php include_once("rodape.php"); ?>
    </div>
  </footer>
