<?php
	include ('connection.php');

	$id = $_POST['id'];

	$gid = $conn->prepare(" SELECT COUNT(cd_anuidade) as total FROM in_dashboard WHERE cd_anuidade = :id ");
    $gid->bindParam(':id', $id);

    $gid->execute();
    $getid = $gid->fetchColumn();

    if($getid == 0){

		$sql = $conn->prepare("UPDATE in_anuidade SET ds_excluir = 1 WHERE cd_anuidade = :id");
		$conn->exec("set names utf8");
		$sql->bindParam(':id', $id);
		
		if($sql->execute()){
		   	echo "Sucesso";
		}else{
		   	echo "Errinho";
		}

    }else{
    	echo 3;
    }		
?>		                      