<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');

	$codigo = $_POST['codigo'];
	$tipo = $_POST['tipo'];
	$formato = $_POST['formato'];
	$modelo = $_POST['modelo'];

	$sql = $conn->prepare( "SELECT formato FROM sgmp_tipo_banner WHERE NOT formato = '$formato' AND nome = '$tipo' AND modelo = '$modelo' GROUP BY formato;");
    $sql->execute();


	while( $row = $sql->fetch() ){
		echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}

?>