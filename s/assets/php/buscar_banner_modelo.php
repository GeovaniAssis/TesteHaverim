<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');

	$tipo = $_POST['tipo'];
	$sql = $conn->prepare( "SELECT modelo FROM sgmp_tipo_banner WHERE nome = '$tipo' AND ativo = 1 GROUP BY modelo" );
    $sql->execute();

	echo '<option value="0">'.htmlentities('Selecione o Modelo').'</option>';

	while( $row = $sql->fetch() ){
		echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}

?>