<?php 
	// Template name: contatos
	session_start();
	$_SESSION['pagina'] = "contatos";

	get_header();
?>

	<section class="titulo-top">
		<div class="container">
			<div class="row bord--left">
				<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-contato.png" style="margin-top: 5px;" alt="icon-contato">
				<h2>Contato</h2>
			</div>
		</div>
	</section>

	<section id="select-contato" class="mrg--60-0-0-0">
		<div class="container pd--0">
			<div class="row">

				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<a href="#ir_tabela">
						<div class="btn--form btn-sac">
							<div class="img"></div>
							<p>SAC</p>
						</div>
					</a>
				</div>

				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<a href="<?php echo bloginfo('url'); ?>/tabelas">
						<div class="btn--form btn-corretor">
							<div class="img"></div>
							<p>CORRETOR DE IMÓVEIS</p>
						</div>
					</a>						
				</div>

				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<a href="#ir_tabela">
						<div class="btn--form btn-trabalhe">
							<div class="img"></div>
							<p>TRABALHE CONOSCO</p>
						</div>
					</a>
				</div>

				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
					<a href="#ir_tabela">
						<div class="btn--form btn-outros">
							<div class="img"></div>
							<p>OUTROS ASSUNTOS</p>
						</div>
					</a>
				</div>

			</div>
		</div>
	</section>

	<section id="formularios">
		<div class="container">
			<div class="row bloco-formulario">

				<div id="ir_tabela" style="margin-top: -130px; position: absolute;"></div>

				<form id="form-sac" action="">

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mrg-tp--15">
						<label for="sac_nome" class="titulo">Nome:</label>
						<input type="text" id="sac_nome" name="nome" class="nome">
					</div>

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mrg-tp--15">
						<label for="sac_telefone" class="titulo">Telefone:</label>
						<input type="text" id="sac_telefone" name="telefone" class="telefone">
					</div>

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mrg-tp--15">
						<label for="sac_email" class="titulo">E-mail:</label>
						<input type="text" id="sac_email" name="email" class="email">
					</div>

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mrg-tp--15">
						<select id="sac_empreendimento" name="empreendimento">
							<option disabled selected>Empreendimento</option>
							<option value="Res. São Conrado">Res. São Conrado</option>
							<option value="Res. Praia do Recreio">Res. Praia do Recreio</option>
							<option value="Res. Londres">Res. Londres</option>
							<option value="Res. Amsterdam">Res. Amsterdam</option>
							<option value="Res. Praia do Pontal">Res. Praia do Pontal</option>
							<option value="Res. Barra da Tijuca">Res. Barra da Tijuca</option>
							<option value="Res. Ottawa">Res. Ottawa</option>
							<option value="Res. Praia do Leblon">Res. Praia do Leblon</option>
							<option value="Res. Paris">Res. Paris</option>
							<option value="Res. Praia do Arpoador">Res. Praia do Arpoador</option>
							<option value="Res. Praia das Conchas">Res. Praia das Conchas</option>
							<option value="Res Praia de Ipanema">Res Praia de Ipanema</option>
							<option value="Res. Praia do Leme">Res. Praia do Leme</option>
							<option value="Res. Praia da Urca">Res. Praia da Urca</option>
							<option value="Res. Praia da Gávea">Res. Praia da Gávea</option>
							<option value="Res. Praia do Forte">Res. Praia do Forte</option>
							<option value="Outros">Outros</option>
						</select>
					</div>

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mrg-tp--15">
						<label for="sac_assunto" class="titulo">Assunto:</label>
						<input type="text" id="sac_assunto" name="assunto" class="assunto">
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mrg-tp--15">
						<label for="sac_mensagem" class="titulo">Mensagem:</label>
						<textarea id="sac_mensagem" name="mensagem" class="mensagem"></textarea>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mrg-tp--15 txt--cent">
						<input type="submit" class="submit" value="ENVIAR">
					</div>

				</form>

				<form id="form-trabalhe" action="">

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mrg-tp--15">
						<label for="trabalhe_nome" class="titulo">Nome:</label>
						<input type="text" id="trabalhe_nome" name="nome" class="nome">
					</div>

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mrg-tp--15">
						<label for="trabalhe_telefone" class="titulo">Telefone:</label>
						<input type="text" id="trabalhe_telefone" name="telefone" class="telefone">
					</div>

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mrg-tp--15">
						<label for="trabalhe_email" class="titulo">E-mail:</label>
						<input type="text" id="trabalhe_email" name="email" class="email">
					</div>

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mrg-tp--15">
						<label for="trabalhe_curriculo" class="label_curriculo titulo">Currículo (pdf ou docx): Nenhum arquivo selecionado</label>
						<input type="file" id="trabalhe_curriculo" name="curriculo" class="curriculo">
					</div>

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mrg-tp--15">
						<label for="trabalhe_area" class="titulo">Área de atuação:</label>
						<input type="text" id="trabalhe_area" name="area" class="area">
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mrg-tp--15">
						<label for="trabalhe_mensagem" class="titulo">Mensagem:</label>
						<textarea id="trabalhe_mensagem" name="mensagem" class="mensagem"></textarea>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mrg-tp--15 txt--cent">
						<input type="submit" class="submit" value="ENVIAR">
					</div>

				</form>

				<form id="form-outros" action="">

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mrg-tp--15">
						<label for="outros_nome" class="titulo">Nome:</label>
						<input type="text" id="outros_nome" name="nome" class="nome">
					</div>

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mrg-tp--15">
						<label for="outros_email" class="titulo">E-mail:</label>
						<input type="text" id="outros_email" name="email" class="email">
					</div>					

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mrg-tp--15">
						<label for="outros_telefone" class="titulo">Telefone:</label>
						<input type="text" id="outros_telefone" name="telefone" class="telefone">
					</div>

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mrg-tp--15">
						<label for="outros_celular" class="titulo">Celular:</label>
						<input type="text" id="outros_celular" name="celular" class="celular">
					</div>

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mrg-tp--15">
						<label for="outros_assunto" class="titulo">Assunto:</label>
						<input type="text" id="outros_assunto" name="assunto" class="assunto">
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mrg-tp--15">
						<label for="outros_mensagem" class="titulo">Mensagem:</label>
						<textarea id="outros_mensagem" name="mensagem" class="mensagem"></textarea>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mrg-tp--15 txt--cent">
						<input type="submit" class="submit" value="ENVIAR">
					</div>

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

				<div id="obrigado">
					<div class="c-flash_icon c-flash_icon--success animate font-normal">
						<span class="line tip"></span>
						<span class="line long"></span>
						<div class="placeholder"></div>
						<div class="fix"></div>
					</div>
					<p>Sua mensagem foi enviada com sucesso!<br>Aguarde o contato de nossa equipe.</p>
				</div>

				<div class="erro txt--cent">
					<div class="c-flash_icon c-flash_icon--error animate font-normal">
						<span class="x-mark">
							<span class="line left">
								
							</span>
							<span class="line right">
								
							</span>
						</span>
					</div>

					<p class="txt--cent">Houve um erro ao enviar sua mensagem.</p>

					<button id="tentar--novamente--sac" class="submit">Tentar novamente</button>
					<button id="tentar--novamente--trabalhe" class="submit">Tentar novamente</button>
					<button id="tentar--novamente--outros" class="submit">Tentar novamente</button>
				</div>

			</div>
		</div>
	</section>

	<section id="perguntas" class="mrg-bt--60">
		<div class="container">
			<div class="row">
				<h4>PERGUNTAS FREQUENTES</h4>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>Onde ficam os apartamentos?</h5>

					<p>Atualmente temos empreendimentos na Cidade de Praia Grande nos bairros: Boqueirão, Canto do Forte, Vila Guilhermina, Aviação e Ocian.</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>Já estão prontos?</h5>

					<p>Temos apartamentos prontos para morar, apartamentos em construção e lançamentos. <a href="<?php echo bloginfo('url'); ?>/empreendimento">Acesse aqui</a> e confira!</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>Quanto tenho que pagar por mês?</h5>
					<p>Vai depender da sua renda familiar e do valor do imóvel pretendido.</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>Qual o valor do condomínio?</h5>
					<p>A Tecnocal oferece em suas construções relógio de gás e água individual. Dessa forma seu condomínio terá o custo reduzido.</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>Qual o valor do apartamentos?</h5>
					<p>Atualmente a Tecnocal tem empreendimentos com imóveis à venda a partir de R$ 189.7110,00.</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>Minha mulher, meu irmão, meus pais podem participar da renda?</h5>
					<p>Sim, trata-se de renda bruta familiar.</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>Minha namorada pode participar da renda?</h5>
					<p>Sim, independente do estado civil.</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>Casais homossexuais podem comprar juntos?</h5>
					<p>Sim, independente do estado civil.</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>Posso dar FGTS como entrada?</h5>
					<p>Sim, desde que possua conta do FGTS no mínimo de 3 anos e resida ou trabalhe na Baixada Santista há mais de um ano.</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>Posso parcelar a entrada?</h5>
					<p>Sim, direto com a construtora durante o período de obras.</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>É vantagem comprar um imóvel na planta?</h5>
					<p>Sim, você investe muito pouco, e só paga seu financiamento quando receber as chaves do imóvel. Portanto o valor que pagará mensalmente se torna menor que um aluguel.</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>Quando recebo a escritura?</h5>
					<p>A escritura você retira no ato da assinatura junto à instituição bancária.</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

			<div class="row pergunta">
				<div class="text">
					<h5>Quais os canais de atendimento para quem já é cliente</h5>
					<p>Se você já é proprietário de um apartamento da Tecnocal, deve entrar em contato conosco através do telefone (13) 3356-5964 ou do e-mail: sac@tecnocalconstrutora.com.br. Nosso SAC vai te ajudar.</p>
				</div>				
				<div class="seta">
					<p>^</p>
				</div>
			</div>

		</div>
	</section>

<?php 
	get_footer();
?>