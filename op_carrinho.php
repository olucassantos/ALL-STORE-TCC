<?php
session_start();

include_once("admin/classes/manipulacaoDeDados.php");



$cad = new manipulacaoDeDados();

	
include_once("admin/classes/DadosDoBanco.php");	
include "biblio.php";

$cliente= new DadosCliente();
$carrinho	= new DadosCarrinho();
$venda		= new DadosVenda();
$itens		= new DadosItensVenda();



$acao = isset($_POST["acao"]) ? $_POST["acao"] : "";
$id_produto = isset($_POST["id_produto"]) ? $_POST["id_produto"] : "";
$txt_valor = isset($_POST["txt_valor"]) ? $_POST["txt_valor"] : "";
$txt_valor = 10;

if (!isset($_SESSION["id_pedido_curso"])) {
    $_SESSION["id_pedido_curso"] = 0;
}

$data = date("Y-m-d");
$id_cliente = 1;


$cad->setTabela("pedido");
$cad->setCampos("id_cliente, data_pedido, total_pedido,status");
$cad->setDados("$id_cliente,$data,0,'aberto'");
$cad->inserir();

$ultimoCodigo = $cad->ultimoRegistro("id_pedido", "pedido");

if ($ultimoCodigo != 0 && $ultimoCodigo != "") {
    $_SESSION["id_pedido_curso"] = $ultimoCodigo;
} else {
    // lógica para tratar erro
}
$id_pedido = $_SESSION["id_pedido_curso"];
$cad->setTabela("carrinho");

if ($acao == "INSERIR") {
    $sql = "SELECT * FROM carrinho WHERE id_produto = '$id_produto' and id_pedido='$id_pedido'";
    $totalReg = $carrinho->totalRegistros($sql);

    if ($totalReg > 0) {
        $cad->setValorNaTabela("id_pedido");
        $cad->setValorPesquisa("'$id_pedido' and id_produto = '$id_produto'");
        $cad->setCampos("qtde = qtde + 1");
        $cad->setDados("'$id_pedido','$id_produto','$txt_valor','1'");
        $cad->alterar();
    } else {
        $cad->setCampos("id_pedido, id_produto, valor, qtde");
        $cad->setDados("'$id_pedido','$id_produto','$txt_valor','1'");
        $cad->inserir();
    }

    header('Location: carrinho.php');
}

if ($acao == "ALTERAR") {
    $v_atualiza = $_POST['codprod'];
$chave = array_keys($v_atualiza);

for ($i = 0; $i < sizeof($chave); $i++) {
    $indice = $chave[$i];
    $txt_qtde = $v_atualiza[$indice]['QTDE'];
    $id_produto = $v_atualiza[$indice]['IDPRODUTO'];

        $cad->setValorNaTabela("id_pedido");
        $cad->setValorPesquisa("'$id_pedido' and id_produto = '$id_produto'");

        if ($txt_qtde > 0) {
            $cad->setCampos("qtde = '$txt_qtde'");
            $cad->alterar();
        } else {
            $cad->excluir();
            $sql = "SELECT * FROM carrinho WHERE id_pedido=$id_pedido";
            $quant = $carrinho->totalRegistros($sql);

            if ($quant == 0) {
                unset($_SESSION["id_pedido_curso"]);
            }
        }
    }
}