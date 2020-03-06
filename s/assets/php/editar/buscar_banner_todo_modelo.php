<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');

	$codigo = $_POST['codigo'];
	$tipo = $_POST['tipo'];
	$modelo = $_POST['modelo'];

	$sql = $conn->prepare( "SELECT modelo FROM sgmp_tipo_banner WHERE NOT modelo = '$modelo' AND nome = '$tipo' GROUP BY modelo;");
    $sql->execute();


	while( $row = $sql->fetch() ){
		echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}

?>