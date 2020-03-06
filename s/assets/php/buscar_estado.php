<?php
	$con = 	mysql_connect( 'mysql.summercomunicacao.com.br', 'summercomunic199', 'jobsummer32' );
  	 							mysql_select_db( 'summercomunic199', $con );
	
	$estado_id = $_POST['txt_estado'];
	$estado_nome = $_POST['nome_estado'];
	$sql = "SELECT nome from tb_cidades Where estado = '$estado_id' ORDER BY nome ASC";
	$qr = mysql_query($sql) or die(mysql_error());
	 
	if(mysql_num_rows($qr) == 0 || $_POST['txt_estado'] == ""){
	   echo  '<option value="0">'.htmlentities('Tente novamente').'</option>';
	 
	}else{
	   echo '<option value="0">'.htmlentities('Selecione').'</option>';
	   while($ln = mysql_fetch_assoc($qr)){
		  echo '<option value="'.$ln['nome'].'">'.$ln['nome'].'</option>';
	   }
	}	
?> 

			                      