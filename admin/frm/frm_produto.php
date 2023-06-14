<?php
	 include_once("./classes/DadosDoBanco.php");// fix the class name here
	 include_once("./classes/Dadosdacategoria.php");// fix the class name here
	$acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
	$id = isset($_GET["id"]) ? $_GET["id"] : "";
	$txt_id_categoria =  "";
	$txt_titulo =	 "";
	$txt_preco	=  "";
	$txt_ativo 	=  "";
	$txt_autor =  "";
	$txt_duracao=  "";
	$txt_slug_produto  =  "";
	$txt_descricao 	=  "";
	$txt_conteudo 	=  "";
	$txt_nomeimagem= "";
	
	if ($acao !== "") {
		
		$dados = new DadosProduto();
		$dados->setId($id);
		$dados->mostrarDados();
	
		$txt_id_categoria = $dados->getIdCategoria();
		$txt_titulo = $dados->getTituloProduto();
		$txt_preco = $dados->getPreco();
		$txt_ativo = $dados->getAtivoProduto();
		$txt_autor = $dados->getAutor();
		$txt_duracao = $dados->getDuracao();
		$txt_descricao = $dados->getDescricao();
		$txt_conteudo = $dados->getConteudo();
		$txt_slug_produto = $dados->getSlugProduto();
		$txt_nomeimagem= ($acao != '') ? $dados->getImagemProduto() : '';
	}
?>

<div id="formulario">
	<h2> Cadastro de Produto </h2>
	<form action="./op/op_produto.php" method="post" enctype="multipart/form-data">

		<label class="imagem">
			<span class="titulo">Selecione uma imagem </span>
			<input type="file" name="img"  value="<?php echo htmlspecialchars($txt_nomeimagem); ?>">


		</label>

		<label>
		<span class="titulo">Título do produto </span>
			<input type="text" name="txt_titulo" id="txt_titulo" value="<?php echo htmlspecialchars($txt_titulo); ?>">
		</label>

		<label>
			<span class="titulo">Descrição </span>
			<textarea name="txt_descricao" id="txt_descricao" cols="30" rows="6"><?php echo htmlspecialchars($txt_descricao); ?></textarea>
		</label>


		<div class="tres-campos">
			<label>
				<span class="titulo">Preço </span>
				<input type="text" name="txt_preco" id="txt_preco" value="<?php echo htmlspecialchars($txt_preco); ?>">
			</label>
			<label>
				<span class="titulo">Condição </span>
				<input type="text" name="txt_duracao" id="txt_duracao" value="<?php echo htmlspecialchars($txt_duracao); ?>">
			</label>
			<label>
				<span class="titulo">Ativo </span>
				<select name="txt_ativo" id="txt_ativo">
					<option value="S" <?php if ($txt_ativo == "S") { echo "selected"; } ?>> Sim </option>
					<option value="N" <?php if ($txt_ativo == "N") { echo "selected"; } ?>> Não </option>
				</select>
			</label>
		</div>
			<label>
				<span class="titulo">Estoque: </span>
				<textarea name="txt_conteudo" id="txt_conteudo" cols="30" rows="6"><?php echo htmlspecialchars($txt_conteudo); ?> </textarea>
			</label>
			<div class="dois-campos">
				<label>
					<span class="titulo">Vendedor</span>
					<input type="text" name="txt_autor" id="txt_autor" value="<?php echo htmlspecialchars($txt_autor); ?>">
										</label>
										<label>
  <span class="titulo">Selecione a categoria </span>
  <select name="txt_id_categoria" id="txt_id_categoria">
    <?php 
      $cb = new DadosCategoria();
      $cb->comboCategoria($txt_id_categoria);
    ?>			
  </select>
</label>
</div>

<input type="hidden" name="nome_imagem" value="<?php echo $txt_nomeimagem; ?>" />
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<input type="hidden" name="acao" value="<?php if ($acao!=""){ echo $acao;}else{echo "Inserir";} ?>" />
<input type="submit" value="<?php if ($acao!=""){ echo $acao;}else{echo "Inserir";} ?>" class="botao" />

</form>



</div>