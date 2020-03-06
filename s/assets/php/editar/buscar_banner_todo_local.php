<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');

	$codigo = $_POST['codigo'];
	$formato = $_POST['formato'];
	$modelo = $_POST['modelo'];
	$local = $_POST['local'];
	$tipo = $_POST['tipo'];


	$sql = $conn->prepare( "SELECT local FROM sgmp_tipo_banner WHERE NOT local = '$local' AND nome = '$tipo' AND formato = '$formato' AND modelo = '$modelo'  GROUP BY local;");
    $sql->execute();


	while( $row = $sql->fetch() ){
		echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}

?>