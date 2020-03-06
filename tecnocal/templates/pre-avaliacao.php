<?php 
	// Template name: Pré-Avaliação
	session_start();
	$_SESSION['pagina'] = "preavaliaca";

	get_header();
  	include ('include/auto_empreendimento_index.php');
?>

	<section class="titulo-top">
		<div class="container">
			<div class="row bord--left">
				<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-tabela.png" style="margin-top: 5px;" alt="icon-tabela">
				<h2>pré-<b>avaliação</b></h2>
			</div>
		</div>
	</section>

	<section id="tabela" class="mrg--60-0">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12" style="text-align: center;">

					<img src="<?php echo bloginfo('template_url'); ?>/img/banner/banner-caixa.jpg" style="max-width: 100%; height: 550px; object-fit: cover;" alt="banner-pre-avaliação">
				</div>

				<div class="cadastrar col-xl-8 col-lg-8 col-md-6 col-sm-6 col-xs-12 pd--0">
					<form id="form-pre-avaliacao" action="">

						<div class="row mrg--0">
							<div class="col-lg-12">
								<p>Preencha a tabela abaixo para fazer a pré-simulação do seu financiamento.</p>
							</div>
						</div>

						<div class="row mrg--0">

							<div class="col-xl-6 col-lg-6">
								
								<select name="bairro" id="bairro" class="bairro input-style">
									<option selected disabled>Em qual bairro você quer morar?</option>
									<?php foreach( $_SESSION['bairros'] as $empre ){  ?>
										<option value="<?php echo str_replace(" ", "_", $empre['ds_bairro'] ); ?>"><?php echo $empre['ds_bairro']; ?></option>
									<?php } ?>
								</select>

							</div>

							<div class="col-xl-6 col-lg-6">

								<select name="empreendimento" id="empreendimento" class="input-style" style="min-height: 45px;">
									<option selected disabled>Empreendimento</option>
									<?php foreach( $_SESSION['empre_all'] as $empre ){  ?>
										<option value="<?php echo str_replace(" ", "_", $empre['nm_preview_empreendimento'] ); ?>"><?php echo $empre['nm_preview_empreendimento']; ?></option>
									<?php } ?>
								</select>

							</div>
						</div>

						<div class="row mrg--0">

							<div class="col-xl-6 col-lg-6">
								<input type="text" name="nome" class="nome" placeholder="Seu nome*">
							</div>

							<div class="col-xl-6 col-lg-6">
								<input type="email" name="email" class="email" placeholder="Seu e-mail*">
							</div>
						</div>

						<div class="row mrg--0">
							<div class="col-xl-6 col-lg-6">
								<input type="text" name="telefone" class="telefone" placeholder="Seu telefone">
							</div>
							<div class="col-xl-6 col-lg-6">
								<input type="text" name="celular" class="celular" placeholder="Seu celular">
							</div>
						</div>

						<div class="row mrg--0">
							<div class="col-xl-6 col-lg-6">
								<input type="text" name="nascimento" class="nascimento" placeholder="Data de Nascimento" onfocus="(this.type='date')" max="<?php  echo date('Y-m-d', strtotime("-18 years")); ?>">

							</div>
						</div>

						<div class="row mrg--0">
							<div class="col-lg-12">
								<div class="range-slider">

									<p class="primeiro">Renda<br>bruta</p>

								  	<input type="range" id="barra-range" name="renda" class="renda range-slider__range" value="0" min="0" max="20000" step="100">

								  	<p class="segunda"><b>Até</b> R$ <span class="range-slider__value">0</span>,00</p>
								  
								</div>
							</div>
						</div>

						<div class="row mrg--0 textos">
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6 hgt--125">
								<p>Possui mínimo de<br>3 anos de FGTS?</p>
							</div>

							<div class="col-xl-1 col-lg-1 col-md-6 col-sm-6 col-xs-6 pd--0 hgt--125">
								<label class="switch">
								  <input type="checkbox" name="fgts" class="fgts">
								  <span class="slider round"></span>
								</label>								
							</div>

							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6 hgt--125">
								<p>Possui<br>dependentes?</p>								
							</div>

							<div class="col-xl-1 col-lg-1 col-md-6 col-sm-6 col-xs-6 pd--0 hgt--125">
								<label class="switch">
								  <input type="checkbox" name="dependentes" class="dependentes">
								  <span class="slider round"></span>
								</label>
							</div>

							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6 hgt--125">
								<p>É servidor<br>público?</p>								
							</div>

							<div class="col-xl-1 col-lg-1 col-md-6 col-sm-6 col-xs-6 pd--0 hgt--125">
								<label class="switch">
								  <input type="checkbox" name="servidor" class="servidor">
								  <span class="slider round"></span>
								</label>								
							</div>

							<hr>
						</div>

						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-4" style="margin-top: 18px;">
							<span class="camp-obri">*Campos obrigatórios</span>
						</div>						

						<input type="submit" value="CADASTRAR" class="btn-submit">
					</form>

					<div class="loading">
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

					<div class="obrigado">

						<div class="c-flash_icon c-flash_icon--success animate font-normal">
							<span class="line tip"></span>
							<span class="line long"></span>
							<div class="placeholder"></div>
							<div class="fix"></div>
						</div>

						<p class="mrg--0">Cadastro efetuado com sucesso.</p>
						
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

						<p id="cad-txt-erro" class="txt--cent"></p>
						
						<div id="tentar--novamente--pre-avaliacao" class="btn-submit">
							TENTAR NOVAMENTE
						</div>
					</div>

				</div>
			</div>
		</div>		
	</section>

<?php 
	get_footer();
?>