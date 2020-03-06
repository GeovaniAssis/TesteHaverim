<?php
	include ($_SERVER["DOCUMENT_ROOT"].'wp-content/themes/abq/php/connection.php');

	$codigo = $_POST['codigo'];
	$tipo = $_POST['tipo'];

	$sql = $conn->prepare( "SELECT nome FROM sgmp_tipo_banner WHERE NOT nome = '$tipo' GROUP BY nome;");
    $sql->execute();


	while( $row = $sql->fetch() ){
		echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}

?>