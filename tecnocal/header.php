<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<?php session_start(); ?>
		<title>Tecnocal <?php wp_title(); ?></title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta http-equiv="Content-language" content="pt-br">
		<meta name="description" content="">
		<?php wp_head(); ?>
		<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/img/tecnocal.ico">
		<link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php bloginfo('template_url'); ?>/css/owl.carousel.min.css" rel="stylesheet">
		<link href="<?php bloginfo('template_url'); ?>/css/owl.theme.default.min.css" rel="stylesheet">
		
		<link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet">
	</head>
	<body>

		<header>
			<div id="barra-menu" class="container-fluid menu-desktop">
				<div class="row">
					<div class="container">
						<div class="row flt--right">
							<div class="col-lg-12">

								<ul class="nav navbar-nav mrg--0-20-0-0" id="menuNav">

									<li class="option">
										<a class="<?php if ($_SESSION['pagina'] == "home") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>" class="topicomenu">
											Home
										</a>
									</li>

									<li class="option">
										<a class="<?php if ($_SESSION['pagina'] == "empresa") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/empresa">
											A Empresa
										</a>
									</li>							

									<li class="option">
										<a class="<?php if ($_SESSION['pagina'] == "empreendimento") { echo "menu--actv"; } ?>" href="<?php echo bloginfo('url'); ?>/empreendimento">
											Empreendimentos
										</a>
									</li>

									<li class="option">
										<a class="<?php if ($_SESSION['pagina'] == "praia-grande") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/praia-grande">
											Praia Grande
										</a>
									</li>

									<li class="option">
										<a class="<?php if ($_SESSION['pagina'] == "noticias") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/noticias">
											Notícias
										</a>
									</li>

									<li class="option">
										<a class="<?php if ($_SESSION['pagina'] == "videos") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/videos">
											Vídeos
										</a>
									</li>

									<li class="option">
										<a class="<?php if ($_SESSION['pagina'] == "tabelas") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/tabelas">
											Tabelas
										</a>
									</li>

									<li class="option">
										<a class="<?php if ($_SESSION['pagina'] == "contato") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/contato">
											Contatos
										</a>
									</li>

						      	</ul>

						      	<div class="btns--social">

									<a id="facebook" class="rede" target="_blank" href="https://www.facebook.com/construtora.tecnocal/"></a>

									<a id="instagram" class="rede" target="_blank" href="https://www.instagram.com/tecnocalconstrutora/?hl=pt-br"></a>

									<a id="youtube" class="rede" target="_blank" href="https://www.youtube.com/channel/UCK3gT6Pp0nYx7FmO-kwK3SA"></a>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="barra-branca" class="container-fluid">
				<div class="row">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div>
									<div class="navbar-header">

										<div class="hamburguer-bt">

										  	<div class="hamburguer-bt__stripe hamburguer-bt__stripe__top"></div>
										    <div class="hamburguer-bt__stripe hamburguer-bt__stripe__middle"></div>
										    <div class="hamburguer-bt__stripe hamburguer-bt__stripe__bottom"></div>

										    <div class="btn-menu--menu">Menu</div>

										</div>
								    </div>

									<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 pd--0">
										<a href="<?php echo bloginfo('url'); ?>">
											<img src="<?php echo bloginfo('template_url'); ?>/img/logo/tecnocal.png" style="margin-top: 5px;" alt="logo-tecnocal">
										</a>								
									</div>


									<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 bord--right desktop" style="width: 165px;">
										<a href="<?php echo bloginfo('url'); ?>/pre-avaliacao">
											<p>
												<span>
													$
												</span>
												<br>
												Faça sua simulação
											</p>
										</a>
									</div>

									<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 bord--right desktop">
										<p class="ico-te-ligar" style="cursor: pointer;">
											<span>
												<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-ligamos.png" alt="icone-te-ligamos">
											</span>
											<br>
											Ligamos para você
										</p>											
									</div>

									<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 bord--right desktop">
										<p class="cent">

											<span>
												<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-telefone.png" alt="icone-telefone">
											</span>

											Fale com um corretor<br>
											<b class="tel">(13) 3591-<b>CLIQUE</b></b>
										</p>
									</div>

									<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 desktop adapt-whats">
										<p class="cent">
											<a href="https://web.whatsapp.com/send?phone=5513996704990&text=Ol%C3%A1,%20tudo%20bem?%20Gostaria%20de%20ter%20mais%20informa%C3%A7%C3%B5es%20sobre%20os%20Residenciais" target="_blank">
											<span>
												<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-whatsapp.png" alt="icone-whatsapp">
											</span>
											Fale pelo whatsapp<br>
											<b class="whats">(13) 99670-
											</a>
												<b style="margin-left: -3px;">CLIQUE</b></b>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<span id="fundo--menu" class="">
				<ul class="nav navbar-nav mrg--0-20-0-0" id="menuNav">

					<li class="option">
						<a class="<?php if ($_SESSION['pagina'] == "home") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>" class="topicomenu">
							Home
						</a>
					</li>

					<hr>

					<li class="option">
						<a class="<?php if ($_SESSION['pagina'] == "empresa") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/empresa">
							A Empresa
						</a>
					</li>

					<hr>

					<li class="option">
						<a class="<?php if ($_SESSION['pagina'] == "empreendimento") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/empreendimento">
							Empreendimentos
						</a>
					</li>

					<hr>

					<li class="option">
						<a class="<?php if ($_SESSION['pagina'] == "praia-grande") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/praia-grande">
							Praia Grande
						</a>
					</li>

					<hr>

					<li class="option">
						<a class="<?php if ($_SESSION['pagina'] == "noticias") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/noticias">
							Notícias
						</a>
					</li>

					<hr>

					<li class="option">
						<a class="<?php if ($_SESSION['pagina'] == "videos") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/videos">
							Vídeos
						</a>
					</li>

					<hr>

					<li class="option">
						<a class="<?php if ($_SESSION['pagina'] == "tabelas") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/tabelas">
							Tabelas
						</a>
					</li>

					<hr>

					<li class="option">
						<a class="<?php if ($_SESSION['pagina'] == "contato") { echo "menu--actv"; }; ?>" href="<?php echo bloginfo('url'); ?>/contato">
							Contatos
						</a>
					</li>

					<hr>

					<div class="btns--social">

						<a id="facebook" class="rede" target="_blank" href="https://www.facebook.com/"></a>

						<a id="instagram" class="rede" target="_blank" href="https://www.instagram.com/"></a>

						<a id="youtube" class="rede" target="_blank" href="https://www.youtube.com/"></a>

					</div>					

		      	</ul>
			</span>

		</header>

		<div id="vamos-te-ligar">
			<div class="fundo-te-ligamos"></div>
			<div class="bloco">

				<div class="fechar-te-ligamos">X</div>

				<div class="titulo">
					<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-ligamos.png" alt="icone-te-ligamos">
					<p>
						Ligamos para você
					</p>					
				</div>

				<div class="conteudo">

					<form id="form-ligamos" action="">

						<div class="col-xl-12 col-lg-12 pd--0">
							<input type="texto" id="lig_nome" name="lig_nome" class="lig_nome" placeholder="Seu Nome">
						</div>

						<div class="col-xl-12 col-lg-12 pd--0">
							<input type="text" id="lig_telefone" name="lig_telefone" class="lig_telefone" placeholder="Seu Telefone">
						</div>
						
						<div class="col-xl-12 col-lg-12 pd--0">
							<input type="submit" value="ENVIAR" class="btn-submit" style="padding-top: 7px;">
						</div>
					</form>

					<div class="loading" style="padding-top: 35px;">
						<div class="loader5">
							<div class="loader-wrapper">
								<div class="sk-folding-cube">
									<div class="sk-cube1 sk-cube"></div>
									<div class="sk-cube2 sk-cube"></div>
									<div class="sk-cube4 sk-cube"></div>
									<div class="sk-cube3 sk-cube"></div>
								</div>
							</div>
						</div>  
					</div>

					<div class="erro">

						<div class="c-flash_icon c-flash_icon--error animate font-normal">
							<span class="x-mark">
								<span class="line left">
									
								</span>
								<span class="line right">
									
								</span>
							</span>
						</div>

						<p id="txt-erro-lig">Não foi possivel fazer a solicitação para te ligar.</p>
						
						<div id="tentar--novamente--ligamos" class="btn-submit" style="float: inherit;">
							TENTAR NOVAMENTE
						</div>

					</div>
					<div class="obrigado">

						<div class="c-flash_icon c-flash_icon--success animate font-normal">
							<span class="line tip"></span>
							<span class="line long"></span>
							<div class="placeholder"></div>
							<div class="fix"></div>
						</div>

						<p>Tudo certo, em breve ligaremos para você.</p>
						
					</div>
				</div>

			</div>
		</div>