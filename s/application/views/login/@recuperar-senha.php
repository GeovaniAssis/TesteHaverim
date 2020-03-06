<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="no-js" lang="pt-br">

	<head>

		<!-- meta -->
		<meta charset="utf-8">
		<meta name="robots" content="index,nofollow">
	    <meta name="robots" content="noindex,nofollow">
	    <meta name="robots" content="noarchive">
		<!-- meta -->

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Recuperar Senha - ABQ</title>

		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600,600i,700" rel="stylesheet">

		<link rel="stylesheet" href="<?php echo site_url('assets');?>/css/vendor/bootstrap.min.css" media="all" />
		<link rel="stylesheet" href="<?php echo site_url('assets');?>/css/login.css" media="all" />

	</head>

	<body>
		
		<div class="container-fluid" style="height: 90vh">
			
			<div class="row d-flex align-items-center" >

				<div class="col d-flex align-items-center">

					<?php echo form_open('recuperar-senha',  array('id' => 'formulario','class' => 'recuperar d-block mx-auto')); ?>

						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-esconder="alert-danger" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
							<?php 
				    			if(validation_errors() != false)
									echo '<h6><b>Algum campo obrigatório não foi preenchido corretamente</b></h6>';

								if ( $this->session->flashdata('suspenso') != "" ) 
									echo '<h4><b>'.$this->session->flashdata('suspenso').'</b></h4>'; 

								if ( $this->session->flashdata('erro') != "" ) 
									echo '<h4><b>'.$this->session->flashdata('erro').'</b></h4>'; 
							?>
					    </div>

					    <div class="alert alert-success alert-dismissible fade show" role="alert"> 
							<button type="button" class="close" data-esconder="alert-success" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> 
					    	<?php 	
					    		if ( $this->session->flashdata('sucesso') != "" )
			      					echo $this->session->flashdata('sucesso');  
							?>
					    </div>
								
						<div class="container login w-100"> 
							<div class="row">
								<div class="col-md-12 align-items-center login-top">
									<img src="<?php echo site_url('assets');?>/images/logo-uro-epm.png" alt="" class="image-fluid d-block mx-auto mt-3 mt-md-0">
								</div>
							</div>


							<div class="row">

								<div class="offset-md-3 col-md-6 pt-4 pb-4">
									<div class="row pt-2">	
										<div class="col">
											<h1 class="text-center">Recuperar senha</h1>
											<p class="text-center">Enviaremos a sua nova senha para o seu email cadastrado</p>
										</div>
									</div>

									<div class="row pt-2">
										<div class="col wrapper-campo">
											<label for="senha" class="float-left"><img src="<?php echo site_url('assets');?>/images/senha.png"" alt="" ></label>
											<input type="password" name="senha" class="float-left campo pl-2 pr-2" placeholder="Sua senha" />			
										</div>
									</div>

									<div class="row pt-2">		
										<div class="col d-flex align-items-center">	
											<a href="<?php echo site_url('login');?>" class="float-left"> <b>Voltar para Login </b> </a>
											<input type="submit" name="recuperar" value="Recuperar" class="btn float-right" />
										</div>
									</div>									
										
								</div>

							</div>
							
						</div>

					<?php echo form_close(); ?>
				
				</div>

			</div>
			
		</div>
				

		<div class="container-fluid" style="height: 10vh">

			<div class=" row rodape d-flex flex-row align-items-center ">

				<div class="col d-flex">

					<p>Todos os direitos reservados 2018</p>

				</div>

				<div class="col d-flex">

					<img src="<?php echo site_url('assets');?>/images/summer_logo.png"" alt="" class="image-fluid">

				</div>

			</div>

		</div>	


		<script type="text/javascript" src="<?php echo site_url('assets')?>/js/vendor/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="<?php echo site_url('assets')?>/js/vendor/bootstrap.min.js"></script>
	   	<script type="text/javascript" src="<?php echo site_url('assets')?>/js/vendor/jquery.validate.min.js"></script> 
		<script type="text/javascript" src="<?php echo site_url('assets')?>/js/vendor/holder.min.js"></script>   

		<script type="text/javascript" src="<?php echo site_url('assets')?>/js/scripts.js"></script>   

	    <script>
		  Holder.addTheme('gray', {
		    bg: '#777',
		    fg: 'rgba(255,255,255,.75)', 
		    font: 'Helvetica',
		    fontweight: 'normal'
		  });
		</script>

		<script type="text/javascript">
			<?php 
				if( validation_errors() != false || $this->session->flashdata("erro") != "" || $this->session->flashdata("suspenso") != "" )
					echo '$(".alert-danger").css("display","block");';

				if( $this->session->flashdata("sucesso") != "" )
					echo '$(".alert-success").css("display","block");';
			?>
		</script> 

	</body>

</html>