<?php
	include ($_SERVER["DOCUMENT_ROOT"].'/tecnocal2.0/wp-content/themes/tecnocal/php/connection.php');
  	$conn = Database::conexao();

	try {

		$stmt = $conn->prepare("SELECT cd_banner, ds_posicao, ds_caminho_desktop, ds_caminho_tablet1, ds_caminho_tablet2, ds_caminho_mobile, ds_link FROM tb_banner WHERE ic_banner = 1 AND ic_suspenso = 0 AND dt_inicio <= :data_inicio AND dt_final >= :data_final ORDER BY ds_posicao ASC;");

		$stmt->bindValue(':data_inicio', date('Y-m-d'));
		$stmt->bindValue(':data_final', date('Y-m-d'));

		$stmt->execute();

		session_start();
		$_SESSION['banners'] = $stmt->fetchAll();

	}catch(PDOException $e) { echo 'ERROR: ' . $e->getMessage(); }


	try {
		$stmt = $conn->prepare("SELECT 
			empre.cd_empreendimento,
			empre.nm_empreendimento,
			empre.nm_preview_empreendimento, 
			empre.nm_url_empreendimento, 




			empre.ds_mar,
			empre.ic_perto_praia,
			empre.ic_revenda,
			empre.ic_varanda,
			empre.ic_1_dorm,
			empre.ic_2_dorm,
			empre.ic_3_dorm,
			empre.ic_4_dorm,
			empre.ic_1_suite,
			empre.ic_2_suite,
			empre.ic_3_suite,
			empre.ic_4_suite,
			empre.ic_1_vaga,
			empre.ic_2_vaga,
			empre.ic_3_vaga,
			empre.ic_4_vaga,
			empre.ds_situacao, 

			empre.ds_bairro, 

			empre.cd_cor,
			empre.ds_logo, 
			empre.ds_capa, 
			empre.ds_thumb,
			empre.im_empreendimento1,
			empre.im_empreendimento2,
			empre.im_empreendimento_principal,

			empre.vl_empreendimento,

			empre.ds_empreendimento,
			empre.ds_metra_min,
			empre.ds_metra_max,
			empre.ds_video,
			empre.ds_fundacao, 
			empre.ds_estrutura, 
			empre.ds_entrega,
			empre.ds_interno,  
			empre.ds_externo, 
			empre.ds_alvenaria,
			empre.ds_piso, 
			empre.ds_instalacoes, 
			empre.ds_pintura, 
			cor.cd_hexadecimal 
			FROM tb_empreendimento AS empre 
			LEFT JOIN tb_colors AS cor ON cor.cd_color = empre.cd_cor WHERE empre.ic_empreendimento = 1 AND empre.ic_suspenso = 0 ORDER BY empre.cd_posicao ASC;");
		$stmt->execute();
		session_start();
		$_SESSION['empre_all'] = $stmt->fetchAll();


		$stmt = $conn->prepare("SELECT * FROM tb_empreendimento_lazer ORDER BY ds_posicao ASC;");
		$stmt->execute();
		session_start();
		$_SESSION['empre_lazer'] = $stmt->fetchAll();


		$stmt = $conn->prepare("SELECT * FROM tb_empreendimento_planta ORDER BY ds_posicao ASC;");
		$stmt->execute();
		session_start();
		$_SESSION['empre_planta'] = $stmt->fetchAll();


		$stmt = $conn->prepare("SELECT * FROM tb_empreendimento_endereco ;");
		$stmt->execute();
		session_start();
		$_SESSION['empre_endereco'] = $stmt->fetchAll();


		$stmt = $conn->prepare("SELECT * FROM tb_empreendimento_obra ORDER BY ds_posicao ASC;");
		$stmt->execute();
		session_start();
		$_SESSION['empre_obra'] = $stmt->fetchAll();

		$stmt = $conn->prepare("SELECT ds_bairro FROM tb_empreendimento AS empre 
			WHERE ic_empreendimento = 1 GROUP BY ds_bairro ORDER BY ds_bairro ASC;");
		$stmt->execute();
		session_start();
		$_SESSION['bairros'] = $stmt->fetchAll();

		$stmt = $conn->prepare("SELECT ds_situacao FROM tb_empreendimento AS empre 
			WHERE ic_empreendimento = 1 GROUP BY ds_situacao ORDER BY ds_situacao ASC;");
		$stmt->execute();
		session_start();
		$_SESSION['situacao'] = $stmt->fetchAll();

	}catch(PDOException $e) { echo 'ERROR: ' . $e->getMessage(); }

 ?>