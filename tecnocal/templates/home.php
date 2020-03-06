<?php 
	// Template name: Home
	session_start();
	$_SESSION['pagina'] = "home";	
	get_header();
  	include ('include/auto_empreendimento_index.php');
?>

 <main>

	<!-- Banner -->
	<section id="banner-home" class="bg--amarelo pd-bottom--40">
		<div id="owl-banner" class="owl-carousel owl-theme">

			<?php session_start();
			foreach ($_SESSION['banners'] as $banners){ ?>

				<div class="item">
					<?php if ( $banners['ds_link'] != "" ) { ?>
						<a href="<?php echo $banners['ds_link']; ?>">
					<?php } ?>

						<img class="img-responsive desk-1925" style="height: 540px; object-fit: cover;" src="http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/banner/<?php echo $banners['cd_banner']; ?>/desktop/<?php echo $banners['ds_caminho_desktop']; ?>" alt="banner-desktop" >

						<img class="img-responsive tabl-1200" style="height: 470px; object-fit: cover;" src="http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/banner/<?php echo $banners['cd_banner']; ?>/tablet1/<?php echo $banners['ds_caminho_tablet1']; ?>"  alt="banner-tablet">

						<img class="img-responsive tabl-991" style="height: 360px; object-fit: cover;" src="http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/banner/<?php echo $banners['cd_banner']; ?>/tablet2/<?php echo $banners['ds_caminho_tablet2']; ?>"  alt="banner-tablet">

						<img class="img-responsive mobi-767" style="height: 297px; object-fit: cover;" src="http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/banner/<?php echo $banners['cd_banner']; ?>/mobile/<?php echo $banners['ds_caminho_mobile']; ?>"  alt="banner-mobile">

					<?php if ( $banners['ds_link'] != "" ) { ?>
						</a>
					<?php } ?>
				</div>

			<?php } ?>

		</div>			
	</section>

	<!-- Recidenciais -->
	<section id="recidenciais">
		<div class="container">
			<?php
				session_start(); $cont = 0;
				foreach( $_SESSION['empre_all'] as $empre ){
					if( $cont == 0 || $cont == 2 ){ ?>
						<div class="row recidencial">
							<div class="col-xl-5 col-lg-5 col-md-12 info">
								<hr>

								<div class="texto">
									<img class="max-wdt--50 lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['ds_logo']; ?>" alt="logo-empreendimento">
									<p>
										<?php echo $empre['ds_empreendimento']; ?>
									</p>
								</div>
								
								<div class="conteudo" style="background-color: <?php echo $empre['cd_hexadecimal']; ?>;">

									<div class="row mrg-lf--0 mrg-rt---30" style="background-color: #f4f4f4;">

										<?php if(isset($empre['ds_mar']) && $empre['ds_mar'] != ""){ ?>
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 mar">
												<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mar.png" alt="icone-mar">
												<p><b><?php echo $empre['ds_mar']; ?> m</b><br>da praia</p>
											</div>
										<?php }

										if(isset($empre['ic_1_vaga']) && $empre['ic_1_vaga'] != "off"){ ?>

											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 vaga">
												<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-vaga.png" alt="icone-vagas">
												<p><b>1 vaga</b></p>
											</div>

										<?php }

										if(isset($empre['ds_metra_min']) && $empre['ds_metra_min'] != ""){ ?>
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 metro">
												<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mquadrado.png" alt="icone-metro-quadrados">
												<p><b><?php echo $empre['ds_metra_min']; ?>m²</b></p>
											</div>
										<?php }

										if(isset($empre['ic_2_dorm']) && $empre['ic_2_dorm'] != "off"){ ?>
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 dorm">
												<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-dorms.png" alt="icone-dorms">
												<p><b>2 dorms</b></p>
											</div>
										<?php } ?>

									</div>

									<div class="row mrg-rt---30 valor">
										<?php if($empre['vl_empreendimento'] != ""){ ?>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">

												<img class="flt--left lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon/icon-valor.png" alt="icone-valor">

												<p class="flt--left">A partir<br>de R$ <?php echo $empre['vl_empreendimento']; ?></p>
											</div>
										<?php } ?>

										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding: 0 0 0 10px;">

											<img class="flt--left lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon/icon-lancamento.png" alt="icone-lançamento">

											<p class="flt--left" style="margin-top: 10px;"><?php echo $empre['ds_situacao'] ?></p>

										</div>
									</div>
								</div>

							</div>

							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 foto-info pd-rgt--0">
								<?php $cont_lar = 1;
									foreach( $_SESSION['empre_lazer'] as $lazer ){
										if( $cont_lar <= 3 && $lazer['cd_empreendimento'] == $empre['cd_empreendimento'] ){ ?>
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pd--0">
													<img class="img-responsive lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/lazer/<?php echo $lazer['im_lazer']; ?>" alt="imagem-lazer">
													<p><?php echo $lazer['nm_lazer'] ?></p>
												</div>
										<?php $cont_lar++;
										}
									}
								?>
							</div>

							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 foto-destaque pd--0">

								<img class=" lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['im_empreendimento_principal']; ?>" alt="foto-principal-empreendimento">

							</div>
						</div>
					<?php }
					if( $cont == 1 ){ ?>
						<div class="row recidencial invert">

							<div class="col-xl-5 col-lg-5 col-md-12 info">
					
								<hr>

								<div class="texto">
									<img class="mobile-100 max-wdt--50 lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['ds_logo']; ?>" alt="logo-empreendimento">
									<p>
										<?php echo $empre['ds_empreendimento']; ?>
									</p>
								</div>
								
								<div class="conteudo" style="background-color: <?php echo $empre['cd_hexadecimal']; ?>;">

									<div class="row mrg-rt--0 mrg-lf---30" style="background-color: #f4f4f4;">

										<?php if(isset($empre['ds_mar']) && $empre['ds_mar'] != ""){ ?>
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 mar">
												<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mar.png" alt="icone-mar">
												<p><b><?php echo $empre['ds_mar']; ?> m</b><br>da praia</p>
											</div>
										<?php }

										if(isset($empre['ic_1_vaga']) && $empre['ic_1_vaga'] != "off"){ ?>

											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 vaga">
												<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-vaga.png" alt="icone-vagas">
												<p><b>1 vaga</b></p>
											</div>

										<?php }

										if(isset($empre['ds_metra_min']) && $empre['ds_metra_min'] != ""){ ?>
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 metro">
												<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mquadrado.png" alt="icone-metro-quadrados">
												<p><b><?php echo $empre['ds_metra_min']; ?>m²</b></p>
											</div>
										<?php }

										if(isset($empre['ic_2_dorm']) && $empre['ic_2_dorm'] != "off"){ ?>
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 dorm">
												<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-dorms.png" alt="icone-dorms">
												<p><b>2 dorms</b></p>
											</div>
										<?php } ?>

									</div>

									<div class="row mrg-rt--25 mrg-lf---30 valor">
										<?php if($empre['vl_empreendimento'] != ""){ ?>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">

												<img class="flt--left lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon/icon-valor.png" alt="icone-valor">

												<p class="flt--left">A partir<br>de R$ <?php echo $empre['vl_empreendimento']; ?></p>

											</div>
										<?php } ?>

										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding: 0;">

											<img class="flt--left lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon/icon-lancamento.png" alt="icone-lançamento">

											<p class="flt--left" style="margin-top: 10px;"><?php echo $empre['ds_situacao'] ?></p>

										</div>
									</div>
								</div>

							</div>

							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 foto-info pd-lft--0">
								<?php $cont_lar = 1;
									foreach( $_SESSION['empre_lazer'] as $lazer ){
										if( $cont_lar <= 3 && $lazer['cd_empreendimento'] == $empre['cd_empreendimento'] ){ ?>
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pd--0">
													<img class="img-responsive lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/lazer/<?php echo $lazer['im_lazer']; ?>" alt="imagem-lazer">
													<p><?php echo $lazer['nm_lazer'] ?></p>
												</div>
										<?php $cont_lar++;
										}
									}
								?>
							</div>

							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 foto-destaque pd--0">

								<img class="lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['im_empreendimento_principal']; ?>" alt="foto-empreendimento">

							</div>

						</div>



					<?php }
					$cont++;
				}
			?>
		</div>
	</section>

	<!-- Outros Empreendimentos -->
	<section class="titulo-grande">
		<div class="container">
			<div class="row">
			 	<div class="titulo">
					<hr>
					<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-empresa-titulo.png" alt="icone-empresa">
					<h2>OUTROS <b>EMPREENDIMENTOS</b></h2>
				</div>
			</div>
		</div>
	</section>
	<section id="empreendimento">

		<div class="loading" style="padding-top: 220px;">
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

		<div class="container" style="padding-bottom: 40px;">
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6 pd--0">
					<div id="form-busca">
						<input type="text" id="busca" class="busca" placeholder="Faça uma busca">
						<input type="submit" id="ir_busca" class="submit">
					</div>
				</div>
			</div>

			<?php 
				include ('include/filtro.php');
			?>
			<div id="cards-empreendimento" class="row cards-empreendimento">
				<?php session_start(); $cont = 0;
					foreach( $_SESSION['empre_all'] as $empre ){ ?>
						<a href="<?php echo bloginfo('url'); ?>/empreendimento/interno/?e=<?php echo $empre['nm_url_empreendimento']; ?>" class="ancora <?php if($empre['ds_situacao'] == "Lançamentos" ){ echo 'lancamento1'; }else{ echo 'lancamento0';} ?>  <?php if($empre['ds_situacao'] == "Em construção" ){ echo 'construcao1'; }else{ echo 'construcao0';} ?> <?php if($empre['ds_situacao'] == "Prontos para Morar" ){ echo 'pront1'; }else{ echo 'pront0';} ?> <?php if($empre['ds_suites'] == "1" ){ echo 'suite1'; }else{ echo 'suite0';} ?> <?php if($empre['ds_situacao'] == "Prontos para Morar" ){ echo 'pront1'; }else{ echo 'pront0';} ?> <?php if($empre['ic_1_suite'] == "on" || $empre['ic_2_suite'] == "on" || $empre['ic_3_suite'] == "on" || $empre['ic_4_suite'] == "on" ){ echo 'suite1'; }else{ echo 'suite0';} ?> <?php if($empre['ic_1_vaga'] == "on" ){ echo 'vagas1'; }else{ echo 'vagas0';} ?> <?php if($empre['ic_2_dorm'] == "on"){ echo 'dorm1'; }else{ echo 'dorm0';} ?> <?php if($empre['ic_perto_praia'] == "on" ){ echo 'praia1'; }else{ echo 'praia0';} ?> <?php if($empre['ic_revenda'] == "on" ){ echo 'revenda1'; }else{ echo 'revenda0';} ?> " <?php if( $cont >= 6 ){ echo "style='display: none;'"; }?> >
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 card " >
								<img class="foto lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['ds_thumb']; ?>" style="background-color: <?php echo $empre['cd_hexadecimal']; ?>;" alt="thumb-empreendimento">

								<?php if($empre['ds_situacao'] != "Prontos para Morar" && $empre['ds_situacao'] != ""){ ?>
									<p class="txt-destaque"><?php echo $empre['ds_situacao']; ?></p>
								<?php } ?>

								<div class="painel">

									<?php if($empre['ds_mar'] != ""){ ?>
										<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6">
											<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon-color/12-mar.png" alt="icone-mar">
											<p><b><?php echo $empre['ds_mar']; ?> m</b><br>do mar</p>
										</div>
									<?php } ?>
									
									<?php if(
										$empre['ic_1_dorm'] == "on" ||
										$empre['ic_2_dorm'] == "on" ||
										$empre['ic_3_dorm'] == "on" ||
										$empre['ic_4_dorm'] == "on"){ ?>
										<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6">
											<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon-color/12-dorms.png" alt="icone-dorms">

											<p><b><?php
												if($empre['ic_1_dorm'] == "on"){
													echo "1";
													if($empre['ic_2_dorm'] == "on"){
														echo ", 2";
														if ($empre['ic_3_dorm'] == "on") {
															echo ", 3";
															if($empre['ic_4_dorm'] == "on"){
																echo " e 4";
															}
														}else{
															if($empre['ic_4_dorm'] == "on"){
																echo " e 4";
															}
														}
													}else{
														if ($empre['ic_3_dorm'] == "on") {
															echo ", 3";
															if($empre['ic_4_dorm'] == "on"){
																echo " e 4";
															}
														}else{
															if($empre['ic_4_dorm'] == "on"){
																echo " e 4";
															}
														}
													}
												}else{
													if($empre['ic_2_dorm'] == "on"){
														echo "2";
														if ($empre['ic_3_dorm'] == "on") {
															echo ", 3";
															if($empre['ic_4_dorm'] == "on"){
																echo " e 4";
															}
														}else{
															if($empre['ic_4_dorm'] == "on"){
																echo " e 4";
															}
														}
													}else{
														if ($empre['ic_3_dorm'] == "on") {
															echo "3";
															if($empre['ic_4_dorm'] == "on"){
																echo " e 4";
															}
														}else{
															if($empre['ic_4_dorm'] == "on"){
																echo "4";
															}
														}
													}

												} ?> dorm<?php if($empre['ic_2_dorm'] == "on" || $empre['ic_3_dorm'] == "on" || $empre['ic_4_dorm'] == "on"){ echo "s"; } ?></b></p>
										</div>
									<?php } ?>

									<?php if(
										$empre['ic_1_vaga'] == "on" ||
										$empre['ic_2_vaga'] == "on" ||
										$empre['ic_3_vaga'] == "on" ||
										$empre['ic_4_vaga'] == "on"){ ?>

										<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6">
											<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon-color/12-vaga.png" alt="icone-vagas">
											<p><b><?php
												if($empre['ic_1_vaga'] == "on"){
													echo "1";
													if($empre['ic_2_vaga'] == "on"){
														echo ", 2";
														if ($empre['ic_3_vaga'] == "on") {
															echo ", 3";
															if($empre['ic_4_vaga'] == "on"){
																echo " e 4";
															}
														}else{
															if($empre['ic_4_vaga'] == "on"){
																echo " e 4";
															}
														}
													}else{
														if ($empre['ic_3_vaga'] == "on") {
															echo ", 3";
															if($empre['ic_4_vaga'] == "on"){
																echo " e 4";
															}
														}else{
															if($empre['ic_4_vaga'] == "on"){
																echo " e 4";
															}
														}
													}
												}else{
													if($empre['ic_2_vaga'] == "on"){
														echo "2";
														if ($empre['ic_3_vaga'] == "on") {
															echo ", 3";
															if($empre['ic_4_vaga'] == "on"){
																echo " e 4";
															}
														}else{
															if($empre['ic_4_vaga'] == "on"){
																echo " e 4";
															}
														}
													}else{
														if ($empre['ic_3_vaga'] == "on") {
															echo "3";
															if($empre['ic_4_vaga'] == "on"){
																echo " e 4";
															}
														}else{
															if($empre['ic_4_vaga'] == "on"){
																echo "4";
															}
														}
													}

												} ?> vaga<?php if($empre['ic_2_vaga'] == "on" || $empre['ic_3_vaga'] == "on" || $empre['ic_4_vaga'] == "on"){ echo "s"; } ?></b></p>
										</div>
									<?php } ?>

									<?php if($empre['ds_metra_min'] != ""){ ?>
										<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6">
											<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon-color/12-mquadrado.png" alt="icone-metro-quadrados">
											<p><b><?php
												echo $empre['ds_metra_min'];
												if ($empre['ds_metra_max'] != "") {
													echo " - ";
													echo $empre['ds_metra_max'];
												}
												echo " m²"; ?></b></p>
										</div>
									<?php } ?>
								</div>

								<div class="nome">
									<p><b class="nome_empree"><?php echo $empre['nm_empreendimento']; ?></b></p>
									<p><?php echo $empre['ds_bairro']; ?>, Praia Grande</p>
									<?php if($empre['ds_situacao'] == "Prontos para Morar"){ ?>
										<img class="lazyload" data-src="<?php bloginfo("template_url") ?>/img/icon/icon-pronto-morar.png" alt="icone-pronto-para-morar">
									<?php } ?>
								</div>
							</div>
						</a>
						<?php $cont++;
					}
				?>
			</div>			
			<?php if( $cont >= 6 ){ ?>
				<div class="row">
					<div id="outro-empre" class="btn-tecnocal filtro-todos">
						VER MAIS
					</div>
				</div>
			<?php } ?>
		</div>
	</section>

	<!-- Mapa -->
	<section class="titulo-grande">
		<div class="container">
			<div class="row">
			 	<div class="titulo">
					<hr>
					<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-local.png" alt="icone-local">
					<h2>ESCOLHA <b> SEU BAIRRO</b></h2>
				</div>
			</div>
		</div>
	</section>
	<section id="mapa">
		<div class="container">
			<div class="row menu">

				<div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 botao btn-canto-forte">
					<p>Canto do Forte</p>
					<div class="seta"></div>
				</div>

				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 borda botao btn-guilhermina">
					<p>Guilhermina</p>
					<div class="seta"></div>
				</div>

				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2  botao btn-aviacao">
					<p>Aviação</p>
					<div class="seta"></div>
				</div>

				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 borda botao btn-ocian">
					<p>Ocian</p>
					<div class="seta"></div>
				</div>

				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2  botao  btn-boqueirao ativo">
					<p>Boqueirão</p>
					<div class="seta"></div>
				</div>

			</div>

				<span id="top-mapa" style="margin-top: -45px; position: absolute;"></span>
		</div>
		<div class="container-fluid">
			<div class="row img-mapa" style="height: 427px">
				<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/mapa/boqueirao-mapa.jpg" alt="boqueirao-mapa">
			</div>
		</div>
	</section>

	<!-- Carrossel Praia Grande -->
	<section id="owl-praia" class="owl-carousel owl-theme">
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/1.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/2.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/3.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/4.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/5.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/6.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/7.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/8.jpg" alt="foto-bairro-praia-grande">
		</div>
	</section>

	<!-- Depoimentos dos Clientes -->
	<section class="titulo-grande">
		<div class="container">
			<div class="row">
			 	<div class="titulo">
					<hr>
					<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-play.png" alt="icone-play">
					<h2>DEPOIMENTOS <b>DOS CLIENTES</b></h2>
				</div>
			</div>
		</div>
	</section>
	<section id="owl-depoimentos" class="owl-carousel owl-theme">
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image01.jpg">
			<img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
		</div>
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image02.jpg">
			<img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
		</div>
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image03.jpg">
			<img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
		</div>
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image01.jpg">
			<img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
		</div>
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image02.jpg">
			<img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
		</div>
		<div class="item">
			<img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image03.jpg">
			<img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
		</div>		
	</section>

	<!-- Notícias -->
	<section class="titulo-grande">
		<div class="container">
			<div class="row">
			 	<div class="titulo">
					<hr>
					<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-noticias.png">
					<h2>ÚLTIMAS <b>NOTÍCIAS</b></h2>
				</div>
			</div>
		</div>
	</section>
	<section id="noticias-home" class="mrg-bt--60">
		<div class="container">
			<div class="row">

				<?php 
                    $paged      = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                    $args       = array( 'posts_per_page' => 3, 'paged' => $paged, 'cat' => -1 );
                    $wp_query   = new WP_Query( $args );
                ?>


                <?php if ( $wp_query->have_posts() ) {
                	$cont = 0;
                	while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php if($cont == 0 ){  ?>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <?php if ( has_post_thumbnail( $post->ID ) ){ ?>

                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

                                        <?php 
                                            $d = 0;
                                            $categories = get_the_category( $post_ID );
                                            foreach ( $categories as $category ) {
                                                if( $category->name == "Vídeos" ) { $d++; };
                                            };
                                         ?>
                                        <img class="img-noticia lazyload" data-src="<?php echo $image[0]; ?>"<?php if( $d >= 1 ) { ?> style="filter: brightness(0.5);" <?php } ?> >

                                        <?php if( $d >= 1 ) { ?> 
											<img class="img-play lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
                                        <?php } ?>

                                    <?php }else{ ?>

                                        <?php 
                                            $d = 0;
                                            $categories = get_the_category( $post_ID );
                                            foreach ( $categories as $category ) {
                                                if( $category->name == "Vídeos" ) { $d++; };
                                            };
                                         ?>
                                        <img class="img-noticia lazyload" data-src="<?php bloginfo('template_url') ?>/img/tumb-tecnocal.jpg"<?php if( $d >= 1 ) { ?> style="filter: brightness(0.5);" <?php } ?> >

                                        <?php if( $d >= 1 ) { ?> 
											<img class="img-play lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
                                        <?php } ?>

                                    <?php } ?>
									<p><?php echo $post->post_title;?></p>
								</div>
								<?php $cont++;
							}else{ ?>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <?php if ( has_post_thumbnail( $post->ID ) ){ ?>

                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

                                        <?php 
                                            $d = 0;
                                            $categories = get_the_category( $post_ID );
                                            foreach ( $categories as $category ) {
                                                if( $category->name == "Vídeos" ) { $d++; };
                                            };
                                         ?>
                                        <img class="img-noticia lazyload" data-src="<?php echo $image[0]; ?>" <?php if( $d >= 1 ) { ?> style="filter: brightness(0.5);" <?php } ?> >

                                        <?php if( $d >= 1 ) { ?> 
											<img class="img-play lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
                                        <?php } ?> 

                                    <?php }else{ ?>

                                        <?php 
                                            $d = 0;
                                            $categories = get_the_category( $post_ID );
                                            foreach ( $categories as $category ) {
                                                if( $category->name == "Vídeos" ) { $d++; };
                                            };
                                         ?>
                                        <img class="img-noticia lazyload" data-src="<?php bloginfo('template_url') ?>/img/tumb-tecnocal.jpg" <?php if( $d >= 1 ) { ?> style="filter: brightness(0.5);" <?php } ?> >

                                        <?php if( $d >= 1 ) { ?> 
											<img class="img-play lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
                                        <?php } ?>

                                    <?php } ?>
									<p><?php echo $post->post_title;?></p>
								</div>
								<?php $cont++;
							} ?>
                        </a>
                    <?php endwhile;?>
                <?php } ?>
			</div>

			<div class="row">
				<a href="<?php echo bloginfo('url'); ?>/noticias">
					<div class="btn-tecnocal">
						TODAS AS NOTÍCIAS
					</div>
				</a>
			</div>
		</div>
	</section>

 </main>

<?php 
	get_footer();
?>
