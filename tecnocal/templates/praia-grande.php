<?php 
	// Template name: Praia Grande
	session_start();
	$_SESSION['pagina'] = "praia-grande";

	get_header();
  	include ('include/auto_empreendimento_index.php');
?>

	<section class="titulo-top">
		<div class="container">
			<div class="row bord--left">
				<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-praia-grande.png" style="margin-top: 5px;" alt="icone-praia-grande">
				<h2>Praia <b>Grande</b></h2>
			</div>
		</div>
	</section>

	<section class="perto-praia">
		<div class="container">
			<div class="row bord--left">
				<div class="col-lg-12">
					<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-venha.png" style="margin-top: 5px;" alt="icone-venha-morar">
					<h2>Venha morar <b>perto da praia!</b></h2>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<p class="pdd--0-0-0-15">
						Destacando-se como uma das principais cidades da baixada Santista, Praia Grande tem se transformado em um grande centro de investimento. As obras públicas permitiram a cidade um avanço econômico, fortalecido por sua localização estratégica devido ao fácil acesso a São Paulo, a Santos e ao Sul do País. Seus 23Km de praias tiveram sua orla totalmente reurbanizada deixando muito mais bonita e permitindo que, mesmo com todo desenvolvimento econômico, a cidade continuasse a receber seus turistas com ampla infra estrutura e dando aos seus moradores mais qualidade de vida.
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Carrossel Praia Grande -->
	<section id="owl-praia" class="owl-carousel owl-theme">
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/1.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/2.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/3.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/4.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/5.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/6.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/7.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/8.jpg" alt="foto-bairro-praia-grande">
		</div>
	</section>

	<section id="considerada">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="pdd--0-0-0-15">
						Considerada a cidade que mais cresce no litoral paulista, Praia Grande recebe a visita de turistas durante todo o ano e além de suas belas praias, a cidade também conta com várias opções de lazer em seus diversos passeios e pontos turísticos.
					</p>
					<p class="pdd--0-0-0-15">
						Entre os mais conhecidos estão: o Forte Itaipu que guarda um pedaço da história do nosso país, o Portinho que oferece um maravilhoso passeio de escuna, o Palácio das Artes que recebe grandes produções culturais e exposições, a Feira de Artesanatos da Guilhermina, com suas lindas peças, as grandes esculturas em sua Orla e na Praça da Paz, além é claro, do Shopping localizado na entrada da cidade.
					</p>
					<p class="pdd--0-0-0-15">
						A Tecnocal se orgulha de fazer parte deste desenvolvimento e de oferecer aos seus clientes a possibilidade de realizar seus sonhos com qualidade de vida!
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="perto-praia">
		<div class="container">

			<div class="row bord--left bord--lef-rig">
				<div class="col-lg-12">
					<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-casa-local.png" style="margin-top: 5px;" alt="icone-casa-local">
					<h2>Você nos <b>melhores bairros da cidade</b></h2>
				</div>
			</div>
			<?php
				$cont = 1;
				foreach( $_SESSION['bairros'] as $bairro ){ 
					if( $bairro['ds_bairro'] == "Aviação"){
						$posicao = $cont %2; ?>
						<!-- Aviação -->
						<div class="row informacao">

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 img" <?php if( $posicao == 0){ echo "style='float: right;'"; } ?> >
								<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/aviacao.jpg" alt="foto-bairro-aviação">
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 txt--cent" <?php if( $posicao == 0){ echo "style='float: left;'"; } ?> >

								<div class="<?php if( $posicao == 0){ echo "bord--lft pdd-lft--30"; }else{ echo "bord--rgt"; } ?> pdd-top--50">
									<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-local.png" style="float: left; margin: -40px 0 0 0px;" alt="icone-local">

									<h2><b>Aviação</b></h2>

									<p class="pdd-rgt--30">
										Os primeiros anos de Praia Grande como cidade emancipada, um dos primeiros moradores do bairro, proprietário de um grande terreno e perspicaz a ponto de perceber que o novo município sofreria especulação imobiliária, criou o Clube de Praia São Paulo a partir da divisão da área.
									</p>
								</div>
								
								<a href="<?php echo bloginfo('url'); ?>/empreendimento/#aviacao">
									<button>
										EMPREENDIMENTOS<br>NO BAIRRO
									</button>
								</a>

							</div>
						</div>
						<?php $cont++;
					}
					if( $bairro['ds_bairro'] == "Guilhermina"){
						$posicao = $cont %2; ?>
						<!-- Guilhermina -->
						<div class="row informacao">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 img" <?php if( $posicao == 0){ echo "style='float: right;'"; } ?> >
								<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/guilhermina.jpg" alt="foto-bairro-guilhermina">
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 txt--cent" <?php if( $posicao == 0){ echo "style='float: left;'"; } ?> >

								<div class="<?php if( $posicao == 0){ echo "bord--lft pdd-lft--30"; }else{ echo "bord--rgt"; } ?> pdd-top--50">
									<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-local.png" style="float: left; margin: -40px 0 0 0px;" alt="icone-local">

									<h2><b>Guilhermina</b></h2>

									<p>										
										O bairro Guilhermina é muito conhecido por moradores e turistas. Nele fica a Praça de Portugal, onde funciona uma feira permanente de artesanato e a praça de alimentação. O Jardim Guilhermina começou com o loteamento em 1925. Os donos eram Heitor Sanchez Toschi e os irmãos Guilherme e Arnaldo Guinle. Eles se associaram e adquiriram uma área de sítios, com plantações de melancia e abacaxi, de 500m², de frente para o mar. O nome, Guilhermina, foi uma homenagem à mãe dos irmãos Guinle. A família Guinle era proprietária da Companhia Docas de Santos.
									</p>
								</div>
								
								<a href="<?php echo bloginfo('url'); ?>/empreendimento/#guilhermina">
									<button class="mrg-lft--30">
										EMPREENDIMENTOS<br>NO BAIRRO
									</button>
								</a>
							</div>
						</div>
						<?php $cont++;
					}
					if( $bairro['ds_bairro'] == "Boqueirão"){
						$posicao = $cont %2; ?>
						<!-- Boqueirão -->
						<div class="row informacao">

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 img" <?php if( $posicao == 0){ echo "style='float: right;'"; } ?> >
								<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/boqueirao.jpg" alt="foto-bairro-boqueirão">
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 txt--cent" <?php if( $posicao == 0){ echo "style='float: left;'"; } ?> >

								<div class="<?php if( $posicao == 0){ echo "bord--lft pdd-lft--30"; }else{ echo "bord--rgt"; } ?> pdd-top--50">
									<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-local.png" style="float: left; margin: -40px 0 0 0px;" alt="icone-local">

									<h2><b>Boqueirão</b></h2>

									<p class="pdd-rgt--30">
										Boqueirão, um dos bairros mais nobres e valorizados da cidade de Praia Grande, que conta com diversas facilidades para seus moradores.
									</p>
								</div>
								
								<a href="<?php echo bloginfo('url'); ?>/empreendimento/#boqueirao">
									<button>
										EMPREENDIMENTOS<br>NO BAIRRO
									</button>
								</a>

							</div>
						</div>
						<?php $cont++;
					}
					if( $bairro['ds_bairro'] == "Canto do Forte"){
						$posicao = $cont %2; ?>
						<!-- Canto do Forte -->
						<div class="row informacao">

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 img" <?php if( $posicao == 0){ echo "style='float: right;'"; } ?> >
								<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/canto-forte.jpg" alt="foto-bairro-canto-forte">
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 txt--cent" <?php if( $posicao == 0){ echo "style='float: left;'"; } ?> >

								<div class="<?php if( $posicao == 0){ echo "bord--lft pdd-lft--30"; }else{ echo "bord--rgt"; } ?> pdd-top--50">
									<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-local.png" style="float: left; margin: -40px 0 0 0px;" alt="icone-local">

									<h2><b>Canto do Forte</b></h2>

									<p>
										Canto do Forte é um bairro nobre da cidade de Praia Grande (SP). Seu nome se dá porque o único acesso da cidade à Fortaleza de Itaipu (Bairro Militar) é pelo bairro. Seus limites são o Bairro Militar ao leste, Xixová ao norte e Boqueirão ao oeste. Na parte sul do bairro fica a Praia do Forte, uma das mais valorizadas não apenas da cidade, mas também de toda a Baixada Santista.
									</p>
								</div>
								
								<a href="<?php echo bloginfo('url'); ?>/empreendimento/#canto_do_forte">
									<button class="mrg-lft--30">
										EMPREENDIMENTOS<br>NO BAIRRO
									</button>
								</a>

							</div>
						</div>
						<?php $cont++;
					}
					if( $bairro['ds_bairro'] == "Ocian"){
						$posicao = $cont %2; ?>
						<!-- Ocian -->
						<div class="row informacao">

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 img" <?php if( $posicao == 0){ echo "style='float: right;'"; } ?> >
								<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/ocian.jpg" alt="foto-bairro-ocian">
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 txt--cent" <?php if( $posicao == 0){ echo "style='float: left;'"; } ?> >

								<div class="<?php if( $posicao == 0){ echo "bord--lft pdd-lft--30"; }else{ echo "bord--rgt"; } ?> pdd-top--50">
									<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-local.png" style="float: left; margin: -40px 0 0 0px;" alt="icone-local">

									<h2><b>Ocian</b></h2>

									<p class="pdd-rgt--30">
										Na época, a Praia Grande era um bairro de São Vicente, com poucos serviços urbanos. A construção dos prédios proporcionou uma infra-estrutura que não havia na região. Foram instalados geradores de energia elétrica, que funcionavam com óleo diesel, sistema de coleta e tratamento de esgotos e água encanada. Lojas, padarias e um próspero comércio passaram a ser estimulados por moradores e turistas.
									</p>
								</div>
								
								<a href="<?php echo bloginfo('url'); ?>/empreendimento/#ocian">
									<button>
										EMPREENDIMENTOS<br>NO BAIRRO
									</button>
								</a>

							</div>
						</div>
						<?php $cont++;
					}
				}
			?>

		</div>
	</section>	

	<section class="sub-titulo-centro">
		<div class="container">
			<div class="row">
				<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-local.png" alt="icone-local">
				<h2>ESCOLHA <b> SEU BAIRRO</b></h2>				
			</div>
		</div>
	</section>

	<!-- Mapa -->
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
				<img  class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/mapa/boqueirao-mapa.jpg" alt="mapa-boqueirão">
			</div>
		</div>
	</section>

	<!-- Carrossel Praia Grande -->
	<section id="owl-grande" class="owl-carousel owl-theme">
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/8.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/7.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/6.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/5.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/4.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/3.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/2.jpg" alt="foto-bairro-praia-grande">
		</div>
		<div class="item">
			<img  class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/1.jpg" alt="foto-bairro-praia-grande">
		</div>
	</section>

<?php 
	get_footer();
?>