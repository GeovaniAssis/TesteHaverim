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