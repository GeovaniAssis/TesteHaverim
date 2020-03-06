		<footer>

			<section id="contato-footer" class="container-fluid">
				<div class="row">
					<div class="container">
						<div class="row">

							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 brd-blue-1">
								<h3>CONTATOS</h3>
								<p>
									<a href="https://www.google.com/maps/dir//Av.+Brasil,+612+-+Guilhermina,+Praia+Grande+-+SP,+11701-090/@-24.0072932,-46.4178067,16z/data=!4m9!4m8!1m0!1m5!1m1!1s0x94ce1db676b5d08f:0x2e6ff6c3c28aa07!2m2!1d-46.4185274!2d-24.0107656!3e0">
										<img src="<?php echo bloginfo('template_url');?>/img/icon/icon-pin.png" alt="">
										Av. Brasil, 612 - Boqueirão<br>
										Praia Grande - SP
									</a>
								</p>
								<p class="tel">
									<img src="<?php echo bloginfo('template_url');?>/img/icon/icon-telefone.png" alt="">
									13 3591.<span>CLIQUE</span>
								</p>
							</div>

							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 brd-blue-2">
								<h3>MENU</h3>

								<div class="topico-menu">
									<p><a href="<?php echo bloginfo('url'); ?>">Home</a></p>
									<p><a href="<?php echo bloginfo('url'); ?>/empresa">A Empresa</a></p>
									<p><a href="<?php echo bloginfo('url'); ?>/empreendimento">Empreendimentos</a></p>
									<p><a href="<?php echo bloginfo('url'); ?>/praia-grande">Praia Grande</a></p>
								</div>

								<div class="topico-menu" style="margin-left: 15px;">
									<p><a href="<?php echo bloginfo('url'); ?>/noticias">Notícias</a></p>
									<p><a href="<?php echo bloginfo('url'); ?>/tabelas">Tabelas</a></p>
									<p><a href="<?php echo bloginfo('url'); ?>/contato">Contatos</a></p>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 brd-blue-3">
								<h3>ASSINE NOSSA NEWSLETTER</h3>

								<form id="form-newsletter" class="row">

									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd-rgt--0">
										<input type="text" name="nome" class="nome" placeholder="Seu nome">
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pd-rgt--0">
										<input type="text" name="email" class="email" placeholder="Seu e-mail">
										<input type="submit" class="submit" value="OK">
										<label for="email" generated="true" class="error"></label>
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

								<div class="obrigado">
									<img src="<?php echo bloginfo('template_url');?>/img/icon/icon-sucesso.png" alt="" class="image-fluid">
									<p>Sua assinatura foi efetivada com sucesso!</p>
								</div>

								<div class="erro txt--cent">
									<img src="<?php echo bloginfo('template_url');?>/img/icon/icon-erro.png" alt="" class="image-fluid">

									<p class="txt--cent">Houve um erro ao enviar sua mensagem.</p>

									<button id="tentar--novamente--newslatter">Tentar novamente</button>
								</div>

							</div>

						</div>
					</div>
				</div>
			</section>

			<section id="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">

									<div class="primeiro col-xl-4 col-lg-4 col-md-4 col-sm-12">
										<p>Todos os direitos reservados 2020</p>
									</div>

									<div class="segundo col-xl-4 col-lg-4 col-md-4 col-sm-12">
										<img src="<?php echo bloginfo('template_url');?>/img/logo/tecnocal.png"" alt="" class="image-fluid">
									</div>

									<div class="terceiro col-xl-4 col-lg-4 col-md-4 col-sm-12">
										<img src="<?php echo bloginfo('template_url');?>/img/logo/summer.png" alt="" class="image-fluid">
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="menu-footer" class="mobile">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 btns-footer">

							<div class="btn-footer bord-footer">
								<a href="<?php echo bloginfo('url'); ?>/contato">
									<img src="<?php echo bloginfo('template_url');?>/img/icon/icon-mensagem-mobile.png">
								</a>
							</div>

							<div class="btn-footer bord-footer">
								<a class="ico-te-ligar">
									<img src="<?php echo bloginfo('template_url');?>/img/icon/icon-ligamos-mobile.png">
								</a>
							</div>

							<div class="btn-footer bord-footer">
								<a href="tel:01335919110">
									<img src="<?php echo bloginfo('template_url');?>/img/icon/icon-telefone.png">
								</a>
							</div>

							<div class="btn-footer">
								<a ta href="https://api.whatsapp.com/send?phone=5513996704990&text=Ol%C3%A1,%20tudo%20bem?%20Gostaria%20de%20ter%20mais%20informa%C3%A7%C3%B5es%20sobre%20os%20Residenciais" target="_blank">
									<img src="<?php echo bloginfo('template_url');?>/img/icon/icon-whatsapp-mobile.png">
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>

		</footer>
		

		<script src="<?php bloginfo('template_url'); ?>/js/jquery-3.3.1.min.js"></script>
		<?php wp_footer(); ?>
		<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.mask.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.validate.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/lazyload.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/functions.js"></script>
	</body>
</html>