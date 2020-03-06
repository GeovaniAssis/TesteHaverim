<?php 
	// Template name: empreendimento index
	session_start();
	$_SESSION['pagina'] = "empreendimento";

	get_header();
  	include ('include/auto_empreendimento_index.php');
?>

	<section class="titulo-top">
		<div class="container">
			<div class="row bord--left">
				<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-empresa.png" style="margin-top: 5px;" alt="icon-empresa">
				<h2>Empreendimentos</h2>
			</div>
		</div>
	</section>

	<section id="pessoas">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="text">
						<h2><span>0000 pessoas</span></h2>
						<h2>encontraram seu lar na tecnocal</h2>						
					</div>

					<div class="row">
						<div id="form-buscar">

							<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 bloco border encontre" style="padding-bottom: 4px;">

								<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-pesquisa.png" alt="icon-pesquisa">

								<p>Encontre o <br><b>SEU IMÓVEL</b></p>

							</div>
							<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 bloco border">
								<img src="<?php echo bloginfo('template_url'); ?>/img/icon-color/0-bairro.png" alt="icone-bairro">
								<select name="bairro" id="bairro" class="input-style">
									<option selected disabled>Bairro</option>
									<?php foreach( $_SESSION['bairros'] as $empre ){  ?>
										<option value="<?php echo str_replace(" ", "_", $empre['ds_bairro'] ); ?>"><?php echo $empre['ds_bairro']; ?></option>
									<?php } ?>
									<option value='0'>Todos</option>
								</select>
							</div>
							<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 bloco border">
								<img src="<?php echo bloginfo('template_url'); ?>/img/icon-color/0-estagio.png" alt="icone-estagio">
								<select name="estagio" id="estagio" class="input-style">
									<option selected disabled>Estágio</option>
									<?php foreach( $_SESSION['situacao'] as $empre ){  ?>
										<option value="<?php echo str_replace(" ", "_", $empre['ds_situacao'] ); ?>"><?php echo $empre['ds_situacao']; ?></option>
									<?php } ?>
									<option value='0'>Todos</option>
								</select>
							</div>
							<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 bloco border">
								<img src="<?php echo bloginfo('template_url'); ?>/img/icon-color/0-dorms.png" alt="icone-dorms">
								<select name="dorms" id="dorms" class="input-style">
									<option selected disabled>Dorms</option>
									<option value="1dorm">1 Dorm</option>
									<option value="2dorm">2 Dorms</option>
									<option value="3dorm">3 Dorms</option>
									<option value="4dorm">4 Dorms</option>
									<option value='0'>Todos</option>
								</select>
							</div>
							<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 bloco">
								<img src="<?php echo bloginfo('template_url'); ?>/img/icon-color/0-mquadrado.png" alt="icone-metro-quadrado">
								<select name="metragem" id="metragem" class="input-style">
									<option selected disabled>Metragem</option>
									<option value="100m">50m² até 100m²</option>
									<option value="150m">100m² até 150m²</option>
									<option value="200m">150m² até 200m²</option>
									<option value="201m">mais de 200m²</option>
									<option value='0'>Todos</option>
								</select>								
							</div>
							<div id="buscar" class="col-xl-2 col-lg-2 col-md-12 col-sm-12 pd--0">
								<a href="#bucando_meu_imovel"><input id="buscar_residencial" type="submit" value="BUSCAR" class="input-style submit"></a>
							</div>
							
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<div id="aviacao" style="position: absolute; margin-top: -120px;"></div>
	<div id="guilhermina" style="position: absolute; margin-top: -120px;"></div>
	<div id="boqueirao" style="position: absolute; margin-top: -120px;"></div>
	<div id="canto_do_forte" style="position: absolute; margin-top: -120px;"></div>
	<div id="ocian" style="position: absolute; margin-top: -120px;"></div>

	<section id="residencial">
		<div class="container pd--0">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">

					<?php session_start();
					$cont = 1;
					foreach( $_SESSION['empre_all'] as $empre ){ 
						if( $cont == 1 ){ ?>
							<a href="<?php echo bloginfo('url'); ?>/empreendimento/interno/?e=<?php echo $empre['nm_url_empreendimento']; ?>" class="ancora <?php echo str_replace(" ", "_", $empre['ds_bairro'] ); ?> <?php echo str_replace(" ", "_", $empre['ds_situacao'] ); ?> <?php if($empre['ic_1_dorm'] == "on"){ echo '1dorm'; } ?> <?php if($empre['ic_2_dorm'] == "on"){ echo '2dorm'; } ?> <?php if($empre['ic_3_dorm'] == "on"){ echo '3dorm'; } ?> <?php if($empre['ic_4_dorm'] == "on"){ echo '4dorm'; } ?> <?php if($empre['ds_metra_min'] <= 100){ echo '100m';} ?> <?php if($empre['ds_metra_min'] >= 101 && $empre['ds_metra_min'] <= 150){ echo '150m';} ?> <?php if($empre['ds_metra_min'] >= 151 && $empre['ds_metra_min'] <= 200){ echo '200m';} ?> <?php if($empre['ds_metra_min'] >= 201 ){ echo '201m';} ?> " >

								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 item destaque" style="background-image: url('<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['ds_thumb']; ?>');">

									<p class="status"><?php echo $empre['ds_situacao']; ?></p>

									<div class="vantagens">

										<?php if($empre['ds_mar'] != ""){ ?>
											<div class="mar">
												<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mar.png" alt="icone-mar">
												<p><?php echo $empre['ds_mar']; ?>m<br>do mar</p>
											</div>
										<?php } ?>

										<?php if( $empre['ic_1_dorm'] == "on" || $empre['ic_2_dorm'] == "on" || $empre['ic_3_dorm'] == "on" || $empre['ic_4_dorm'] == "on"){ ?>
											<div class="dorms diferente">
												<img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-dorms.png" alt="icone-dorms">
												<p><?php
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

												} ?> dorm<?php if($empre['ic_2_dorm'] == "on" || $empre['ic_3_dorm'] == "on" || $empre['ic_4_dorm'] == "on"){ echo "s"; } ?></p>
											</div>
										<?php } ?>

										<?php if( $empre['ic_1_vaga'] == "on" || $empre['ic_2_vaga'] == "on" || $empre['ic_3_vaga'] == "on" || $empre['ic_4_vaga'] == "on"){ ?>
											<div class="vaga">
												<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-vaga.png"  alt="icone-vagas">
												<p><?php if($empre['ic_1_vaga'] == "on"){
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
												} ?> vaga<?php if($empre['ic_2_vaga'] == "on" || $empre['ic_3_vaga'] == "on" || $empre['ic_4_vaga'] == "on"){ echo "s"; } ?></p>
											</div>
										<?php } ?>

										<?php if($empre['ds_metra_min'] != ""){ ?>
											<div class="mquadrado diferente">
												<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mquadrado.png" alt="icone-metro-quadrado">
												<p><?php echo $empre['ds_metra_min'];
													if ($empre['ds_metra_max'] != "") {
														echo " - ";
														echo $empre['ds_metra_max'];
													}
													echo " m²"; ?></p>
											</div>
										<?php } ?>
									</div>

									<div class="titulo" style="border-color: <?php echo $empre['cd_hexadecimal']; ?>;">
										<h3><?php echo $empre['nm_preview_empreendimento']; ?></h3>
										<p><?php echo $empre['ds_bairro']; ?></p>
									</div>
								</div>
							</a>
							<?php $cont++;
						}else{ ?>
							<a href="<?php echo bloginfo('url'); ?>/empreendimento/interno/?e=<?php echo $empre['nm_url_empreendimento']; ?>" class="ancora <?php echo str_replace(" ", "_", $empre['ds_bairro'] ); ?> <?php echo str_replace(" ", "_", $empre['ds_situacao'] ); ?> <?php if($empre['ic_1_dorm'] == "on"){ echo '1dorm'; } ?> <?php if($empre['ic_2_dorm'] == "on"){ echo '2dorm'; } ?> <?php if($empre['ic_3_dorm'] == "on"){ echo '3dorm'; } ?> <?php if($empre['ic_4_dorm'] == "on"){ echo '4dorm'; } ?> <?php if($empre['ds_metra_min'] <= 100){ echo '100m';} ?> <?php if($empre['ds_metra_min'] >= 101 && $empre['ds_metra_min'] <= 150){ echo '150m';} ?> <?php if($empre['ds_metra_min'] >= 151 && $empre['ds_metra_min'] <= 200){ echo '200m';} ?> <?php if($empre['ds_metra_min'] >= 201 ){ echo '201m';} ?> " >
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 item mini">
									<div class="col-lg-5 pd--0 foto">
										<img  class="lazyload" data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['ds_thumb']; ?>" alt="imagem-thumb-empreendimento">
										<p class="status" style="background: <?php echo $empre['cd_hexadecimal']; ?>;"><?php echo $empre['ds_situacao']; ?></p>
									</div>

									<div class="col-lg-7 pd--0">
										<div class="titulo" style="border-color: <?php echo $empre['cd_hexadecimal']; ?>;">
											<h3><?php echo $empre['nm_preview_empreendimento']; ?></h3>
											<p><?php echo $empre['ds_bairro']; ?></p>
										</div>

										<div class="row vantagem" style="padding-right: 0; padding-left: 0;">


											<?php if( $empre['ic_1_dorm'] == "on" || $empre['ic_2_dorm'] == "on" || $empre['ic_3_dorm'] == "on" || $empre['ic_4_dorm'] == "on"){ ?>

												<div class="col-lg-6 border--right flex pd--0-7 txt--cent">
													<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-dorms.png"  alt="icone-dorms">
													<p><?php if($empre['ic_1_dorm'] == "on"){
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

														} ?><br>dorm<?php if($empre['ic_2_dorm'] == "on" || $empre['ic_3_dorm'] == "on" || $empre['ic_4_dorm'] == "on"){ echo "s"; } ?></p>
												</div>
											<?php } ?>

											<?php if( $empre['ic_1_suite'] == "on" || $empre['ic_2_suite'] == "on" || $empre['ic_3_suite'] == "on" || $empre['ic_4_suite'] == "on"){ ?>
												<div class="col-lg-6 flex pd--0-7 txt--cent">
													<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-suite.png" alt="icone-suite">
													<p><?php
														if($empre['ic_1_suite'] == "on"){
															echo "1";
															if($empre['ic_2_suite'] == "on"){
																echo ", 2";
																if ($empre['ic_3_suite'] == "on") {
																	echo ", 3";
																	if($empre['ic_4_suite'] == "on"){
																		echo " e 4";
																	}
																}else{
																	if($empre['ic_4_suite'] == "on"){
																		echo " e 4";
																	}
																}
															}else{
																if ($empre['ic_3_suite'] == "on") {
																	echo ", 3";
																	if($empre['ic_4_suite'] == "on"){
																		echo " e 4";
																	}
																}else{
																	if($empre['ic_4_suite'] == "on"){
																		echo " e 4";
																	}
																}
															}
														}else{
															if($empre['ic_2_suite'] == "on"){
																echo "2";
																if ($empre['ic_3_suite'] == "on") {
																	echo ", 3";
																	if($empre['ic_4_suite'] == "on"){
																		echo " e 4";
																	}
																}else{
																	if($empre['ic_4_suite'] == "on"){
																		echo " e 4";
																	}
																}
															}else{
																if ($empre['ic_3_suite'] == "on") {
																	echo "3";
																	if($empre['ic_4_suite'] == "on"){
																		echo " e 4";
																	}
																}else{
																	if($empre['ic_4_suite'] == "on"){
																		echo "4";
																	}
																}
															}

														} ?> suite<?php if($empre['ic_2_suite'] == "on" || $empre['ic_3_suite'] == "on" || $empre['ic_4_suite'] == "on"){ echo "s"; } ?></p>
												</div>
											<?php } ?>
										</div>
										
										<?php if($empre['ds_mar'] != ""){ ?>
											<div class="row vantagem flex border--top-bottom pd--0-7">
												<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mar.png" alt="icone-mar">
												<p><?php echo $empre['ds_mar']; ?>m<br>do mar</p>
											</div>
										<?php } ?>
			
										<?php if($empre['ds_metra_min'] != ""){ ?>
											<div class="row vantagem flex pd--0-7">
												<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mquadrado.png" alt="icone-metro-quadrado">
												<p><?php echo $empre['ds_metra_min'];
													if ($empre['ds_metra_max'] != "") {
														echo " - ";
														echo $empre['ds_metra_max'];
													}
													echo " m²"; ?></p>
											</div>
										<?php } ?>

									</div>
								</div>
							</a>
						<?php }
					} ?>

					<div class="loading" style="padding-top: 105px;">
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

					<div id="nao_exite" class="text-center" style="display: none;">
						<h1>Nenhum empreendimento encontrado</h1>
					</div>
					
					</div>
				</div>
			</div>
		</div>
	</section>

<?php 
	get_footer();
?>