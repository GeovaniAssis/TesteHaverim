<?php
	include ($_SERVER["DOCUMENT_ROOT"].'tecnocal2.0/wp-content/themes/tecnocal/php/connection.php');
  	$conn = Database::conexao();

	try {

		$stmt = $conn->prepare("
			SELECT tb_empreendimento.* 
			FROM tb_empreendimento
			WHERE cd_empreendimento  = :cd_empreendimento
			AND ic_empreendimento = 1;
		");
		$stmt->bindValue(':cd_empreendimento', $_POST['empreendimento'] );

		$stmt->execute();

		$empreendimento = $stmt->fetchAll();

		$num_rows = count( $empreendimento );


		if ($num_rows == 0) {

			$empre .= '<center style="height: 315px;"> <span style="font-size: 25px;width: 100%;float: left;margin-top: 10%;">Nenhum produto cadastrado no sistema</span></center>';

			echo $empre;

		}else{

			$empre .= '
				<a href="http://concepts.summercomunicacao.com.br/tecnocal2.0/empreendimento/interno/?e='.$empreendimento[0]["nm_url_empreendimento"].'" class="left teste">
					<div class="predio left">
						<div class="img-predios left">
							<img src="http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/empreendimento/'.$empreendimento[0]["cd_empreendimento"].'/thumb.jpg" class="left" alt="prédios-tecnocal">
						</div>
						<div class="txt-predios left">
							<h2>'.$empreendimento[0]["ds_situacao"].'</h2>
							<div class="descricao-empre left">
								<h3>'.$empreendimento[0]["nm_preview_empreendimento"].'</h3>
								<span>'.$empreendimento[0]["ds_bairro"].'</span>
							</div>';

							if( $empreendimento[0]['ic_1_dorm'] == "on" || $empreendimento[0]['ic_2_dorm'] == "on" || $empreendimento[0]['ic_3_dorm'] == "on" || $empreendimento[0]['ic_4_dorm'] == "on"){ $empre .= '
								<div class="quarto">
									<img src="http://concepts.summercomunicacao.com.br/tecnocal2.0/wp-content/themes/tecnocal/img/icon-color/11-dorms.png" class="icone" alt="icone">
									<p>';
										if($empreendimento[0]['ic_1_dorm'] == "on"){
											$empre .= "1";
											if($empreendimento[0]['ic_2_dorm'] == "on"){
												$empre .= ", 2";
												if ($empreendimento[0]['ic_3_dorm'] == "on") {
													$empre .= ", 3";
													if($empreendimento[0]['ic_4_dorm'] == "on"){
														$empre .= " e 4";
													}
												}else{
													if($empreendimento[0]['ic_4_dorm'] == "on"){
														$empre .= " e 4";
													}
												}
											}else{
												if ($empreendimento[0]['ic_3_dorm'] == "on") {
													$empre .= ", 3";
													if($empreendimento[0]['ic_4_dorm'] == "on"){
														$empre .= " e 4";
													}
												}else{
													if($empreendimento[0]['ic_4_dorm'] == "on"){
														$empre .= " e 4";
													}
												}
											}
										}else{
											if($empreendimento[0]['ic_2_dorm'] == "on"){
												$empre .= "2";
												if ($empreendimento[0]['ic_3_dorm'] == "on") {
													$empre .= ", 3";
													if($empreendimento[0]['ic_4_dorm'] == "on"){
														$empre .= " e 4";
													}
												}else{
													if($empreendimento[0]['ic_4_dorm'] == "on"){
														$empre .= " e 4";
													}
												}
											}else{
												if ($empreendimento[0]['ic_3_dorm'] == "on") {
													$empre .= "3";
													if($empreendimento[0]['ic_4_dorm'] == "on"){
														$empre .= " e 4";
													}
												}else{
													if($empreendimento[0]['ic_4_dorm'] == "on"){
														$empre .= "4";
													}
												}
											}

										} 
										$empre .= ' dorm(s)
									</p>

								</div>';
							}

							if( $empreendimento[0]['ic_1_suite'] == "on" || $empreendimento[0]['ic_2_suite'] == "on" || $empreendimento[0]['ic_3_suite'] == "on" || $empreendimento[0]['ic_4_suite'] == "on"){ $empre .= '
								<div class="quarto">
									<img src="http://concepts.summercomunicacao.com.br/tecnocal2.0/wp-content/themes/tecnocal/img/icon-color/11-suite.png" class="icone" alt="icone">
									<p>';
										if($empreendimento[0]['ic_1_suite'] == "on"){
											$empre .= "1";
											if($empreendimento[0]['ic_2_suite'] == "on"){
												$empre .= ", 2";
												if ($empreendimento[0]['ic_3_suite'] == "on") {
													$empre .= ", 3";
													if($empreendimento[0]['ic_4_suite'] == "on"){
														$empre .= " e 4";
													}
												}else{
													if($empreendimento[0]['ic_4_suite'] == "on"){
														$empre .= " e 4";
													}
												}
											}else{
												if ($empreendimento[0]['ic_3_suite'] == "on") {
													$empre .= ", 3";
													if($empreendimento[0]['ic_4_suite'] == "on"){
														$empre .= " e 4";
													}
												}else{
													if($empreendimento[0]['ic_4_suite'] == "on"){
														$empre .= " e 4";
													}
												}
											}
										}else{
											if($empreendimento[0]['ic_2_suite'] == "on"){
												$empre .= "2";
												if ($empreendimento[0]['ic_3_suite'] == "on") {
													$empre .= ", 3";
													if($empreendimento[0]['ic_4_suite'] == "on"){
														$empre .= " e 4";
													}
												}else{
													if($empreendimento[0]['ic_4_suite'] == "on"){
														$empre .= " e 4";
													}
												}
											}else{
												if ($empreendimento[0]['ic_3_suite'] == "on") {
													$empre .= "3";
													if($empreendimento[0]['ic_4_suite'] == "on"){
														$empre .= " e 4";
													}
												}else{
													if($empreendimento[0]['ic_4_suite'] == "on"){
														$empre .= "4";
													}
												}
											}

										} 
										$empre .= ' suite(s)
									</p>

								</div>';
							}

							if($empreendimento[0]['ds_mar'] != ""){ $empre .= '
								<div class="quarto">
									<img src="http://concepts.summercomunicacao.com.br/tecnocal2.0/wp-content/themes/tecnocal/img/icon-color/11-mar.png" class="icone" alt="icone">
									<p>'.$empreendimento[0]["ds_mar"].'m do mar</p>
								</div>';
							}

							if($empreendimento[0]['ds_metra_min'] != ""){ $empre .= '
								<div class="quarto">
									<img src="http://concepts.summercomunicacao.com.br/tecnocal2.0/wp-content/themes/tecnocal/img/icon-color/11-mquadrado.png" class="icone" alt="icone">
									<p>'.$empreendimento[0]['ds_metra_min'];
										if ($empreendimento[0]['ds_metra_max'] != "") {
											$empre .= ' - '.$empreendimento[0]['ds_metra_max'];
										}
										$empre .= ' m²
									</p>
								</div>';
							}

							$empre .= '

						</div>
					</div>
					<div class="sabermais">
						SAIBA MAIS
					</div>
				</a>
			';

			echo $empre;

		}

	}catch(PDOException $e) { echo 'ERROR: ' . $e->getMessage(); }
?>