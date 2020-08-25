<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>
			Haverim | <?php echo the_title(); ?>
		</title>

		<meta charset="utf-8">
		<meta http-equiv="Content-language" content="pt-br">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      	<meta name="viewport" content="width=device-width, initial-scale=1">

      	<link rel="shortcut icon" type="imagem/x-icon" href="<?php bloginfo('template_url');?>/favicon.png">

		<link rel='stylesheet' type='text/css' href="<?php bloginfo('template_url');?>/css/bootstrap.css">
		<link rel='stylesheet' type='text/css' href="<?php bloginfo('template_url');?>/css/slick.css">
		<link rel='stylesheet' type='text/css' href="<?php bloginfo('template_url');?>/css/slick-theme.css">
		<link rel='stylesheet' type='text/css' href="<?php bloginfo('template_url');?>/style.css">
		<meta name="theme-color" content="#f88c4d">
	</head>
	
	<body>

		<nav class="navbar">
  			<div class="container">
  				<div class="row">
			    	
				    <div id="logo_menu" class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 mrg__top--25">
						<a href="<?php echo bloginfo('url'); ?>">
							<img alt="Logo Haverim" src="<?php bloginfo('template_url');?>/imgs/logo/logo.png">
						</a>

						<div class="hamburguer-bt">
						  <div class="hamburguer-bt__stripe hamburguer-bt__stripe__top"></div>
						  <div class="hamburguer-bt__stripe hamburguer-bt__stripe__middle"></div>
						  <div class="hamburguer-bt__stripe hamburguer-bt__stripe__bottom"></div>
						</div>

						<a href="tel:<?php the_field('ligartelefone'); ?>">
							<img alt="Telefone Mobile" class="ligar_mobile" src="<?php bloginfo('template_url');?>/imgs/icon/telefone.png">
						</a>
				    </div>

			      	<div id="opcao_menu" class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div><a href="<?php echo bloginfo('url'); ?>" class="<?php if($_SESSION['page'] == "home"){ echo "in";} ?>">Home</a></div>

						<div><a href="<?php echo bloginfo('url'); ?>/o-grupo/" class="<?php if($_SESSION['page'] == "grupo"){ echo "in";} ?>">O grupo</a></div>

						<div><a href="<?php echo bloginfo('url'); ?>/atuacao/" class="<?php if($_SESSION['page'] == "atuacao"){ echo "in";} ?>">Atuação</a></div>

						<div><a href="<?php echo bloginfo('url'); ?>/produtos/" class="<?php if($_SESSION['page'] == "produtos"){ echo "in";} ?>">Produtos</a></div>

						<div><a href="<?php echo bloginfo('url'); ?>/contato/" class="<?php if($_SESSION['page'] == "contato"){ echo "in";} ?>">Contato</a></div>   
			      	</div>

			    	<a href="tel:<?php the_field('ligartelefone'); ?>">
			    		<span class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 ligar_telefone font--open-sans">
			    			<img alt="Telefone" src="<?php bloginfo('template_url');?>/imgs/icon/telefone_menu.png"> | <?php the_field('telefone'); ?>
			    		</span>				    		
			    	</a>

				</div>
		 	</div>
		</nav>

		<section id="space-nav"></section>
		<section id="fundoMenu"></section>