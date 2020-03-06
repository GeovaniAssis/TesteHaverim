<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');
	$tipo = $_POST['tipo'];
	$modelo = $_POST['modelo'];
	$formato = $_POST['formato'];
	$posicao = $_POST['posicao'];
	$local = $POST['local'];
	$formato = $_POST['formato'];
	$sql = $conn->prepare( "SELECT codigo_tipo_banner FROM sgmp_tipo_banner WHERE tipo = '$tipo' AND modelo = '$modelo' AND formato = '$formato' AND posicao = '$posicao' AND ativo = 1" );
    $sql->execute();

	while( $row = $sql->fetch() ){
		echo $row['0'];
	}

?>