<h1><?php echo $produto->getTituloProduto(); ?></h1>
                <h2><?php echo $produto->getPreco(); ?></h2>
                <h2><?php echo $produto->getDuracao(); ?></h2>
                <h2><?php echo $produto->getAutor(); ?></h2>
                <p><?php echo $produto->getDescricao(); ?></p>


                <body>
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h1 class="text-center">Login</h1>
					</div>
					<div class="card-body">
						<?php 
						// Verifica se há uma mensagem de erro e exibe na tela
						if (isset($_SESSION['erro_login'])) {
							echo '<div class="alert alert-danger">'.$_SESSION['erro_login'].'</div>';
							unset($_SESSION['erro_login']);
						}
						?>
						<form action="loginenter.php" method="POST">
							<div class="mb-3">
								<label for="email" class="form-label">E-mail</label>
								<input type="email" class="form-control" id="email" name="email" required>
							</div>
							<div class="mb-3">
								<label for="senha" class="form-label">Senha</label>
								<input type="password" class="form-control" id="senha" name="senha" required>
							</div>
							<div class="d-grid gap-2">
								<button type="submit" class="btn btn-primary" name="cliente">Entrar como Cliente</button>
								<button type="submit" class="btn btn-secondary" name="admin">Entrar como Administrador</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

        </div>
    <div class="card-body">
      <h5 class="card-title"><a href="index.php?link=2&id=<?php echo $produto->getId(); ?>"><?php echo $produto->getTituloProduto(); ?></a></h5>
      <p class="card-text"><strong>R$ <?php echo $produto->getPreco(); ?></strong></p>
      <a href="/alltcc/carrinho.php" class="btn btn-primary">Comprar</
    </div>


    <div class="card-body">
            <h5 class="card-header"><a href="index.php?link=2&id=<?php echo $produto->getId(); ?>"></h5>
            <h5 class="card-title"><?php echo $produto->getTituloProduto(); ?></a></h5>
            <h5 class="card-text">R$ <?php echo number_format($produto->getPreco()[$j]['preco'], 2, ',', '.'); ?></h5>
            <a href="/alltcc/carrinho.php" class="btn btn-primary">Comprar</
        </div>