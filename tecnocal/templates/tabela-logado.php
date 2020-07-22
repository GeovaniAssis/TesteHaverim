<?php 
	// Template name: logado
	session_start();
	$_SESSION['pagina'] = "tabelas";
	if(!isset($_SESSION['login-tabela'])){
		header('Location: http://concepts.summercomunicacao.com.br/tecnocal2.0/tabelas');
	}

	get_header();
?>

	<section class="titulo-top">
		<div class="container">
			<div class="row bord--left">
				<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-tabela.png" style="margin-top: 5px;" alt="icone-tabela">
				<h2>Tabelas</h2>
			</div>
		</div>
	</section>

	<section id="tab-in-btns">
		<div class="container">
			<div class="row">
				<div class="txt col-lg-12 txt--cent">
					<p>
						Escolha a tabela do seu interesse.
					</p>
				</div>
			</div>

			<div class="row btns-tabelas">
				<div class="col-xl-3 col-lg-3 col-md-2"></div>

				<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<?php if( isset($_SESSION["tabelapreco"][0]['cd_tabela']) ){ ?>
						<a href="<?php echo bloginfo('url'); ?>/s/assets/tabelas/<?php echo $_SESSION["tabelapreco"][0]['cd_tabela']; ?>/<?php echo $_SESSION["tabelapreco"][0]['ds_tabela']; ?>" target="_blank">
							<div class="block-azul-claro mrg-bt--40">
								<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-empreendimento.png" alt="icone-empreendimento">
								<p>TABELA DE PREÇOS<br>DOS RESIDENCIAIS</p>
							</div>
						</a>
					<?php }else{ ?>
						<div class="block-azul-claro mrg-bt--40">
							<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-empreendimento.png" alt="icone-empreendimento">
							<p>DESCULPE, NÃO<br>POSSUÍMOS TABELA DE<br>PREÇOS DISPONIVEL</p>
						</div>
					<?php } ?>
				</div>

				<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<?php if( isset($_SESSION["tabelarevenda"][0]['cd_tabela']) ){ ?>
						<a href="<?php echo bloginfo('url'); ?>/s/assets/tabelas/<?php echo $_SESSION["tabelarevenda"][0]['cd_tabela']; ?>/<?php echo $_SESSION["tabelarevenda"][0]['ds_tabela']; ?>" target="_blank">
							<div class="block-azul-claro mrg-bt--40">
								<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-revenda.png" alt="icone-revenda">
								<p>TABELA DE<br>REVENDA</p>
							</div>
						</a>
					<?php }else{ ?>
						<div class="block-azul-claro mrg-bt--40">
							<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-revenda.png" alt="icone-revenda">
							<p>DESCULPE, NÃO<br>POSSUÍMOS TABELA DE<br>REVENDA DISPONIVEL</p>
						</div>
					<?php } ?>					
				</div>
			</div>

			<div class="row btns-tabelas mrg-bt--100">
				<div class="col-xl-3 col-lg-3 col-md-2"></div>

				<div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-xs-12">
					<div class="block-azul-escuro sair-tabela">							
						<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-sair.png" alt="icone-sair">
						<p>SAIR</p>
					</div>				
				</div>
			</div>
		</div>		
	</section>
<?php 
	get_footer();
?>