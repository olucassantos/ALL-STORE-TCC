<?php

function dataAtual()
{
    $dias_da_semana = array("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado");
    $meses_do_ano = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");

    $dia = date("d");
    $mes = date("n") - 1;
    $ano = date("Y");
    $dia_da_semana = date("w");

    $data_final = $dias_da_semana[$dia_da_semana] . ", $dia de " . $meses_do_ano[$mes] . " de $ano";
    return $data_final;
}

function dataParaBanco($data, $opt)
{
    if ($opt == 1) {
        $dia = substr($data, 0, 2);
        $mes = substr($data, 3, 2);
        $ano = substr($data, 6, 4);
        $data_banco = $ano . "-" . $mes . "-" . $dia;
    } else {
        $dia = substr($data, 8, 2);
        $mes = substr($data, 5, 2);
        $ano = substr($data, 0, 4);
        $data_banco = $dia . "/" . $mes . "/" . $ano;
    }
    return $data_banco;
}

function config_upload()
{
    $limitar_ext = "sim";
    $extensoes_validas = array(".gif", ".jpg", ".jpeg", ".png");
    $caminho_absoluto = "C:/xampp/htdocs/alltcc/admin/img";
    $limitar_tamanho = "nao";
    $tamanho_bytes = "200000";
    $sobrescrever = "nao";
}
function limitarString($string, $length = 150)
{
    if (strlen($string) <= $length) {
        return $string;
    }
    $corta = substr($string, 0, $length);
    $espaco = strrpos($corta, ' ');
    return substr($string, 0, $espaco);
}

function uploadJpg($origem, $destino, $maxlargura, $pasta){
    $imagem = imagecreatefromjpeg($origem);

    if (!$imagem) {
        return false;
    }

    $x = imagesx($imagem);
    $y = imagesy($imagem);

    $alturapermitida = 350;
    if($y > $alturapermitida){
        $percent = ($alturapermitida * 100) / $y;
        $x = round(($x * $percent) / 100);
        $y = $alturapermitida;

        $nova = imagecreatetruecolor($x, $y);
        imagecopyresampled($nova, $imagem, 0, 0, 0, 0, $x, $y, imagesx($imagem), imagesy($imagem));

        imagejpeg($nova, $pasta.'/'.$destino, 90);
        imagedestroy($nova);
        imagedestroy($imagem);

        return true;
    }
    
    imagejpeg($imagem, $pasta.'/'.$destino, 90);
    imagedestroy($imagem);

    return true;
}


function upload_png($tmp, $nome, $largura, $pasta) {
    $img = imagecreatefrompng($tmp);
    $x = imagesx($img);
    $y = imagesy($img);
    $altura = ($largura * $y) / $x;
    $nova = imagecreatetruecolor($largura, $altura);
    imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
    imagejpeg($nova, "$pasta/$nome.jpg");
    imagedestroy($nova);
    imagedestroy($img);
    return $nome;
}

function upload_gif($tmp, $nome, $largura, $pasta) {
    $img = imagecreatefromgif($tmp);
    $x = imagesx($img);
    $y = imagesy($img);
    $altura = ($largura * $y) / $x;
    $nova = imagecreatetruecolor($largura, $altura);
    imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
    imagegif($nova, "$pasta/$nome.gif");
    imagedestroy($nova);
    imagedestroy($img);
    return $nome;
}

function anti_sql_injection($str, $conn) {
    if (!is_numeric($str)) {
        $str = isset($_SERVER['magic_quotes_gpc']) && $_SERVER['magic_quotes_gpc'] ? stripslashes($str) : $str;
        $str = function_exists('mysqli_real_escape_string') ? mysqli_real_escape_string($conn, $str) : mysqli_escape_string($conn, $str);
    }
    return $str;
}

function gen_slug($str) {
    # remove special accents
    $a = array('Á','À','Ã','Â','Ä','É','È','Ê','Ë','Í','Ì','Î','Ï','Ó','Ò','Õ','Ô','Ö','Ú','Ù','Û','Ü','Ý','á','à','ã','â','ä','é','è','ê','ë','í','ì','î','ï','ó','ò','õ','ô','ö','ú','ù','û','ü','ý','ç','Ç','ñ','Ñ');
    $b = array('A','A','A','A','A','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','Y','a','a','a','a','a','e','e','e','e','i','i','i','i','o','o','o','o','o','u','u','u','u','y','c','C','n','N');
    $str = str_replace($a, $b, $str);

    # remove any remaining non-alphanumeric characters
    $str = preg_replace('/[^a-zA-Z0-9]+/', '-', $str);

    # remove any leading or trailing dashes
    $str = trim($str, '-');

    # convert to lowercase
    $str = strtolower($str);

    return $str;
}

?>