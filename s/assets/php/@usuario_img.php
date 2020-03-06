<?php

// header('Content-type: image/jpeg');

// $source_x = $_POST['x'];
// $source_y = $_POST['y'];
// $width = $_POST['w'];
// $height = $_POST['h'];

// $dest = imagecreatetruecolor($width, $height);

// $src = imagecreatefromjpeg($_POST['img-src']);

// imagecopy($dest, $src, 30, 30, $source_x, $source_y, $width, $height);

// $cropped_image = './assets/files/principal';

// imagejpeg($dest, $cropped_image, 100);

// $to_crop_array = array('x' =>$source_x , 'y' => $source_y, 'width' => $width, 'height'=> $height);
// $dest = imagecrop($src, $to_crop_array);





 // $targ_w = $targ_h = 150;
 // $jpeg_quality = 90;
 
 // $src = 'http://concepts.summercomunicacao.com.br/abq/s/assets/files/crop'.$_POST['src'];
 // $img_r = imagecreatefromjpeg($src);
 // $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
 
 // imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
 
 // header('Content-type: image/jpeg');
 // imagejpeg($dst_r,null,$jpeg_quality);






$imagem = $_POST['src'];
 
// Separando tipo dos dados da imagem
// $tipo: data:image/png
// $dados: base64,AAAFBfj42Pj4
list($tipo, $dados) = explode(';', $imagem);
 
// Isolando apenas o tipo da imagem
// $tipo: image/png
list(, $tipo) = explode(':', $tipo);
 
// Isolando apenas os dados da imagem
// $dados: AAAFBfj42Pj4
list(, $dados) = explode(',', $dados);
 
// Convertendo base64 para imagem
$dados = base64_decode($dados);
 
// Gerando nome aleatório para a imagem
$nome = md5(uniqid(time()));

// Salvando imagem em disco
file_put_contents("http://concepts.summercomunicacao.com.br/abq/s/assets/files/crop/{$nome}.jpg", $dados);


?>