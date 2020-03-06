<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');

	$codigo = $_POST['codigo'];
	$tipo = $_POST['tipo'];
	$formato = $_POST['formato'];
	$modelo = $_POST['modelo'];
	$local = $_POST['local'];
	$posicao = $_POST['posicao'];


	$sql = $conn->prepare( "SELECT posicao FROM sgmp_tipo_banner WHERE NOT posicao = '$posicao' AND nome = '$tipo' AND formato = '$formato' AND modelo = '$modelo' AND local = '$local'  GROUP BY posicao;");
    $sql->execute();


	while( $row = $sql->fetch() ){
		echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}

?>