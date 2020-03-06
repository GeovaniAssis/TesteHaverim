<?php
	include ($_SERVER["DOCUMENT_ROOT"].'/abq/wp-content/themes/abq/php/connection.php');

	$nome_cat = $_POST['nome_cat'];
	$sql = $conn->prepare( "CALL p_R_CategoriaCampanha('$nome_cat');");
    $sql->execute();

	while( $row = $sql->fetch() ){
		echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}

?>