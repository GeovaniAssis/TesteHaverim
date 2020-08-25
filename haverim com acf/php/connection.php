<?php

$host_name = "sql103.epizy.com";
$database = "epiz_26551369_bd_haverim";
$user     = "epiz_26551369";
$password = "HxYMqREgtn3";

try{
	$conn = new PDO('mysql:host='.$host_name.';dbname='.$database,$user,$password);
}catch(PDOException $e){
	print "Error: ".$e->getMessage()."<br/>";
}

?>