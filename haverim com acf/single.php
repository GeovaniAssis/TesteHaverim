<?php /*Single Post Template: Sigle Notícias*/

	if( !isset($_SESSION) ){ session_start(); }

	$_SESSION['page'] = "";
	
?>
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

						<a href="tel:01333217933">
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

			    	<a href="tel:01333217933">
			    		<span class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 ligar_telefone font--open-sans">
			    			<img alt="Telefone" src="<?php bloginfo('template_url');?>/imgs/icon/telefone_menu.png"> | 13 3321.7933
			    		</span>				    		
			    	</a>

				</div>
		 	</div>
		</nav>

		<section id="space-nav"></section>
		<section id="fundoMenu"></section>

		<section id="post">	
			<div class="container bloco-branco">
				<div class="row">
					<div class="col-lg-12 titulo">
						<p class="font--open-sans"></p>
						<h2 class="font--open-sans"><?php echo $post->post_title;?></h2>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<?php while (have_posts()) : the_post(); 
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							<img src="<?php echo $image[0]; ?>" class="thumb">
							<span class="quadrado--imagem"></span>

							<div style="margin: 50px 0;">
								<p><?php the_content(); ?></p>
							</div>


						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</section>

		<section id="local">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h3 class="font--open-sans">Nossa atuação abrange<br>um raio de aproximadamente</h3>
						<p class="font--open-sans">200 km dentro do Estado de São Paulo</p>

						<a href="<?php echo bloginfo('url'); ?>/contato/">
							<button class="font--open-sans"> SAIBA MAIS  &#10140; </button>
						</a>
					</div>
				</div>
			</div>
		</section>

		<section id="visita">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="row">
							<img src="<?php bloginfo('template_url');?>/imgs/cafe.png">
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"></div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-12 titulo">
								<h2 class="font--open-sans" style="margin-top: 50px;">Solicite uma visita</h2>
								<p class="font--open-sans" style="margin-top: 30px; margin-bottom: 30px;">Estamos sempre prontos para atender com<br>maior agilidade e qualidade possível.</p>
								<hr style="margin: 0 auto 20px;">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<form id="form-visita" action="">
									<div class="row">
										<div class="col-lg-12">
											<input class="input" type="text" name="nome" placeholder="NOME" required>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<input class="input" type="mail" name="email" placeholder="E-MAIL" required>								
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<input class="input" type="text" name="telefone" placeholder="TELEFONE" required>	
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<input class="input" type="text" name="assunto" placeholder="ASSUNTO" required>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<textarea class="input" name="mensagem" placeholder="MENSAGEM" required></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
											<button type="reset" class="apagar">
												<svg class="lixo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"/></svg> &nbsp; &nbsp; &nbsp; APAGAR</button>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
											<button type="submit" class="enviar">ENVIAR &nbsp; &nbsp; &nbsp; &#10140;</button>
										</div>
									</div>

								</form>

								<div id="loading" style="display: none;">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(255, 255, 255, 0); display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
										<rect x="17.5" y="29.1667" width="15" height="41.6666" fill="#aeaeae">
										  <animate attributeName="y" repeatCount="indefinite" dur="1.2987012987012987s" calcMode="spline" keyTimes="0;0.5;1" values="18;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.25974025974025977s"></animate>
										  <animate attributeName="height" repeatCount="indefinite" dur="1.2987012987012987s" calcMode="spline" keyTimes="0;0.5;1" values="64;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.25974025974025977s"></animate>
										</rect>
										<rect x="42.5" y="28.3784" width="15" height="43.2433" fill="#838280">
										  <animate attributeName="y" repeatCount="indefinite" dur="1.2987012987012987s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.12987012987012989s"></animate>
										  <animate attributeName="height" repeatCount="indefinite" dur="1.2987012987012987s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.12987012987012989s"></animate>
										</rect>
										<rect x="67.5" y="26.7857" width="15" height="46.4287" fill="#e77716">
										  <animate attributeName="y" repeatCount="indefinite" dur="1.2987012987012987s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate>
										  <animate attributeName="height" repeatCount="indefinite" dur="1.2987012987012987s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate>
										</rect>
									</svg>
								</div>

								<div id="error" style="display: none;">
						        	<div class="c-flash_icon c-flash_icon--error animate font-normal">
						            	<span class="x-mark">
						                	<span class="line left"></span>
						                	<span class="line right"></span>
						            	</span>
						        	</div>
						        	<p id="descricao"></p>
						        	<div class="strip strip__submit txt--center">
						        		<input type="submit" id="tentar--mensagem" value="Tentar novamente" style="cursor: pointer;">
						        	</div>
						    	</div>		

						    	<div id="thank" style="display: none;">
									<div class="c-flash_icon c-flash_icon--success animate font-normal">
										<span class="line tip"></span>
										<span class="line long"></span>
										<div class="placeholder"></div>
										<div class="fix"></div>
									</div>
									<p>Mensagem enviada com sucesso!</p>
								</div>

							</div>						
						</div>
					</div>
				</div>								
			</div>
		</section>

	    <footer>
    		<div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <hr>
                        <img class="logo" alt="Logo Haverim" src="<?php bloginfo('template_url');?>/imgs/logo/logo.png">
                    </div>
                </div>
                <div class="row">

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 mrg__bot--25">
                        <img class="icon" alt="Imagem Pin" src="<?php bloginfo('template_url');?>/imgs/icon/pin.png">
                        <p>Rua Antônio Bento, 79 - loja 2</p>
                        <p>Vila Mathias | Santos - SP | CEP: 11705-280</p>
                        <p class="destaque">endereço para correspondência</p>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 mrg__bot--25">
                        <img class="icon" alt="Imagem Pin" src="<?php bloginfo('template_url');?>/imgs/icon/email.png">
                        <p>vendas@haverim.com.br</p>
                        <p> &nbsp; </p>
                        <p class="destaque">fale conosco</p>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 mrg__bot--25">
                        <img class="icon" alt="Imagem Pin" src="<?php bloginfo('template_url');?>/imgs/icon/telefone.png">
                        <p>13 3321.7933</p>
                        <p>13 97421.3810</p>
                        <p class="destaque">tel para contato</p>
                    </div>
                </div>
            </div>
            <div class="final">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <p>2018 - Haverim - Todos os direitos reservados.</p>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 centro">
                            <a href="http://www.marcasite.com.br"><img  alt="Logo Marca Site" src="<?php bloginfo('template_url');?>/imgs/logo/marcasite.png"></a>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 direita">
                            <p>
                                <a href="<?php echo bloginfo('url'); ?>">Home</a> | <a href="<?php echo bloginfo('url'); ?>/o-grupo/">O grupo</a> | <a href="<?php echo bloginfo('url'); ?>/atuacao/">Atuação</a> | <a href="<?php echo bloginfo('url'); ?>/produtos/">Produtos</a> | <a href="<?php echo bloginfo('url'); ?>/contato/">Contato</a> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    	</footer>
        
    	<script src="<?php bloginfo('template_url');?>/js/vendor/jquery-3.3.1.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/vendor/bootstrap.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/vendor/jquery.mask.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/vendor/jquery.validate.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/vendor/slick.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/functions.js"></script>

    </body>
</html>