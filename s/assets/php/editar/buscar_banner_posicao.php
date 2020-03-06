<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');

	$tipo = $_POST['tipo'];
	$modelo = $_POST['modelo'];
	$formato = $_POST['formato'];
	$local = $_POST['local'];
	$codigo = $_POST['codigo'];
	
	
	$sql = $conn->prepare( "CALL p_R_PosicaoTipoBanner('$tipo', '$modelo', '$formato', '$local', '$codigo');");
    $sql->execute();


	while( $row = $sql->fetch() ){
		echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}

?>