<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');

	$tipo = $_POST['tipo'];
	$modelo = $_POST['modelo'];
	$codigo = $_POST['codigo'];
	
	$sql = $conn->prepare( "CALL p_R_FormatoTipoBanner('$tipo', '$modelo', '$codigo');");
    $sql->execute();


	while( $row = $sql->fetch() ){
		echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}

?>