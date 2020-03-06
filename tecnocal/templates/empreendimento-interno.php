<?php 
	// Template name: empreendimento interna
	session_start();
	$_SESSION['pagina'] = "empreendimento";	
	foreach( $_SESSION['empre_all'] as $empre ){
		if( $_GET["e"] == $empre['nm_url_empreendimento']){ $empreendimento = $empre;}
	}
	if( !$empreendimento ){ header('Location: ../');}

  	include ('include/auto_empreendimento_index.php');
	
	$lazer = $_SESSION['empre_lazer'];
	$planta = $_SESSION['empre_planta'];
	$endereco = $_SESSION['empre_endereco'];
	$obra = $_SESSION['empre_obra'];

	get_header();
?>

	<section class="titulo-top">
		<div class="container">
			<div class="row bord--left">
				<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-empresa.png" style="margin-top: 5px;" alt="icone-empresa">
				<h2><?php echo $empreendimento["nm_empreendimento"]; ?></h2>
			</div>
			<div class="endereco">
				<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-pin4.png" alt="icone-endereco">
				<p class="bairro"><?php echo $empreendimento["ds_bairro"]; ?></p>
				<p class="cidade"><b>PRAIA GRANDE - SP</b></p>
			</div>
		</div>
	</section>

	<section id="submenu">
		<div class="container">
			<a href="#ir_empreendimento" style="flex: 1.5;">
				<div class="item">
					<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-empreendimento.png" alt="icone-empreendimento">
					O Empreendimento
				</div>
			</a>
			<a href="#ir_lazer"  style="flex: 1;">
				<div class="item borda-submenu">
					<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-lazer.png" alt="icone-lazer">
					Lazer
				</div>
			</a>
			<a href="#ir_planta"  style="flex: 1;">
				<div class="item borda-submenu">
					<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-planta.png" alt="icone-planta">
					Plantas
				</div>
			</a>
			<a href="#ir_localizacao"  style="flex: 1;">
				<div class="item borda-submenu">
					<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-pin-branco.png" alt="icone-pin">
					Localização
				</div>
			</a>
			<a href="#ir_cronograma"  style="flex: 1;">
				<div class="item borda-submenu">
					<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-cronograma.png" alt="icone-cronograma">
					Cronograma
				</div>
			</a>
			<a href="#ir_obra"  style="flex: 1;">
				<div class="item borda-submenu">
					<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-obra2.png" alt="icone-obra">
					Veja a obra
				</div>
			</a>
		</div>
	</section>

	<!-- Banner do Empreendimento -->
	<section id='banner-empreendimento' style="background-image: url('<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empreendimento['cd_empreendimento']; ?>/<?php echo $empreendimento['ds_capa']; ?>')">

		<div class="painel">

			<div class="container">

				<div class="logo col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<img src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empreendimento['cd_empreendimento']; ?>/<?php echo $empreendimento['ds_logo']; ?>" alt="logo-empreendimento">
				</div>

				<div class="destaque col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-lancamento.png" alt="icone-lançamento">
					<p><?php echo $empreendimento['ds_situacao']; ?></p>
				</div>

				<div class="outros col-xl-6 col-lg-6 col-md-6 col-sm-12">

					<?php if($empreendimento['ds_mar'] != ""){ ?>
						<div class="item">
							<img class="" src="<?php bloginfo("template_url") ?>/img/icon-color/12-mar.png" alt="icone-mar">
							<p><?php echo $empreendimento['ds_mar']; ?> do mar</p>
						</div>
					<?php }

					if( $empreendimento['ic_1_dorm'] == "on" || $empreendimento['ic_2_dorm'] == "on" || $empreendimento['ic_3_dorm'] == "on" || $empreendimento['ic_4_dorm'] == "on"){ ?>
						<div class="item">
							<img src="<?php bloginfo("template_url") ?>/img/icon-color/12-dorms.png" alt="icone-dorms">
							<p><?php
								if($empreendimento['ic_1_dorm'] == "on"){
									echo "1";
									if($empreendimento['ic_2_dorm'] == "on"){
										echo ", 2";
										if ($empreendimento['ic_3_dorm'] == "on") {
											echo ", 3";
											if($empreendimento['ic_4_dorm'] == "on"){
												echo " e 4";
											}
										}else{
											if($empreendimento['ic_4_dorm'] == "on"){
												echo " e 4";
											}
										}
									}else{
										if ($empreendimento['ic_3_dorm'] == "on") {
											echo ", 3";
											if($empreendimento['ic_4_dorm'] == "on"){
												echo " e 4";
											}
										}else{
											if($empreendimento['ic_4_dorm'] == "on"){
												echo " e 4";
											}
										}
									}
								}else{
									if($empreendimento['ic_2_dorm'] == "on"){
										echo "2";
										if ($empreendimento['ic_3_dorm'] == "on") {
											echo ", 3";
											if($empreendimento['ic_4_dorm'] == "on"){
												echo " e 4";
											}
										}else{
											if($empreendimento['ic_4_dorm'] == "on"){
												echo " e 4";
											}
										}
									}else{
										if ($empreendimento['ic_3_dorm'] == "on") {
											echo "3";
											if($empreendimento['ic_4_dorm'] == "on"){
												echo " e 4";
											}
										}else{
											if($empreendimento['ic_4_dorm'] == "on"){
												echo "4";
											}
										}
									}

								} ?> dorm<?php if($empreendimento['ic_2_dorm'] == "on" || $empreendimento['ic_3_dorm'] == "on" || $empreendimento['ic_4_dorm'] == "on"){ echo "s"; } ?>
							</p>
						</div>
					<?php }

					if( $empreendimento['ic_1_suite'] == "on" || $empreendimento['ic_2_suite'] == "on" || $empreendimento['ic_3_suite'] == "on" || $empreendimento['ic_4_suite'] == "on"){ ?> ?>
						<div class="item">
							<img class="" src="<?php bloginfo("template_url") ?>/img/icon-color/12-suite.png" alt="icone-suite">
							<p><?php
								if($empreendimento['ic_1_suite'] == "on"){
									echo "1";
									if($empreendimento['ic_2_suite'] == "on"){
										echo ", 2";
										if ($empreendimento['ic_3_suite'] == "on") {
											echo ", 3";
											if($empreendimento['ic_4_suite'] == "on"){
												echo " e 4";
											}
										}else{
											if($empreendimento['ic_4_suite'] == "on"){
												echo " e 4";
											}
										}
									}else{
										if ($empreendimento['ic_3_suite'] == "on") {
											echo ", 3";
											if($empreendimento['ic_4_suite'] == "on"){
												echo " e 4";
											}
										}else{
											if($empreendimento['ic_4_suite'] == "on"){
												echo " e 4";
											}
										}
									}
								}else{
									if($empreendimento['ic_2_suite'] == "on"){
										echo "2";
										if ($empreendimento['ic_3_suite'] == "on") {
											echo ", 3";
											if($empreendimento['ic_4_suite'] == "on"){
												echo " e 4";
											}
										}else{
											if($empreendimento['ic_4_suite'] == "on"){
												echo " e 4";
											}
										}
									}else{
										if ($empreendimento['ic_3_suite'] == "on") {
											echo "3";
											if($empreendimento['ic_4_suite'] == "on"){
												echo " e 4";
											}
										}else{
											if($empreendimento['ic_4_suite'] == "on"){
												echo "4";
											}
										}
									}

								} ?> suite<?php if($empreendimento['ic_2_suite'] == "on" || $empreendimento['ic_3_suite'] == "on" || $empreendimento['ic_4_suite'] == "on"){ echo "s"; } ?>
							</p>
						</div>
					<?php }

					if( $empreendimento['ic_1_vaga'] == "on" || $empreendimento['ic_2_vaga'] == "on" || $empreendimento['ic_3_vaga'] == "on" || $empreendimento['ic_4_vaga'] == "on"){ ?>
						<div class="item">
							<img class="" src="<?php bloginfo("template_url") ?>/img/icon-color/12-vaga.png" alt="icone-vagas">
							<p><?php 
								if($empreendimento['ic_1_vaga'] == "on"){
									echo "1";
									if($empreendimento['ic_2_vaga'] == "on"){
										echo ", 2";
										if ($empreendimento['ic_3_vaga'] == "on") {
											echo ", 3";
											if($empreendimento['ic_4_vaga'] == "on"){
												echo " e 4";
											}
										}else{
											if($empreendimento['ic_4_vaga'] == "on"){
												echo " e 4";
											}
										}
									}else{
										if ($empreendimento['ic_3_vaga'] == "on") {
											echo ", 3";
											if($empreendimento['ic_4_vaga'] == "on"){
												echo " e 4";
											}
										}else{
											if($empreendimento['ic_4_vaga'] == "on"){
												echo " e 4";
											}
										}
									}
								}else{
									if($empreendimento['ic_2_vaga'] == "on"){
										echo "2";
										if ($empreendimento['ic_3_vaga'] == "on") {
											echo ", 3";
											if($empreendimento['ic_4_vaga'] == "on"){
												echo " e 4";
											}
										}else{
											if($empreendimento['ic_4_vaga'] == "on"){
												echo " e 4";
											}
										}
									}else{
										if ($empreendimento['ic_3_vaga'] == "on") {
											echo "3";
											if($empreendimento['ic_4_vaga'] == "on"){
												echo " e 4";
											}
										}else{
											if($empreendimento['ic_4_vaga'] == "on"){
												echo "4";
											}
										}
									}
								} ?> vaga<?php if($empreendimento['ic_2_vaga'] == "on" || $empreendimento['ic_3_vaga'] == "on" || $empreendimento['ic_4_vaga'] == "on"){ echo "s"; } ?>
							</p>
						</div>
					<?php }

					if( $empreendimento["ic_varanda"] == "1" ){ ?>
						<div class="item">
							<img class="" src="<?php bloginfo("template_url") ?>/img/icon-color/12-varanda.png" alt="icone-varanda">
							<p>Varanda Goumet</p>
						</div>
					<?php } ?>

				</div>

			</div>

		</div>	
	</section>

	<section id="empreendimento-bloc">
		<div id="ir_empreendimento" style="position: absolute; margin-top: -120px;"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">

					<div class="sub-titulo">
						<div class="row">
							<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-empreendimento2.png" alt="icone-empreendimento">
							<h2>O <b>EMPREENDIMENTO</b></h2>				
						</div>
					</div>

					<p><?php echo $empreendimento['ds_empreendimento']; ?></p>
				</div>
				<div class="col-lg-6 bloco2">
					<?php if($empreendimento['im_empreendimento1'] != ""){ ?>
						<img class="img_empreendimento lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empreendimento['cd_empreendimento']; ?>/<?php echo $empreendimento['im_empreendimento1']; ?>" alt="foto-empreendimento">
					<?php }
					if($empreendimento['im_empreendimento2'] != ""){ ?>
						<img class="img_empreendimento lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empreendimento['cd_empreendimento']; ?>/<?php echo $empreendimento['im_empreendimento2']; ?>" alt="foto-empreendimento">
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<?php if($empreendimento['ds_video'] != ""){ ?>
		<section id="video">
			<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/residencial/praia-recreio/video.jpg" alt="foto-video">
			<?php echo $empreendimento['ds_video']; ?>
		</section>
	<?php } ?>

	<?php  //obra
		$cont = 0;
		foreach ($obra as $obr) { if ($obr['cd_empreendimento'] == $empreendimento['cd_empreendimento']) { $cont++;} }
		if ($cont != 0) {
			$cont = 0; ?>
			<section id="obra">
				<div id="ir_obra" style="position: absolute; margin-top: -120px;"></div>
				<div class="container">
					<div class="sub-titulo">
						<div class="row">
							<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-obra.png" alt="icone-obra">
							<h2>ACOMPANHE <b>A OBRA</b></h2>				
						</div>
					</div>
					<section id="owl-obra" class="owl-carousel owl-theme">
						<?php foreach($obra as $obr) {
							if( $obr['cd_empreendimento'] == $empreendimento['cd_empreendimento']) { ?>
								<div class="item">
									<img  class="owl-lazy" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $obr['cd_empreendimento']; ?>/obra/<?php echo $obr['im_obra_thumb']; ?>" alt="foto-thumb-obra">
									<div class="texto">
										<p><b><?php echo $obr['nm_obra'] ?></b></p>
										<p><?php echo $obr['dt_obra'] ?></p>	
									</div>
									<img class="resize-galeria-obra owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-lupa-branco.png" data-imgsrc="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $obr['cd_empreendimento']; ?>/obra/<?php echo $obr['im_obra']; ?>" alt="icone-lupa">
								</div>							
							<?php }
						} ?>
					</section>
				</div>
			</section>
			<section id="ampliada">
				<div class="bloco-ampliada">
					<p class="x">X</p>
					<img data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $obr['cd_empreendimento']; ?>/obra/<?php echo $obr['im_obra']; ?>" alt="foto-obra">
				</div>
			</section>




		<?php  }
	?>

	<section id="cronograma">
		<div id="ir_cronograma" style="position: absolute; margin-top: -120px;"></div>
		<div class="container">
			<div class="sub-titulo">
				<div class="row">
					<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-cronograma2.png" alt="icone-cronograma">
					<h2>CRONOGRAMA</h2>				
				</div>
			</div>

			<?php 
				$fundacao 		= $empreendimento['ds_fundacao'];
				$estrutura 		= $empreendimento['ds_estrutura'];
				$interno 		= $empreendimento['ds_interno'];
				$externo 		= $empreendimento['ds_externo'];
				$alvenaria 		= $empreendimento['ds_alvenaria'];
				$piso 			= $empreendimento['ds_piso'];
				$instalacoes	= $empreendimento['ds_instalacoes'];
				$pintura 		= $empreendimento['ds_pintura'];
				$entrega		= ($fundacao + $estrutura + $interno + $externo + $alvenaria + $piso + $instalacoes + $pintura) / 8;
			?>

			<div class="row timeline">

				<p class="seta">&#10155;</p>

				<hr>

				<div class="item">
					<div class="ball <?php if( $entrega >= 0.01){echo 'complet';}?>"></div>
					Projeto
				</div>

				<div class="item">
					<div class="ball <?php if( $entrega >= 0.01){echo 'complet';}?>"></div>
					Lançamento
				</div>

				<div class="item">
					<div class="ball <?php if( $entrega >= 0.01){echo 'complet';}?>"></div>
					Início da obra
				</div>

				<div class="item">
					<div class="ball <?php if( $fundacao == 100){echo 'complet';}?>"></div>
					Fundação
				</div>

				<div class="item">
					<div class="ball <?php if( $fundacao == 100 && $estrutura == 100){echo 'complet';}?>"></div>
					Estrutura
				</div>

				<div class="item">
					<div class="ball <?php if( $fundacao == 100 && $estrutura == 100 && $interno == 100 && $externo == 100 && $alvenaria == 100){echo 'complet';}?>"></div>
					Alvenaria
				</div>

				<div class="item">
					<div class="ball <?php if( $fundacao == 100 && $estrutura == 100 && $interno == 100 && $externo == 100 && $alvenaria == 100 && $piso == 100 && $instalacoes == 100 && $pintura == 100){echo 'complet';}?>"></div>
					Acabamento
				</div>

				<div class="item">
					<img class=" <?php if( $fundacao == 100 && $estrutura == 100 && $interno == 100 && $externo == 100 && $alvenaria == 100 && $piso == 100 && $instalacoes == 100 && $pintura == 100){echo 'complet';}?>" src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-chave.png" alt="icone-chave">
					Chaves
				</div>
			</div>

			<div class="row barras">
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-fundacao.png" alt="icone-fundação">
					<p class="titulo-crono">Fundação</p>
					<p class="porcent"><?php echo $fundacao; ?>%</p>					
					<div class="progress">
					  	<div class="progress-bar" role="progressbar" style="width: <?php echo $fundacao; ?>%" aria-valuenow="<?php echo $fundacao; ?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-estrutura.png" alt="icone-estrutura">
					<p class="titulo-crono">Estrutura</p>
					<p class="porcent"><?php echo $estrutura; ?>%</p>	
					<div class="progress">
					  	<div class="progress-bar" role="progressbar" style="width: <?php echo $estrutura; ?>%" aria-valuenow="<?php echo $estrutura; ?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-rev-interno.png" alt="icone-revestimento-interno">
					<p class="titulo-crono">Rev. Interno</p>
					<p class="porcent"><?php echo $interno; ?>%</p>	
					<div class="progress">
					  	<div class="progress-bar" role="progressbar" style="width: <?php echo $interno; ?>%" aria-valuenow="<?php echo $interno; ?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-rev-externo.png" alt="icone-revestimento-externo">
					<p class="titulo-crono">Rev. Externo</p>
					<p class="porcent"><?php echo $externo; ?>%</p>	
					<div class="progress">
					  	<div class="progress-bar" role="progressbar" style="width: <?php echo $externo; ?>%" aria-valuenow="<?php echo $externo; ?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-alvenaria.png" alt="icone-alvenaria">
					<p class="titulo-crono">Alvenaria</p>
					<p class="porcent"><?php echo $alvenaria; ?>%</p>	
					<div class="progress">
					  	<div class="progress-bar" role="progressbar" style="width: <?php echo $alvenaria; ?>%" aria-valuenow="<?php echo $alvenaria ?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-piso.png" alt="icone-piso">
					<p class="titulo-crono">Piso</p>
					<p class="porcent"><?php echo $piso; ?>%</p>	
					<div class="progress">
					  	<div class="progress-bar" role="progressbar" style="width: <?php echo $piso; ?>%" aria-valuenow="<?php echo $piso; ?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-instalacoes.png" alt="icone-instalações">
					<p class="titulo-crono">Instalações</p>
					<p class="porcent"><?php echo $instalacoes; ?>%</p>	
					<div class="progress">
					  	<div class="progress-bar" role="progressbar" style="width: <?php echo $instalacoes; ?>%" aria-valuenow="<?php echo $instalacoes; ?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-pintura.png" alt="icone-pintura">
					<p class="titulo-crono">Pintura</p>
					<p class="porcent"><?php echo $pintura; ?>%</p>	
					<div class="progress">
					  	<div class="progress-bar" role="progressbar" style="width: <?php echo $pintura; ?>%" aria-valuenow="<?php echo $pintura; ?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				
				<div class="col-lg-12">
					<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-entrega.png" alt="icone-entrega">
					<p class="titulo-crono">Entrega</p>					 
					<p class="porcent"><?php echo $entrega; ?>%</p>	
					<div class="progress">
					  	<div class="progress-bar" role="progressbar" style="width: <?php echo $entrega; ?>%" aria-valuenow="<?php echo $entrega; ?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>

			<?php if($empreendimento['ds_entrega'] != "") { ?>
				<div class="btn-tecnocal mrg-bt--60" style="cursor: none;">
					ENTREGA: <?php 
					setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
					date_default_timezone_set('America/Sao_Paulo');
					echo strftime('%b / %Y', strtotime($empreendimento['ds_entrega'])); ?>
				</div>
			<?php } ?>
		</div>
	</section>

	<?php  //Localização
		$cont = 0;
		foreach ($endereco as $end) {
			if ($end['cd_empreendimento'] == $empreendimento['cd_empreendimento']) { ?>
				<section class="sub-titulo-centro">
					<div id="ir_localizacao" style="position: absolute; margin-top: -120px;"></div>
					<div class="container">
						<div class="row">
							<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-local.png" alt="icone-local">
							<h2>LOCALIZAÇÃO</h2>
							<p><?php echo $end["ds_logradouro"]; ?> <b><?php echo $end["ds_endereco"] ?>,</b> <?php echo $end["ds_numero"]; ?>. <?php echo $end["ds_bairro"]; ?> - pg</p>
									
						</div>
					</div>
				</section>
				<section id="mapa" class="borda-top">
					<div class="container-fluid">
						<div class="row img-mapa" style="height: 427px">
							<img class="lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $end['cd_empreendimento']; ?>/<?php echo $end["im_mapa"]; ?>" alt="foto-mapa-empreendimento">
						</div>
					</div>
					<div class="container">
						<div id="proximo" class="col-lg-2 col-md-2 col-sm-2"> 
							<?php if( $end["ds_academia"] == "on" ){ ?><div class="col-lg-12 item">Academia</div><?php } ?>
							<?php if( $end["ds_escola"] == "on" ){ ?><div class="col-lg-12 item">Escola</div><?php } ?>
							<?php if( $end["ds_padaria"] == "on" ){ ?><div class="col-lg-12 item">Padaria</div><?php } ?>
							<?php if( $end["ds_shopping"] == "on" ){ ?><div class="col-lg-12 item">Shopping</div><?php } ?>
							<?php if( $end["ds_banco"] == "on" ){ ?><div class="col-lg-12 item">Banco</div><?php } ?>
							<?php if( $end["ds_hospital"] == "on" ){ ?><div class="col-lg-12 item">Hospital</div><?php } ?>
							<?php if( $end["ds_loja"] == "on" ){ ?><div class="col-lg-12 item">Loja</div><?php } ?>
						</div>
					</div>
				</section>
			<?php }
		}
	?>

	<?php  //Lazer
		$cont = 0;
		$lazer_empre['empre'];
		foreach ($lazer as $laz) { if ($laz['cd_empreendimento'] == $empreendimento['cd_empreendimento']) { $cont++; $lazer_empre['empre'] = $laz;} }

		if ($cont != 0) { ?>
			<section id="lazer">
				<div id="ir_lazer" style="position: absolute; margin-top: -120px;"></div>
				<div class="container">

					<div class="sub-titulo">
						<div class="row">
							<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-lazer2.png" alt="icone-lazer">
							<h2>LAZER</h2>				
						</div>
					</div>

					<?php
						$cont = 0;
						foreach ($lazer as $laz) {
						 	if ($laz['cd_empreendimento'] == $empreendimento['cd_empreendimento']) { 
						 		$result = $cont % 2;
						 		if($result == 0){ ?>
									<div class="row informacao">

										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 img">
											<img style="padding-top: 0 !important;" class="lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $laz['cd_empreendimento']; ?>/lazer/<?php echo $laz['im_lazer']; ?>" alt="foto-lazer">
										</div>

										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 ">
											<div class="bord--rgt pdd-top--120">

												<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/<?php echo $laz['im_icon'] ?>" alt="icone-lazer">
												<h2><?php echo $laz['nm_lazer'] ?></h2>
												<p class="pdd-rgt--30"><?php echo $laz['ds_lazer'] ?></p>
											</div>
										</div>
									</div>
						 		<?php }else{ ?>
									<div class="row informacao">

										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 img" style="float: right;">
											<img style="padding-top: 0 !important;" class="lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $laz['cd_empreendimento']; ?>/lazer/<?php echo $laz['im_lazer']; ?>" alt="foto-lazer">
										</div>

										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" style="float: left;">
											<div class="bord--lft pdd-top--120 pdd-lft--30">

												<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/<?php echo $laz['im_icon'] ?>" alt="icone-lazer">
												<h2><?php echo $laz['nm_lazer'] ?></h2>
												<p class="pdd-rgt--30"><?php echo $laz['ds_lazer'] ?></p>
											</div>
										</div>
									</div>
						 		<?php }
						 		$cont++;
						 	}
						}
					?>
				</div>
			</section>
		<?php }
	?>

	<?php  //Planta
		$cont = 0;
		foreach ($planta as $plant) { if ($plant['cd_empreendimento'] == $empreendimento['cd_empreendimento']) { $cont++;} }

		if ($cont != 0) { $cont = 0; ?>
			<section id="plantas">
				<div id="ir_planta" style="position: absolute; margin-top: -120px;"></div>
				<div class="container">
					<div class="sub-titulo">
						<div class="row">
							<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-obra.png" alt="icone-obra">
							<h2><b>PLANTAS</b></h2>				
						</div>
					</div>
				</div>

				<div class="container">
					<div class="img-planta col-xl-9 col-lg-9 col-md-8 col-sm-6 col-xs-12">
						<?php foreach ($planta as $plant) {
							if ($plant['cd_empreendimento'] == $empreendimento['cd_empreendimento'] && $cont == 0) { ?>

								<a href="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $plant['cd_empreendimento']; ?>/planta/<?php echo $plant['im_planta']; ?>" download="<?php echo $plant['im_planta']; ?>">
									<div class="btn-tecnocal">
										BAIXAR PLANTA
									</div>
								</a>

								<div class="txt--cent">
									<img class="lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $plant['cd_empreendimento']; ?>/planta/<?php echo $plant['im_planta']; ?>" alt="imagem-planta-apartamento">
								</div>	
							<?php $cont++; }
						} $cont = 0; ?>
					</div>
					
					<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<?php foreach ($planta as $plant) {
							if ($plant['cd_empreendimento'] == $empreendimento['cd_empreendimento']) { ?>
								<div class="btns-opcao <?php if($cont == 0){ echo 'selecte'; $cont++;} ?>" codigo="<?php echo $plant["cd_empreendimento"]; ?>" imagem="<?php echo $plant['im_planta']; ?>">
									<p>
										<?php
											echo $plant['nm_planta'];
											if ($plant['ds_metragem']) {
												echo " - ";
												echo $plant['ds_metragem'];
											}
										?>
									</p>
								</div>
							<?php }
						} ?>
					</div>

				</div>
			</section>
		<?php }
	?>
	
<?php 
	get_footer();
?>