<?php
	if( !isset($_SESSION) ){ session_start(); }
	$_SESSION['page'] = "";
	get_header(); 
?>

	<section>
		<div class="container bloco-branco">
			<div class="row">
				<div class="col-lg-12 titulo">
					<p class="font--open-sans">Erro</p>
					<h2 class="font--open-sans">404</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 txt--center">
					<img style="width: 100%; max-width: 300px;" alt="Alerta de erro" src="<?php bloginfo('template_url');?>/imgs/warning.png">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 titulo">
					<h2 class="font--open-sans">Página não encontrada.</h2>
				</div>
			</div>
		</div>
	</section>

<?php

	include ('pages/include/local.php');

	include ('pages/include/visita.php');

	get_footer();

?>