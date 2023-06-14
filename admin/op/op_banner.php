
<?php




include_once("../classes/manipulacaoDeDados.php");
include_once("../biblio.php");

$acao = $_POST["acao"] ?? "";
$id	  = $_POST["id"] ?? "";

$cad = new manipulacaoDeDados();
$cad->setTabela("banner");


$txt_titulo = $_POST["txt_titulo"] ?? "";
$txt_alt 	= $_POST["txt_alt"] ?? "";
$txt_url 	= $_POST["txt_url"] ?? "";
$txt_ativo 	= $_POST["txt_ativo"] ?? "";

$imagem		= $_FILES["img"] ?? [];
$txt_nomeimagem = $_POST["nome_imagem"] ?? "";


/***************************UPLOAD************************/

if(!empty($imagem['name'])){	
		
    $pasta = "C:/xampp/htdocs/Nova-loja/admin/banner";
    $permitido = array('image/jpg','image/jpeg','image/pjpeg', 'image/png', 'image/gif');
				
    $tmp =  $imagem['tmp_name'];
    $name = $imagem['name'];
    $type = $imagem['type'];	
    
    $txt_nomeimagem = 'bn-'.md5(uniqid(rand(), true)).'.jpg';

    if(!empty($name) && in_array($type, $permitido)){				
        if($type == 'image/jpeg' || $type == 'image/jpg' || $type == 'image/pjpeg') {
            uploadJpg($tmp, $txt_nomeimagem, 940, $pasta);
        } elseif($type == 'image/png') {
            upload_Png($tmp, $txt_nomeimagem, 940, $pasta);
        } elseif($type == 'image/gif') {
            upload_Gif($tmp, $txt_nomeimagem, 940, $pasta);	
        }				
    } else {
        echo "Erro: formato de arquivo não permitido.";
        exit;
    }
}

/***************************UPLOAD************************/

if($acao=="Inserir"){
    $cad->setCampos("titulo_banner, alt, url_banner, ativo_banner, imagem_banner");
    $cad->setDados("'$txt_titulo', '$txt_alt', '$txt_url', '$txt_ativo', '$txt_nomeimagem'");
    $cad->inserir();
    
    echo "<script type='text/javascript'> alert('Registro inserido com sucesso!');location.href='../index.php?link=4'; </script>";
}

if($acao=="Alterar"){
    $cad->setCampos("titulo_banner='$txt_titulo', alt='$txt_alt', url_banner='$txt_url', ativo_banner='$txt_ativo', imagem_banner='$txt_nomeimagem'");
    $cad->setValorNaTabela("id_banner");
    $cad->setValorPesquisa("$id");
    $cad->alterar();
    
    echo "<script type='text/javascript'> alert('Registro alterado com sucesso!'); location.href='../index.php?link=4'; </script>";
}

if($acao=="Excluir"){
    
    $cad->setValorNaTabela("id_banner");
    $cad->setValorPesquisa("$id");
    $cad->excluir();

    echo "<script type='text/javascript'> alert('Registro excluído com sucesso!'); location.href='../index.php?link=4'; </script>";
}
?>