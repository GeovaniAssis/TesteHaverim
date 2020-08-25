<?php /* Template Name: Atuação*/
	if( !isset($_SESSION) ){ session_start(); }
	$_SESSION['page'] = "atuacao";
	get_header(); 
?>

	<section id="local">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="font--open-sans">Nossa atuação abrange<br>um raio de aproximadamente</h3>
					<p class="font--open-sans">200 km dentro do Estado de São Paulo</p>
				</div>
			</div>
		</div>
	</section>

<?php 
	include ('include/visita.php');

	get_footer();
?>