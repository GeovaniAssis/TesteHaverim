<?php

$host_name = "mysql.summercomunicacao.com.br";
$database = "summercomunic203";
$user     = "summercomunic203";
$password = "jobsummer32";

try{
	$conn = new PDO('mysql:host='.$host_name.';dbname='.$database,$user,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	// $conn->exec("set names utf8");
}catch(PDOException $e){
	print "Error: ".$e->getMessage()."<br/>";
}

?>