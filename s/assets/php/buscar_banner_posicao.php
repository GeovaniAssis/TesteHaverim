<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');

	$tipo = $_POST['tipo'];
	$modelo = $_POST['modelo'];
	$formato = $_POST['formato'];
	$local = $_POST['local'];

	$sql = $conn->prepare( "

		SELECT posicao FROM sgmp_tipo_banner 
			WHERE nome = '$tipo' 
				AND modelo = '$modelo'
				AND formato = '$formato'
				AND local = '$local'
				AND ativo = 1
					GROUP BY posicao

		" );
    $sql->execute();

	echo '<option value="0">'.htmlentities('Selecione a Posição').'</option>';

	while( $row = $sql->fetch() ){
		echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}

?>