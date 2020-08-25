<?php /* Template Name: Contato*/

	if( !isset($_SESSION) ){ session_start(); }

	$_SESSION['page'] = "contato";

	get_header(); 

	include ('include/visita.php');

	include ('include/local.php');

	get_footer();
?>