<?php
include_once("../classes/manipulacaoDeDados.php");
require_once "../classes/DadosDoBanco.php";
$acao = isset($_POST["acao"]) ? $_POST["acao"] : "";
$id = isset($_POST["id"]) ? $_POST["id"] : "";

$cad = new manipulacaoDeDados();
$cad->setTabela("cliente");

// Obtenção dos dados do formulário
$txt_cliente = isset($_POST["txt_cliente"]) ? $_POST["txt_cliente"] : "";
$txt_endereco = isset($_POST["txt_endereco"]) ? $_POST["txt_endereco"] : "";
$txt_ativo = isset($_POST["txt_ativo"]) ? $_POST["txt_ativo"] : "";
$txt_cidade = isset($_POST["txt_cidade"]) ? $_POST["txt_cidade"] : "";
$txt_bairro = isset($_POST["txt_bairro"]) ? $_POST["txt_bairro"] : "";
$txt_uf = isset($_POST["txt_uf"]) ? $_POST["txt_uf"] : "";
$txt_cep = isset($_POST["txt_cep"]) ? $_POST["txt_cep"] : "";
$txt_email = isset($_POST["txt_email"]) ? $_POST["txt_email"] : "";
$txt_sexo = isset($_POST["txt_sexo"]) ? $_POST["txt_sexo"] : "";
$txt_fone = isset($_POST["txt_fone"]) ? $_POST["txt_fone"] : "";
$txt_senha = isset($_POST["txt_senha"]) ? $_POST["txt_senha"] : $dados->getSenha();


if ($acao == "Inserir") {
  $cad->setCampos("cliente, endereco, cidade, bairro, uf, cep, email, senha2, ativo_cliente, fone, sexo");
  $cad->setDados("'$txt_cliente', '$txt_endereco', '$txt_cidade', '$txt_bairro', '$txt_uf', '$txt_cep', '$txt_email', '$txt_senha', '$txt_ativo', '$txt_fone', '$txt_sexo'");
  $cad->inserir();

  echo "<script type='text/javascript'> alert('Registro inserido com sucesso!'); location.href='../index.php?link=13' </script> ";
}

if ($acao == "Alterar") {
  $cad->setCampos("cliente='$txt_cliente', endereco='$txt_endereco', cidade='$txt_cidade', bairro='$txt_bairro', uf='$txt_uf', cep='$txt_cep', email='$txt_email', senha2='$txt_senha', ativo_cliente='$txt_ativo', fone='$txt_fone', sexo='$txt_sexo'");
  $cad->setValorNaTabela("id_cliente");
  $cad->setValorPesquisa("$id");
  $cad->alterar();

  echo "<script type='text/javascript'> alert('Registro alterado com sucesso!'); location.href='../index.php?link=13' </script> ";
}

if ($acao == "Excluir") {

  $cad->setValorNaTabela("id_cliente");
  $cad->setValorPesquisa("$id");
  $cad->excluir();

  echo "<script type='text/javascript'> alert('Registro excluído com sucesso!'); location.href='../index.php?link=13' </script> ";
}
?>
