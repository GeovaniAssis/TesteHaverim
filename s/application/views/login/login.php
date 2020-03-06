<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php if ( isset($_SESSION["usuario"]) ) {
	header('Location: /tecnocal2.0/s/home');
} ?>

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

		<title>Tecnocal | Login</title>

		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600,600i,700" rel="stylesheet">

		<link rel="stylesheet" href="<?php echo base_url('assets');?>/css/vendor/bootstrap.min.css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('assets');?>/css/login.css" media="all" />
	</head>

	<body>
		<section id="bloco">
			<div class="container">
				<div class="row" >
					<div class="col-lg-12">
						<?php echo form_open('logar',  array('id' => 'formulario','class' => '')); ?>

							<div class="">
								<label for="email">E-mail:</label>
								<input type="email" name="email" id="email" class="input" required>
							</div>

							<div class="">
								<label for="senha">Senha:</label>
								<input type="password" name="senha" id="senha" class="input" required>
							</div>

							<div class="row options">
								<a href="<?php echo base_url('recuperar-senha');?>">
									<p>Esqueci minha senha</p>
								</a>

								<input type="submit" name="submit" class="input-submit" value="Entrar">
							</div>

						<?php echo form_close(); ?>

						<?php if ( $this->session->flashdata('sucesso') != "" ) { ?>
							<div class="alert alert-success alert-dismissible show" role="alert">
								<button type="button" class="close" data-esconder="alert-danger" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
								<?php echo '<h4 style="font-size: 20px;"><b>'.$this->session->flashdata('sucesso').'</b></h4>'; ?>
						    </div>
						<?php } ?>

						<?php if ( $this->session->flashdata('erro') != "" ) { ?>
							<div class="alert alert-danger alert-dismissible show" role="alert">
								<button type="button" class="close" data-esconder="alert-danger" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
								<?php echo '<h4 style="font-size: 20px;"><b>'.$this->session->flashdata('erro').'</b></h4>'; ?>
						    </div>
						<?php } ?>

						<?php if ( $this->session->flashdata('suspenso') != "" ) { ?>
							<div class="alert alert-warning alert-dismissible show" role="alert">
								<button type="button" class="close" data-esconder="alert-danger" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
								<?php echo '<h4 style="font-size: 20px;"><b>'.$this->session->flashdata('suspenso').'</b></h4>'; ?>
						    </div>
						<?php } ?>

					</div>
				</div>
			</div>
		</section>

		<section id="footer">
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