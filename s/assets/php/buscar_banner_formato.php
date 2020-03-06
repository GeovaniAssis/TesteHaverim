<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');

	$tipo = $_POST['tipo'];
	$modelo = $_POST['modelo'];
	
	$sql = $conn->prepare( "
		SELECT formato FROM sgmp_tipo_banner
			WHERE nome = '$tipo'
				AND modelo = '$modelo'
				AND ativo = 1
					GROUP BY formato
		" );

    $sql->execute();

	echo '<option value="0">'.htmlentities('Selecione o Formato').'</option>';

	while( $row = $sql->fetch() ){
		echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}

?>