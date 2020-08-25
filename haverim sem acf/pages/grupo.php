<?php /* Template Name: O Grupo*/
	if( !isset($_SESSION) ){ session_start(); }
	$_SESSION['page'] = "grupo";
	get_header(); 
?>

	<section id="somos">
		<div class="container bloco-branco">
			<div class="row">
				<div class="col-lg-12 titulo">
					<p class="font--open-sans">O Grupo</p>
					<h2 class="font--open-sans">Haverim</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-xs-12">
					<img style="width: 100%;" alt="Foto do time" src="<?php bloginfo('template_url');?>/imgs/somos/time.jpg">
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<p>
						A Haverim atua com Produtos Hospitalares, Comércio de instrumentos e materiais para uso médico, cirúrgico, hospitalar e de laboratórios. Dentre os pontos principais da empresa, ela se destaca por ter como prioridade a segurança, tanto a dos profisionais, independete da área, quanto das pessoas envolvidas com o meio, atuando os produtos mais eficientes do mercado.
					</p>
					<p>
						O material é escolhido com extremo cuidado, visando a qualidade para evitar, de maneira eficiente, os possíveis riscos decorrentes de cada segmento. Outro ponto importante é a agilidade na entrega. Por ter se firmado no mercado, possui maior facilidade e responsabilidade com prazos.
					</p>
				</div>
			</div>
		</div>
	</section>

<?php 
	include ('include/visita.php');

	get_footer();
?>