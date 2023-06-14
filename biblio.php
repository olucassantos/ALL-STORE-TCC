<?php

function data_extenso()
{
  $dia_da_semana = array("Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado");
  
  $mes_extenso = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
  
  $dia = date("d"); // 01-31
  $mes = date("n") - 1; // 1-12
  $ano = date("Y"); // YYYY
  $dia_sem = date("w"); // 0-6  
   
  // $data_final = $dia_da_semana[$dia_sem] . ", $dia de " . $mes_extenso[$mes] . " de $ano";
  $data_final = "$dia de " . $mes_extenso[$mes] . " de $ano";
  return $data_final;
}

function databr($data, $opt)
{
    if ($opt == 1) {    
        $dia = substr($data, 0, 2);
        $mes = substr($data, 3, 2);
        $ano = substr($data, 6, 4);
        $databr = $ano . "-" . $mes . "-" . $dia;
    } else {
        $dia = substr($data, 8, 2);
        $mes = substr($data, 5, 2);
        $ano = substr($data, 0, 4);
        $databr = $dia . "/" . $mes . "/" . $ano;
    }
    return $databr;
}

function limitarString($texto, $limite)
{
    if (strlen($texto) <= $limite) {
        return $texto;
    } else {	
        $corta = substr($texto, 0, $limite);
        $espaco = strrpos($corta, ' ');
        return substr($texto, 0, $espaco);
    }
}

function anti_sql_injection($str)
{
    if (!is_numeric($str)) {
        $str = addslashes($str);
    }
    return $str;
}

function gen_slug($str)
{
    // Special characters and their replacements
    $a = array('Á','á','Â','â','Ã','ã','Ä','ä','Å','å','Æ','æ','Ç','ç','È','è','É','é','Ê','ê','Ë','ë','Ì','ì','Í','í','Î','î','Ï','ï','Ð','ð','Ñ','ñ','Ò','ò','Ó','ó','Ô','ô','Õ','õ','Ö','ö','Ø','ø','Ù','ù','Ú','ú','Û','û','Ü','ü','Ý','ý','Þ','þ','ß','ÿ','A','a','A','a','A','a','A','a','A','a','A','a','A','a','A','a','B','b','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','Ì','ì','J','j','K','k','L','l','L','l','L','l','Å','å','L','l','N','n','N','n','N','n','Ñ','O','o','O','o','O','o','Û','û','R','r','R','r','R','r','S','s','S','s','S','s','È','è','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ý','Z','z','Z','z','Ž','ž','S','s','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','Y','y',' ','-','/','&','.',',');
    $b = array('A','a','A','a','A','a','A','a','A','a','A','a','C','c','E','e','E','e','E','e','E','e','I','i','I','i','I','i','I','i','D','d','N','n','O','o','O','o','O','o','O','o','O','o','O','o','U','u','U','u','U','u','U','u','U','u','Y','y','b','y','A','a','A','a','A','a','A','a','A','a','A','a','A','a','A','a','B','b','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','I','i','J','j','K','k','L','l','L','l','L','l','L','l','L','l','N','n','N','n','N','n','N','O','o','O','o','O','o','O','o','U','u','R','r','R','r','R','r','S','s','S','s','S','s','E','e','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','S','s','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','Y','y','-','-','-','-','-','-');
    return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), str_replace($a, $b, $str)));
}
?>
