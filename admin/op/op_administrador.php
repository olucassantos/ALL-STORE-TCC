<?php


include_once("../classes/manipulacaoDeDados.php");
include_once("../biblio.php");

if (isset($_POST["acao"]) && isset($_POST["id"])) {
	$acao = $_POST["acao"];
	$id	  = $_POST["id"];

	$cat = new manipulacaoDeDados();
	$cat->setTabela("administracao");

	$txt_nome 	= isset($_POST["txt_nome"]) ? $_POST["txt_nome"] : "";
	$txt_email 	= isset($_POST["txt_email"]) ? $_POST["txt_email"] : "";
	$txt_login 	= isset($_POST["txt_login"]) ? $_POST["txt_login"] : "";
	$txt_senha 	= isset($_POST["txt_senha"]) ? $_POST["txt_senha"] : "";



	if($acao=="Inserir"){
		$cat ->setCampos("nome, email, login,senha");
		$cat ->setDados(" '$txt_nome', '$txt_email', '$txt_login', '$txt_senha'");
		$cat->inserir();

		echo "<script type='text/javascript'> alert('Registro inserido com sucesso!'); location.href='../index.php?link=11' </script> ";
	}

	if($acao=="Alterar"){
		$cat ->setCampos("	nome ='$txt_nome', 
							email='$txt_email', 
							login ='$txt_login',
							senha ='$txt_senha'");
		$cat->setValorNaTabela("id_administracao");
		$cat->setValorPesquisa("$id");
		$cat->alterar();

		echo "<script type='text/javascript'> alert('Registro alterado com sucesso!'); location.href='../index.php?link=11' </script> ";
	}

	if($acao=="Excluir"){
		$cat->setValorNaTabela("id_administracao");
		$cat->setValorPesquisa("$id");
		$cat->excluir();

		echo "<script type='text/javascript'> alert('Registro excluído com sucesso!'); location.href='../index.php?link=11' </script> ";
	}
}
?>