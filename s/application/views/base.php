<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	if ( !isset($_SESSION["usuario"]) ){ header('Location: /tecnocal2.0/s/'); }
?>

<!DOCTYPE html>
<html class="no-js" lang="pt-br">

	<head>
		<!-- meta -->
		<meta charset="utf-8">
		<meta name="robots" content="index,nofollow">
	    <meta name="robots" content="noindex,nofollow">
	    <meta name="robots" content="noarchive">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="<?php echo base_url('assets');?>/images/logo/tecnocal.ico" type="image/x-icon">

		<title>Tecnocal | <?php echo $titulo ?></title>

		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600,600i,700" rel="stylesheet">

		<link rel="stylesheet" href="<?php echo base_url('assets');?>/css/vendor/bootstrap.min.css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('assets');?>/css/style.css" media="all" />
	</head>

	<body>
		
		<section id="top">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">	
						<div class="row">
							<div id="logo" class="col-lg-3">
								<a href="<?php echo base_url('');?>home">
									<img src="<?php echo base_url('assets');?>/images/logo/tecnocal.png">
								</a>
							</div>
							<div class="col-lg-9 acesso-rapido">
								<p> Bem-vindo(a) <?php echo $_SESSION["usuario"]; ?> </p>
								<a href="<?php echo base_url('');?>usuarios/editar/<?php echo $_SESSION["codigo"]; ?>">
									<img src="<?php echo base_url('assets');?>/images/icones/icon-usuario.png">
									<p>MEU PERFIL</p>
								</a>
								<a href="<?php echo base_url('');?>sair">
									<img src="<?php echo base_url('assets');?>/images/icones/icon-sair.png">
									<p>SAIR</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="conteudo">
			<div class="bc--banco container pd-top--47 sombra">
				<div class="row">
					<div class="col-lg-12">	
						<div class="row">
							<div id="menu-principal" class="col-lg-3 bc--azul-escuro">
								
								<a href="<?php echo base_url('');?>home">
									<p>
										<img src="<?php echo base_url('assets');?>/images/icones/icon-home.png">
										home
									</p>
								</a>

								<?php 
								    foreach ( $_SESSION['modulos'] as $modulo ) :
								?>
									<a href="<?php echo base_url('');?><?php echo $modulo["ds_modulo"]; ?>">
										<p>
											<img src="<?php echo base_url('assets');?>/images/icones/icon-<?php echo $modulo["ds_modulo"]; ?>.png">
											<?php echo $modulo["nm_modulo"]; ?>
										</p>
									</a>
								<?php
								    endforeach;
								?>

							</div>
							<div class="col-lg-9 bloco-principal pd-bot--50">
								<?php
									if( isset( $pagina ) ){
										include( $pagina );
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section id="footer" class="sombra">
			<div class="container-fluid">
				<div class="row">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">

								<div class="primeiro col-xl-4 col-lg-4 col-md-4 col-sm-12">
									<p>Todos os direitos reservados 2020</p>
								</div>

								<div class="segundo col-xl-4 col-lg-4 col-md-4 col-sm-12">
									<img src="<?php echo base_url('assets');?>/images/logo/tecnocal.png"" alt="" class="image-fluid">
								</div>

								<div class="terceiro col-xl-4 col-lg-4 col-md-4 col-sm-12">
									<img src="<?php echo base_url('assets');?>/images/logo/summer.png"" alt="" class="image-fluid">
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</body>

	<footer>
		<script src="<?php echo base_url('assets')?>/js/vendor/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url('assets')?>/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo base_url('assets')?>/js/vendor/hideShowPassword.min.js"></script> 
	   	<script src="<?php echo base_url('assets')?>/js/vendor/jquery.validate.js"></script> 
		<script src="<?php echo base_url('assets')?>/js/vendor/jquery.mask.min.js"></script>
		<script src="<?php echo base_url('assets')?>/js/vendor/holder.min.js"></script>   
		<script src="<?php echo base_url('assets')?>/js/vendor/jquery-ui.min.js"></script>
		<script src="<?php echo base_url('assets')?>/js/vendor/jquery-te-1.4.0.min.js"></script>
		<script src="<?php echo base_url('assets')?>/js/vendor/jquery.maskMoney.js"></script>  
		<script src="<?php echo base_url('assets')?>/js/scripts.js"></script>   			
	</footer>
</html>