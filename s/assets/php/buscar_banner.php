<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');

	$tipo = $_POST['tipo'];
	$modelo = $_POST['modelo'];
	$formato = $_POST['formato'];
	$local = $_POST['local'];
	$posicao = $_POST['posicao'];

	$sql = $conn->prepare( "

		SELECT codigo_tipo_banner FROM sgmp_tipo_banner 
			WHERE nome = '$tipo' 
			AND modelo = '$modelo'
			AND formato = '$formato'
			AND local = '$local'
			AND posicao = '$posicao'
			AND ativo = 1
		" );
    $sql->execute();

	// echo '<option value="0">'.htmlentities('Selecione a Posição').'</option>';

	while( $row = $sql->fetch() ){
		echo $row['0'];
	}

?>