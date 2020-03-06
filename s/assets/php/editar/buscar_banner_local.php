<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');

	$tipo = $_POST['tipo'];
	$modelo = $_POST['modelo'];
	$formato = $_POST['formato'];
	$codigo = $_POST['codigo'];
	
	
	$sql = $conn->prepare( "CALL p_R_LocalTipoBanner('$tipo', '$modelo', '$formato', '$codigo');");
    $sql->execute();


	while( $row = $sql->fetch() ){
		echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}

?>