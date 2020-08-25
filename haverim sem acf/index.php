<?php /* Template Name: Index*/

	if( !isset($_SESSION) ){ session_start(); }

	$_SESSION['page'] = "home";

	get_header(); 

	include ('pages/include/carosel_home.php');

	include ('pages/include/somos.php');

	include ('pages/include/destaque.php');

	include ('pages/include/visita.php');

	include ('pages/include/blog.php');

	include ('pages/include/local.php');

	get_footer();

?>