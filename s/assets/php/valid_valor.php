<?php

	$valor 	 = $_POST['valor'];
	$idProduto = $_POST['idProduto']; 
	$correto = 0;
	require("vendor/autoload.php");
    include ('PHPMailer/class.phpmailer.php');
    require 'PHPMailer/PHPMailerAutoload.php';
	
	try {
		include('connection.php');
        $sql = $conn->prepare("SELECT in_dashboard.ativo FROM in_dashboard INNER JOIN in_anuidade ON in_anuidade.cd_anuidade = in_dashboard.cd_anuidade WHERE in_dashboard.cd_dashboard = '".$idProduto."' AND in_anuidade.vl_anuidade = '".$valor."';");
        $sql->execute();
        $correto = $sql->fetchColumn();
        
	} catch (PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	
    echo $correto;

?>