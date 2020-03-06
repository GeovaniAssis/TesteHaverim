<?php


  /*
  *   Função que habilita as imagens destacadas em posts
  */
   add_theme_support( 'post-thumbnails' );

  /*
  *   Função que limpa strings com base nos caracteres especificados
  */
  function limpa_str($str){
    $c = array('Ç', 'ç');
    $a = array('Á', 'À', 'Ä', 'Â', 'Ã', 'á', 'à', 'ä', 'â', 'â', 'ã');
    $e = array('Ë', 'É', 'Ê', 'ë', 'é', 'ê' , '&');
    $i = array('Ï', 'Í', 'ï', 'í');
    $o = array('Ö', 'Ó', 'Ô', 'Õ', 'ö', 'ó', 'ô', 'õ');
    $u = array('Ü', 'Ú', 'ü', 'ú');
    return str_replace('(', '', str_replace(')', '', str_replace('/', '', str_replace($c, 'c', str_replace($a, 'a', str_replace($e, 'e', str_replace($i, 'i', str_replace($o, 'o', str_replace($u, 'u', str_replace(' ', '-', $str))))))))));
  }

  /*
  *   Função que retorna frase com número de palavras especificado, como um resumo
  */
  function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    
    if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      $excerpt = implode(" ",$excerpt).'...';
    } else {
      $excerpt = implode(" ",$excerpt).'...';
    }

    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
  }

  /*
  *   Adicione as funções que necessitar abaixo: 
  *   (existe um repositório de funções no basicWP, dê uma olhada)
  */


?>