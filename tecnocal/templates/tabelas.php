<?php 
	// Template name: tabelas
	session_start();
	$_SESSION['pagina'] = "tabelas";
	if(isset($_SESSION['login-tabela'])){
		header('Location: http://concepts.summercomunicacao.com.br/tecnocal2.0/tabelas/logado');
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

	<section id="opcao">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 txt--cent">
					<p>
						Para acessar as tabelas de lançamentos e revendas é necessário que sua imobiliária seja cadastrada.<br>
						Para isso basta digitar seu email e senha, ou solicitar seu cadastro abaixo.
					</p>
				</div>
			</div>
		</div>		
	</section>

	<section id="tabela">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">

					<div class="tab-titulo">
						<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-tabela2.png" alt="segundo-icone-tabela">
						<p id="titulo-tabela">ACESSAR TABELAS</p>
					</div>

					<div class="tab-conteudo">

						<form id="form-tabela" action="">

							<div class="col-xl-12 col-lg-12 pd--0">
								<input type="email" id="tab_email" name="tab_email" class="tab_email" placeholder="E-mail">
							</div>

							<div class="col-xl-12 col-lg-12 pd--0">
								<input type="password" id="tab_senha" name="tab_senha" class="tab_senha" placeholder="Senha">
							</div>
							
							<div class="col-xl-12 col-lg-12 pd--0">
								
								<div id="esqueci-senha" class="btn-transparente">
									ESQUECI A SENHA
								</div>								

								<input type="submit" value="ENTRAR" class="btn-submit">
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

						<div class="erro">

							<div class="c-flash_icon c-flash_icon--error animate font-normal">
								<span class="x-mark">
									<span class="line left">
										
									</span>
									<span class="line right">
										
									</span>
								</span>
							</div>

							<p id="txt-erro">Não foi possivel localizar o cadastro.</p>
							
							<div id="tentar--novamente--tabela" class="btn-submit">
								TENTAR NOVAMENTE
							</div>

							<div id="tentar--novamente--rec-senha" class="btn-submit">
								TENTAR NOVAMENTE
							</div>
						</div>

						<form id="form-recuperar-senha-tabela" action="">

							<div class="col-xl-12 col-lg-12 pd--0">
								<input type="email" id="rec_email" name="rec_email" class="rec_email" placeholder="E-mail">
							</div>
							
							<div class="col-xl-12 col-lg-12 pd--0">
								<input type="submit" value="SOLICITAR NOVA SENHA" class="btn-submit">
								<div class="btn-transparente voltar-login">
									&#9166;
								</div>
							</div>
						</form>

						<div class="obrigado">

							<div class="c-flash_icon c-flash_icon--success animate font-normal">
								<span class="line tip"></span>
								<span class="line long"></span>
								<div class="placeholder"></div>
								<div class="fix"></div>
							</div>

							<p>Enviado um e-mail com a sua nova senha.</p>
							
							<div id="tentar--novamente--voltar" class="btn-submit">
								VOLTAR
							</div>
						</div>

					</div>

				</div>

				<div class="cadastrar col-xl-8 col-lg-8 col-md-6 col-sm-6 col-xs-12 pd--0">
					<form id="form-cadastrar-tabela" action="">
						<div class="row mrg--0">

							<div class="col-xl-6 col-lg-6">
								<input type="text" name="creci" class="creci" placeholder="CRECI">
							</div>
							<div class="col-xl-6 col-lg-6">
								<input type="text" name="imobiliaria" class="imobiliaria" placeholder="Imobiliária">
							</div>
						</div>

						<div class="row mrg--0">

							<div class="col-xl-6 col-lg-6">
								<input type="text" name="telefone" class="telefone" placeholder="Telefone">
							</div>
							<div class="col-xl-6 col-lg-6">
								<input type="text" name="cnpj" class="cnpj" placeholder="CNPJ">
							</div>
						</div>

						<div class="row mrg--0">

							<div class="col-xl-6 col-lg-6">
								<input type="text" name="responsavel" class="responsavel" placeholder="Responsável">
							</div>
							<div class="col-xl-6 col-lg-6">
								<input type="text" name="endereco" class="endereco" placeholder="Endereço">
							</div>
						</div>

						<div class="row mrg--0">

							<div class="col-xl-6 col-lg-6">
								<input type="text" name="numero" class="numero" placeholder="Número">
							</div>
							<div class="col-xl-6 col-lg-6">
								<input type="text" name="bairro" class="bairro" placeholder="Bairro">
							</div>
						</div>

						<div class="row mrg--0">
							<div class="col-xl-6 col-lg-6">
								<input type="text" name="cidade" class="cidade" placeholder="Cidade">
							</div>
							<div class="col-xl-6 col-lg-6">
								<select name="estado" class="estado">
									<option selected disabled>Estado</option>
									<option value="AC">Acre</option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amapá</option>
									<option value="AM">Amazonas</option>
									<option value="BA">Bahia</option>
									<option value="CE">Ceará</option>
									<option value="DF">Distrito Federal</option>
									<option value="ES">Espírito Santo</option>
									<option value="GO">Goiás</option>
									<option value="MA">Maranhão</option>
									<option value="MT">Mato Grosso</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Pará</option>
									<option value="PB">Paraíba</option>
									<option value="PR">Paraná</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piauí </option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rondônia</option>
									<option value="RR">Roraima</option>
									<option value="SC">Santa Catarina</option>
									<option value="SP">São Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
								</select>
							</div>
						</div>

						<div class="row mrg--0">
							<div class="col-xl-6 col-lg-6">
								<input type="email" name="email" class="email" placeholder="E-mail">
							</div>
							<div class="col-xl-6 col-lg-6">
								<input type="password" name="senha" class="senha" placeholder="Senha">
							</div>
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
						
						<div id="tentar--novamente--cadastrar-tabela" class="btn-submit">
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