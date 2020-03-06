<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empreendimentos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('MVerificarPermissao');
		$this->load->model('MEmpreendimentos');
		require('canvas.php' );
	}

	public function index() {
		$dados['titulo'] 			= 'Empreendimentos';
		$dados['empreendimentos'] 	= $this->MEmpreendimentos->buscar_empreendimentos();

		$cd_usuario 				= $this->session->userdata("codigo");
		$perm 						= 0;
		$perm 						= $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Empreendimentos", "Consultar" );

		if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){ $dados['pagina'] = 'sistema/empreendimentos/consultar.php'; }
		else{ $dados['pagina'] = 'acesso-negado.php'; }

		$this->load->view('base', $dados);
	}

	// **********************************************	 ██████╗ 
	// **********************************************	██╔════╝ 
	// *********           Função           *********	██║      
	// *********           CREATE           *********	██║      
	// **********************************************	╚██████╗ 
	// **********************************************	 ╚═════╝ 

		public function cadastrar() {
			$dados['titulo'] = 'Empreendimento - Cadastrar';

			$cd_usuario = $this->session->userdata("codigo");
			$perm = 0;		
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Empreendimentos", "Cadastrar" );

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){ $dados['pagina'] = 'sistema/empreendimentos/cadastrar.php'; }
			else{ $dados['pagina'] = 'acesso-negado.php'; }

			$this->load->helper('url');
			$this->form_validation->set_rules('nome','Nome','trim|required');
			$this->form_validation->set_rules('nome_preview','Nome Resumido','trim|required');			

			if( $this->form_validation->run() == FALSE ){				
				$dados['colors']	= $this->MEmpreendimentos->buscar_cores();
				$this->load->view('base', $dados);
			}else{

				$nome_capa 			= "";
				$nome_thumb 		= "";
				$nome_logo 			= "";
				$nome_destaque1  	= "";
				$nome_destaque2  	= "";
				$nome_mapa  		= "";
				$cd_empreendimento 	= "";

				$cd_empreendimento = $this->MEmpreendimentos->cadastrar( $cd_usuario, $this->input->post() );

				//feito acerto de corte
				if ( $_FILES['capa']['name'] != null ){ 

					if (!file_exists('./assets/empreendimento/'.$cd_empreendimento.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimento.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimento.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'capa';
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('capa') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Capa:".$erro); }
						redirect('empreendimentos/cadastrar');
		            }else{
		            	$extensao = $this->upload->data('file_ext');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '1920', '502', 'crop' )  
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
						$img = null;  

			            $nome_capa = substr($upload_data['file_name'] , 0, -4) .  $extensao;

		            	$this->MEmpreendimentos->cadastrar_capa( $cd_empreendimento, $nome_capa );
		            }		            
	        	}

				//feito acerto de corte
	        	if ( $_FILES['thumb']['name'] != null ){ 
					if (!file_exists('./assets/empreendimento/'.$cd_empreendimento.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimento.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimento.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'thumb';
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('thumb') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Capa:".$erro); }
						redirect('empreendimentos/cadastrar');
		            }else{
		            	$extensao = $this->upload->data('file_ext');		            	

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'].$upload_data['file_name'])
							->redimensiona( '491', '536', 'crop' )  
						    ->grava( substr($config_empreendimento['upload_path'].$upload_data['file_name'] , 0, -4).$extensao );

						$img = null;  

			            $nome_thumb = substr($upload_data['file_name'] , 0, -4).$extensao;
		            	$this->MEmpreendimentos->cadastrar_thumb( $cd_empreendimento, $nome_thumb );
		            }		            
	        	}

				//feito acerto de corte
	        	if ( $_FILES['logo_empreendimento']['name'] != null ){ 

					if (!file_exists('./assets/empreendimento/'.$cd_empreendimento.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimento.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimento.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'logo';
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('logo_empreendimento') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Desktop:".$erro); }
						redirect('empreendimentos/cadastrar');
		            }else{
		            	$extensao = $this->upload->data('file_ext');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '600', '265', 'preenchimento' )
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
						$img = null;

			            $nome_logo = substr($upload_data['file_name'] , 0, -4) .  $extensao;
		            	$this->MEmpreendimentos->cadastrar_logo( $cd_empreendimento, $nome_logo );
		            }		            
	        	}

				//feito acerto de corte
				if ( $_FILES['destaque1_empreendimento']['name'] != null ){ 

					if (!file_exists('./assets/empreendimento/'.$cd_empreendimento.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimento.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimento.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'destaque1';
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('destaque1_empreendimento') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Empreendimento 1:".$erro); }
						redirect('empreendimentos/cadastrar');
		            }else{
		            	$extensao = $this->upload->data('file_ext');

		            	//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '475', '290', 'crop' )
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
						$img = null;

			            $nome_destaque1 = substr($upload_data['file_name'] , 0, -4) .  $extensao;
		            	$this->MEmpreendimentos->cadastrar_destaque1( $cd_empreendimento, $nome_destaque1 );
		            }
	        	}

				//feito acerto de corte
				if ( $_FILES['destaque2_empreendimento']['name'] != null ){ 

					if (!file_exists('./assets/empreendimento/'.$cd_empreendimento.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimento.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimento.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'destaque2';
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('destaque2_empreendimento') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Empreendimento 2:".$erro); }
						redirect('empreendimentos/cadastrar');
		            }else{
		            	$extensao = $this->upload->data('file_ext');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '475', '290', 'crop' )
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
						$img = null;

			            $nome_destaque2 = substr($upload_data['file_name'] , 0, -4) .  $extensao;
		            	$this->MEmpreendimentos->cadastrar_destaque2( $cd_empreendimento, $nome_destaque2 );
		            }
	        	}

				//feito acerto de corte
				if ( $_FILES['destaque_principal_empreendimento']['name'] != null ){
					if (!file_exists('./assets/empreendimento/'.$cd_empreendimento.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimento.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimento.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
						$config_empreendimento['file_name'] 	= 'empreendimento_principal';
					$config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('destaque_principal_empreendimento') ){
						$erros = array('error'=>$this->upload->display_errors());
						foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Empreendimento Destaque Principal:".$erro); }
						redirect('empreendimentos/cadastrar');
					}else{
						$extensao = $this->upload->data('file_ext');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '765', '519', 'crop' )
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
						$img = null;

			            $nome_destaque_princi = substr($upload_data['file_name'] , 0, -4) .  $extensao;
						$this->MEmpreendimentos->cadastrar_destaque_princi( $cd_empreendimento, $nome_destaque_princi );
					}
				}

				//feito acerto de corte
				if ( $_FILES['mapa']['name'] != null ){ 

					if (!file_exists('./assets/empreendimento/'.$cd_empreendimento.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimento.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimento.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'mapa';
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('mapa') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Mapa:".$erro); }
						redirect('empreendimentos/cadastrar');
		            }else{
						$extensao = $this->upload->data('file_ext');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '1920', '427', 'crop' )
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
						$img = null;

			            $nome_mapa = substr($upload_data['file_name'] , 0, -4) .  $extensao;
		            	$this->MEmpreendimentos->cadastrar_mapa( $cd_empreendimento, $nome_mapa );
		            }
	        	}

				//não necessario fazer acerto de corte
				if ( $_FILES['imagem_nova_planta']['name'] != null && $this->input->post("nome_imagem_nova_planta") != "" && $this->input->post("metragem_nova_planta") != "" && $this->input->post("posicao_nova_planta") != "" ) {

					if ( !file_exists('./assets/empreendimento/'.$cd_empreendimento.'/planta/') )
						{ mkdir('./assets/empreendimento/'.$cd_empreendimento.'/planta/', 0777, true); }

					$nome = str_replace(" ", "_", $this->input->post("nome_imagem_nova_planta") );
					$nome = str_replace(".", "", $nome );
					$nome = str_replace("/", "-", $nome );

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimento.'/planta/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= $nome;
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('imagem_nova_planta') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Nova Planta:".$erro); }
						redirect('empreendimentos/editar/'.$cd_empreendimento);
		            }

		            $nome_completo_img 	= $config_empreendimento['file_name'].$this->upload->data('file_ext');
		            $nome_planta 		= $this->input->post("nome_imagem_nova_planta");
		            $metragem 			= $this->input->post("metragem_nova_planta");
		            $posicao 			= $this->input->post("posicao_nova_planta");

		            $this->MEmpreendimentos->nova_planta( $cd_empreendimento, $nome_completo_img, $nome_planta, $metragem, $posicao );
				}

				//feito acerto de corte
				if ( $_FILES['foto_obra_novo']['name'] != null && $this->input->post("nome_foto_obra_novo") && $this->input->post("novo_foto_obra_data") ) {

					if ( !file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/') )
						{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/', 0777, true); }

					$nome = str_replace(" ", "_", $this->input->post("nome_foto_obra_novo") ).date('s');
					$nome = str_replace(".", "", $nome );
					$nome = str_replace("/", "-", $nome );

					$bairro = str_replace(" ", "-", $this->input->post('bairro') );
					$residencial = str_replace(" ", "-", $this->input->post('nome') );

					$nome = 'Apartamento-em-Praia-Grande-'.$bairro.'-'.$residencial.'-'.$nome.'-'.md5(microtime());
					$nome = $this->my_functions->remove_accent($nome);

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= $nome;
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('foto_obra_novo') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Nova Obra:".$erro); }
						redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
		            }


	            	$extensao = $this->upload->data('file_ext');
					//para montar os thumbs 
					$upload_data = $this->upload->data(); 
					$img = new canvas();
					$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
						->redimensiona( '380', '380', 'crop' )
						->hexa( '#50baea' )
					    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .'_thumb'.$extensao );
					$img = null;

		            $nome_completo_img 			= $config_empreendimento['file_name'].$extensao;
		            $nome_completo_img_thumb 	= $config_empreendimento['file_name'].'_thumb'.$extensao;

		            $nome_obra 			= $this->input->post("nome_foto_obra_novo");
		            $data 				= $this->input->post("novo_foto_obra_data");
		            $posicao			= $this->input->post("novo_foto_obra_posicao");

		            $this->MEmpreendimentos->nova_obra( $cd_empreendimentos_editar, $nome_obra, $data, $posicao, $nome_completo_img, $nome_completo_img_thumb );
				}

				//feito acerto de corte
				if ( $_FILES['lazer_novo']['name'] != null && $this->input->post("nome_lazer_novo" ) != "" && $this->input->post("txt_lazer_novo" ) != "" && $this->input->post("novo_lazer_posicao") != "" && $this->input->post("icon-lazer-novo") != "" ) {

					if ( !file_exists('./assets/empreendimento/'.$cd_empreendimento.'/lazer/') )
						{ mkdir('./assets/empreendimento/'.$cd_empreendimento.'/lazer/', 0777, true); }

					$nome = str_replace(" ", "_", $this->input->post("nome_lazer_novo") );
					$nome = str_replace(".", "", $nome );
					$nome = str_replace("/", "-", $nome );

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimento.'/lazer/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= $nome;
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('lazer_novo') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Novo Lazer:".$erro); }
						redirect('empreendimentos/editar/'.$cd_empreendimento);
		            }

				    $extensao = $this->upload->data('file_ext');
					//para montar os thumbs 
					$upload_data = $this->upload->data(); 
					$img = new canvas();
					$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
						->redimensiona( '581', '371', 'crop' )
					    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
					$img = null;


		            $nome_completo_img 	= substr($upload_data['file_name'] , 0, -4) .  $extensao;
		            $nome_lazer 		= $this->input->post("nome_lazer_novo");
		            $descri_lazer 		= $this->input->post("txt_lazer_novo");
		            $posicao 			= $this->input->post("novo_lazer_posicao");
		            $icone 				= $this->input->post("icon-lazer-novo");

		            $this->MEmpreendimentos->novo_lazer( $cd_empreendimento, $nome_completo_img, $nome_lazer, $descri_lazer, $posicao, $icone );
				}

				$this->session->set_flashdata('sucesso','Empreendimento editado com sucesso');
				$this->session->set_flashdata('suspenso','Caso as imagens não troquem, basta atualizar a página e/ou limpar os Cookies<br>( Ctrl + F5 )');
				
				redirect('empreendimentos/editar/'.$cd_empreendimento);
			}
		}

	// **********************************************    ██████╗
	// **********************************************    ██╔══██╗ 
	// *********           Função           *********    ██████╔╝ 
	// *********            READ            *********    ██╔══██╗ 
	// **********************************************    ██║  ██║ 
	// **********************************************    ╚═╝  ╚═╝

		public function pesquisa() {
			$dados['titulo'] 	= 'Empreendimentos';

			$perm = 0;
			$cd_usuario = $this->session->userdata("codigo");
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Empreendimentos", "Consultar" );
			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){ $dados['pagina'] = 'sistema/empreendimentos/consultar.php'; }
			else{ $dados['pagina'] = 'acesso-negado.php'; }

			$dados['empreendimentos'] 	= $this->MEmpreendimentos->pesquisar_empreendimentos( $this->input->post() );

			$this->load->view('base', $dados);
		}

	// **********************************************	██╗   ██╗
	// **********************************************	██║   ██║
	// *********           Função           *********	██║   ██║
	// *********     editar -> UPDATE       *********	██║   ██║
	// **********************************************	╚██████╔╝
	// **********************************************	 ╚═════╝ 

		public function editar( $cd_empreendimentos_editar = 0 ) {
			if( $cd_empreendimentos_editar == 0 ){ redirect('empreendimentos'); }
			$dados['titulo'] = 'Empreendimentos - Editar';

			$perm = 0;
			$perm = $this->MVerificarPermissao->validar_permissao( $this->session->userdata("codigo"), "Empreendimentos", "Editar" );

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){ $dados['pagina'] = 'sistema/empreendimentos/editar.php'; }
			else{ $dados['pagina'] = 'acesso-negado.php'; }	


			$this->load->helper('url');
			$this->form_validation->set_rules('nome','Nome','trim|required');
			$this->form_validation->set_rules('nome_preview','Nome Resumido','trim|required');

			if( $this->form_validation->run() == FALSE ){

				$dados['empreendimentos'] = $this->MEmpreendimentos->buscar_empreendimentos_editar( $cd_empreendimentos_editar );
				if( !$dados['empreendimentos'] ){ redirect('empreendimentos'); }

				$dados['colors']	= $this->MEmpreendimentos->buscar_cores( );
				$dados['lazer']		= $this->MEmpreendimentos->buscar_lazers( $cd_empreendimentos_editar );
				$dados['planta']	= $this->MEmpreendimentos->buscar_plantas( $cd_empreendimentos_editar );
				$dados['endereco']	= $this->MEmpreendimentos->buscar_endereco( $cd_empreendimentos_editar );
				$dados['obra']	= $this->MEmpreendimentos->buscar_obra( $cd_empreendimentos_editar );

				$this->load->view('base', $dados);

			}else{

				$UTCObj = new DateTime("now", new DateTimeZone("UTC"));				 
				$LocalObj = $UTCObj;
				$LocalObj->setTimezone(new DateTimeZone("America/Sao_Paulo"));
				
				$this->MEmpreendimentos->editar_empreendimentos_informacao( $this->input->post(), $cd_empreendimentos_editar, $this->session->userdata("codigo" ));

				//feito acerto de corte
				if ( $_FILES['capa']['name'] != null ){ 

					if (!file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'capa';
			        $config_empreendimento['remove_spaces'] = TRUE;


					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('capa') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Capa:".$erro); }
						redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
		            }else{

		            	$extensao = $this->upload->data('file_ext');
		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('capa_antigo'))){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('capa_antigo'));
		            	}
		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$extensao)){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$extensao);
		            	}
						$this->upload->do_upload('capa');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '1920', '502', 'crop' )  
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );

						$img = null;  

			            $nome_completo = substr($upload_data['file_name'] , 0, -4) .  $extensao;

			            $this->MEmpreendimentos->editar_empreendimento_img( $cd_empreendimentos_editar, $nome_completo, 'capa' ); 

		            }
	        	}

				//feito acerto de corte
				if ( $_FILES['thumb']['name'] != null ){ 

					if (!file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'thumb';
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('thumb') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Capa:".$erro); }
						redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
		            }else{

		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('thumb_antigo'))){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('thumb_antigo'));
		            	}
		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$this->upload->data('file_ext'))){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$this->upload->data('file_ext'));
		            	}
						$this->upload->do_upload('thumb');


						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '491', '536', 'crop' )  
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  '.jpg' );

						$img = null;  

			            $nome_completo = substr($upload_data['file_name'] , 0, -4) .  '.jpg';
			            $this->MEmpreendimentos->editar_empreendimento_img( $cd_empreendimentos_editar, $nome_completo, 'thumb' ); 
		            }
	        	}

				//feito acerto de corte
				if ( $_FILES['logo_empreendimento']['name'] != null ){ 

					if (!file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'logo';
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('logo_empreendimento') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Desktop:".$erro); }
						redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
		            }else{

		            	$extensao = $this->upload->data('file_ext');
		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('logo_antigo'))){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('logo_antigo'));
		            	}
		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$extensao)){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$extensao);
		            	}

		            	$this->upload->do_upload('logo_empreendimento');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '600', '265', 'preenchimento' )
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
						$img = null;

			            $nome_completo = substr($upload_data['file_name'] , 0, -4) .  $extensao;
			            $this->MEmpreendimentos->editar_empreendimento_img( $cd_empreendimentos_editar, $nome_completo, 'logo' );
		            }		            
	        	}

				//feito acerto de corte
				if ( $_FILES['destaque1_empreendimento']['name'] != null ){ 

					if (!file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'destaque1';
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('destaque1_empreendimento') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Empreendimento 1:".$erro); }
						redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
		            }else{

		            	$extensao = $this->upload->data('file_ext');

		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('destaque1_antigo'))){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('destaque1_antigo'));
		            	}
		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$extensao)){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$extensao);
		            	}

		            	$this->upload->do_upload('destaque1_empreendimento');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '475', '290', 'crop' )
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
						$img = null;

			            $nome_completo = substr($upload_data['file_name'] , 0, -4) .  $extensao;
			            $this->MEmpreendimentos->editar_empreendimento_img( $cd_empreendimentos_editar, $nome_completo, 'destaque1' );

		            }
	        	}

				//feito acerto de corte
				if ( $_FILES['destaque2_empreendimento']['name'] != null ){ 

					if (!file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'destaque2';
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('destaque2_empreendimento') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Empreendimento 2:".$erro); }
						redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
		            }else{

		            	$extensao = $this->upload->data('file_ext');

		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('destaque2_antigo'))){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('destaque2_antigo'));
		            	}

		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$extensao)){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$extensao);
		            	}

		            	$this->upload->do_upload('destaque2_empreendimento');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '475', '290', 'crop' )
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
						$img = null;

			            $nome_completo = substr($upload_data['file_name'] , 0, -4) .  $extensao;

			            $this->MEmpreendimentos->editar_empreendimento_img( $cd_empreendimentos_editar, $nome_completo, 'destaque2' );
		            }
		      	}

				//feito acerto de corte
				if ( $_FILES['destaque_principal_empreendimento']['name'] != null ){ 

					if (!file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'empreendimento_principal';
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('destaque_principal_empreendimento') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Empreendimento  Destaque Principal:".$erro); }
						redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
		            }else{

		            	$extensao = $this->upload->data('file_ext');
		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('destaque_principal_antigo'))){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('destaque_principal_antigo'));
		            	}
		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$extensao)){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$extensao);
		            	}
						$this->upload->do_upload('destaque_principal_empreendimento');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '765', '519', 'crop' )
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
						$img = null;

			            $nome_completo = substr($upload_data['file_name'] , 0, -4) .  $extensao;
			            $this->MEmpreendimentos->editar_empreendimento_img( $cd_empreendimentos_editar, $nome_completo, 'destaqueprincipal' );
		            }
	        	}

				//feito acerto de corte
				if ( $_FILES['mapa']['name'] != null ){ 

					if (!file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'))
					{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/', 0777, true); }

					$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/';
					$config_empreendimento['allowed_types'] = 'jpg|png';
			      	$config_empreendimento['file_name'] 	= 'mapa';
			        $config_empreendimento['remove_spaces'] = TRUE;

					$this->load->library('upload', $config_empreendimento);
					$this->upload->initialize($config_empreendimento);

					if ( !$this->upload->do_upload('mapa') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Mapa:".$erro); }
						redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
		            }else{

		            	$extensao = $this->upload->data('file_ext');
		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('mapa_antigo'))){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$this->input->post('mapa_antigo'));
		            	}
		            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$extensao)){
							unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/'.$config_empreendimento['file_name'].'1'.$extensao);
		            	}
						$this->upload->do_upload('mapa');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '1920', '427', 'crop' )
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
						$img = null;

			            $nome_completo = substr($upload_data['file_name'] , 0, -4) .  $extensao;
			            $this->MEmpreendimentos->editar_bloco_endereco_img( $cd_empreendimentos_editar, $nome_completo );
		            }
	        	}

				//não necessario fazer acerto de corte
				if ( $this->input->post("ic_planta_nova" ) == "1" ){

					if ( $_FILES['imagem_nova_planta']['name'] != null && $this->input->post("nome_imagem_nova_planta") ) {

						if ( !file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/planta/') )
							{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/planta/', 0777, true); }

						$nome = str_replace(" ", "_", $this->input->post("nome_imagem_nova_planta") );
						$nome = str_replace(".", "", $nome );
						$nome = str_replace("/", "-", $nome );

						$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/planta/';
						$config_empreendimento['allowed_types'] = 'jpg|png';
				      	$config_empreendimento['file_name'] 	= $nome;
				        $config_empreendimento['remove_spaces'] = TRUE;

						$this->load->library('upload', $config_empreendimento);
						$this->upload->initialize($config_empreendimento);

						if ( !$this->upload->do_upload('imagem_nova_planta') ){
			            	$erros = array('error'=>$this->upload->display_errors());
			            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Nova Planta:".$erro); }
							redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
			            }

			            $nome_completo_img 	= $config_empreendimento['file_name'].$this->upload->data('file_ext');
			            $nome_planta 		= $this->input->post("nome_imagem_nova_planta");
			            $metragem 			= $this->input->post("metragem_nova_planta");
			            $posicao 			= $this->input->post("posicao_nova_planta");

			            $this->MEmpreendimentos->nova_planta( $cd_empreendimentos_editar, $nome_completo_img, $nome_planta, $metragem, $posicao );

					}else{
						$this->session->set_flashdata('erro','Não foi possivel adicionar uma nova planta, está faltando informações');
					}							
	        	}

				//não necessario fazer acerto de corte
	        	if( $this->input->post('bloc_planta_codigo') ){
					foreach ($this->input->post('bloc_planta_codigo') as $codigo) {

						$informacoes = array(
							'cd_empreendimento_planta'	=> $codigo ,
							'nm_planta' 				=> $this->input->post('nome_imagem_planta')[$codigo] ,
							'ds_metragem' 				=> $this->input->post('metragem_planta')[$codigo] ,
							'ds_posicao' 				=> $this->input->post('posicao_planta')[$codigo]
						);

						$this->MEmpreendimentos->editar_bloco_planta( $informacoes );
					    	
						$file = 'imagem_planta'.$codigo;
						
						if ( $_FILES[$file]['name'] != null ){ 

							if ( !file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/planta/') )
							{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/planta/', 0777, true); }

							$nome = str_replace(" ", "_", $this->input->post('nome_imagem_planta')[$codigo] );
							$nome = str_replace(".", "", $nome );
							$nome = str_replace("/", "-", $nome );

							$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/planta/';
							$config_empreendimento['allowed_types'] = 'jpg|png';
						  	$config_empreendimento['file_name'] 	= $nome;
						    $config_empreendimento['remove_spaces'] = TRUE;

							$this->load->library('upload', $config_empreendimento);
							$this->upload->initialize($config_empreendimento);					
				
							if ( $this->upload->do_upload($file) ){

						    	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/planta/'.$this->input->post('bloc_planta_antigo')[$codigo] )){
									unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/planta/'.$this->input->post('bloc_planta_antigo')[$codigo] );
						    	}
				            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/planta/'.$config_empreendimento['file_name'].'1'.$this->upload->data('file_ext'))){
									unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/planta/'.$config_empreendimento['file_name'].'1'.$this->upload->data('file_ext'));
				            	}
				            	$this->upload->do_upload($file);

						    }else{

						    	$erros = array('error'=>$this->upload->display_errors());
						    	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Planta ".$nome.": ".$erro); }
								redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
						    }

						    $nome_completo = $config_empreendimento['file_name'].$this->upload->data('file_ext');

						    $this->MEmpreendimentos->editar_bloco_planta_img( $codigo, $nome_completo );
						}
					}
	        	}

				//feito acerto de corte
				if ( $this->input->post("ic_foto_obra_novo" ) == "1" ){

					if ( $_FILES['foto_obra_novo']['name'] != null && $this->input->post("nome_foto_obra_novo") && $this->input->post("novo_foto_obra_data") ) {

						if ( !file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/') )
							{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/', 0777, true); }

						$nome = str_replace(" ", "_", $this->input->post("nome_foto_obra_novo") ).date('s');
						$nome = str_replace(".", "", $nome );
						$nome = str_replace("/", "-", $nome );

						$bairro = str_replace(" ", "-", $this->input->post('bairro') );
						$residencial = str_replace(" ", "-", $this->input->post('nome') );

						$nome = 'Apartamento-em-Praia-Grande-'.$bairro.'-'.$residencial.'-'.$nome.'-'.md5(microtime());
						$nome = $this->my_functions->remove_accent($nome);

						$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/';
						$config_empreendimento['allowed_types'] = 'jpg|png';
				      	$config_empreendimento['file_name'] 	= $nome;
				        $config_empreendimento['remove_spaces'] = TRUE;

						$this->load->library('upload', $config_empreendimento);
						$this->upload->initialize($config_empreendimento);

						if ( !$this->upload->do_upload('foto_obra_novo') ){
			            	$erros = array('error'=>$this->upload->display_errors());
			            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Nova Obra:".$erro); }
							redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
			            }

		            	$extensao = $this->upload->data('file_ext');
						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'].$upload_data['file_name'])
							->redimensiona( '380', '380', 'crop' )
						    ->grava( $config_empreendimento['upload_path'].$nome.'_thumb'.$extensao );
						$img = null;

			            $nome_completo_img 			= $config_empreendimento['file_name'].$extensao;
			            $nome_completo_img_thumb 	= $config_empreendimento['file_name'].'_thumb'.$extensao;

			            $nome_obra 			= $this->input->post("nome_foto_obra_novo");
			            $data 				= $this->input->post("novo_foto_obra_data");
			            $posicao			= $this->input->post("novo_foto_obra_posicao");

			            $this->MEmpreendimentos->nova_obra( $cd_empreendimentos_editar, $nome_obra, $data, $posicao, $nome_completo_img, $nome_completo_img_thumb );

					}else{
						$this->session->set_flashdata('erro','Não foi possivel adicionar uma nova foto da obra, está faltando informações');
					}							
	        	}

				//feito acerto de corte
	        	if( $this->input->post('bloc_foto_obra_codigo') ){
					foreach ($this->input->post('bloc_foto_obra_codigo') as $codigo) {

						$informacoes = array(
							'cd_empreendimento_obra'	=> $codigo ,
							'nm_obra' 					=> $this->input->post('nome_foto_obra')[$codigo] ,
							'dt_obra' 					=> $this->input->post('bloc_foto_obra_data')[$codigo] ,
							'ds_posicao' 				=> $this->input->post('bloc_foto_obra_posicao')[$codigo]
						);

						$this->MEmpreendimentos->editar_bloco_obra( $informacoes );
					    	
						$file = 'foto_obra_bloc'.$codigo;
						
						if ( $_FILES[$file]['name'] != null ){ 

							if ( !file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/') )
							{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/', 0777, true); }

							$nome = str_replace(" ", "_", $this->input->post('nome_foto_obra')[$codigo] );
							$nome = str_replace(".", "", $nome );
							$nome = str_replace("/", "-", $nome );

							$bairro = str_replace(" ", "-", $this->input->post('bairro') );
							$residencial = str_replace(" ", "-", $this->input->post('nome') );

							$nome = 'Apartamento-em-Praia-Grande-'.$bairro.'-'.$residencial.'-'.$nome.'-'.md5(microtime());
							$nome = $this->my_functions->remove_accent($nome);

							$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/';
							$config_empreendimento['allowed_types'] = 'jpg|png';
						  	$config_empreendimento['file_name'] 	= $nome;
						    $config_empreendimento['remove_spaces'] = TRUE;

							$this->load->library('upload', $config_empreendimento);
							$this->upload->initialize($config_empreendimento);					
				
							if ( $this->upload->do_upload($file) ){

		            			$extensao = $this->upload->data('file_ext');

						    	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/'.$this->input->post('bloc_foto_obra_antigo')[$codigo] )){
									unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/'.$this->input->post('bloc_foto_obra_antigo')[$codigo] );
						    	}
				            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/'.$config_empreendimento['file_name'].'1'.$extensao)){
									unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/obra/'.$config_empreendimento['file_name'].'1'.$extensao);
				            	}
				            	$this->upload->do_upload($file);

								//para montar os thumbs 
								$upload_data = $this->upload->data(); 
								$img = new canvas();
								$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
									->redimensiona( '380', '380', 'crop' )
								    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .'_thumb'.$extensao );
								$img = null;

					            $nome_completo_img 			= $config_empreendimento['file_name'].$extensao;
					            $nome_completo_img_thumb 	= $config_empreendimento['file_name'].'_thumb'.$extensao;

								$this->MEmpreendimentos->editar_bloco_obra_img( $codigo, $$nome_completo_img, $nome_completo_img_thumb );

						    }else{

						    	$erros = array('error'=>$this->upload->display_errors());
						    	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Obra ".$nome.": ".$erro); }
								redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
						    }
						}
					}
	        	}

				//feito acerto de corte
				if ( $this->input->post("ic_lazer_novo" ) == "1" ){

					if ( $_FILES['lazer_novo']['name'] != null && $this->input->post("nome_lazer_novo" ) != "" && $this->input->post("txt_lazer_novo" ) != "" ) {

						if ( !file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/lazer/') )
							{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/lazer/', 0777, true); }

						$nome = str_replace(" ", "_", $this->input->post("nome_lazer_novo") );
						$nome = str_replace(".", "", $nome );
						$nome = str_replace("/", "-", $nome );

						$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/lazer/';
						$config_empreendimento['allowed_types'] = 'jpg|png';
				      	$config_empreendimento['file_name'] 	= $nome;
				        $config_empreendimento['remove_spaces'] = TRUE;

						$this->load->library('upload', $config_empreendimento);
						$this->upload->initialize($config_empreendimento);

						if ( !$this->upload->do_upload('lazer_novo') ){
			            	$erros = array('error'=>$this->upload->display_errors());
			            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Novo Lazer:".$erro); }
							redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
			            }


		            	$extensao = $this->upload->data('file_ext');
						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '581', '371', 'preenchimento' )
							->hexa( '#50baea' )
						    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
						$img = null;

			            $nome_completo_img = substr($upload_data['file_name'] , 0, -4) .  $extensao;
			            $nome_lazer 		= $this->input->post("nome_lazer_novo");
			            $descri_lazer 		= $this->input->post("txt_lazer_novo");
			            $posicao 			= $this->input->post("novo_lazer_posicao");
			            $icone 				= $this->input->post("icon-lazer-novo");

			            $this->MEmpreendimentos->novo_lazer( $cd_empreendimentos_editar, $nome_completo_img, $nome_lazer, $descri_lazer, $posicao, $icone );

					}else{
						$this->session->set_flashdata('erro','Não foi possivel adicionar um novo lazer, está faltando informações');
					}							
	        	}	        	

				//feito acerto de corte
	        	if( $this->input->post('bloc_lazer_codigo') ){
					foreach ($this->input->post('bloc_lazer_codigo') as $codigo) {

						$informacoes = array(
							'cd_lazer' 			=> $codigo ,
							'nm_lazer' 			=> $this->input->post('bloc_nome_lazer')[$codigo] ,
							'ds_posicao' 		=> $this->input->post('bloc_lazer_posicao')[$codigo] ,
							'im_icon'			=> $this->input->post('bloc_icon_lazer')[$codigo] ,
							'ds_lazer' 			=> $this->input->post('bloc_txt_lazer')[$codigo] 
						);

						$this->MEmpreendimentos->editar_bloco_lazer( $informacoes );
					    	
						$file = 'bloc_lazer'.$codigo;
						
						if ( $_FILES[$file]['name'] != null ){ 

							if ( !file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/lazer/') )
							{ mkdir('./assets/empreendimento/'.$cd_empreendimentos_editar.'/lazer/', 0777, true); }

							$nome = str_replace(" ", "_", $this->input->post('bloc_nome_lazer')[$codigo] );
							$nome = str_replace(".", "", $nome );
							$nome = str_replace("/", "-", $nome );

							$config_empreendimento['upload_path'] 	= './assets/empreendimento/'.$cd_empreendimentos_editar.'/lazer/';
							$config_empreendimento['allowed_types'] = 'jpg|png';
						  	$config_empreendimento['file_name'] 	= $nome;
						    $config_empreendimento['remove_spaces'] = TRUE;

							$this->load->library('upload', $config_empreendimento);
							$this->upload->initialize($config_empreendimento);					
				
							if ( $this->upload->do_upload($file) ){

						    	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/lazer/'.$this->input->post('bloc_lazer_antigo')[$codigo] )){
									unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/lazer/'.$this->input->post('bloc_lazer_antigo')[$codigo] );
						    	}
				            	if(file_exists('./assets/empreendimento/'.$cd_empreendimentos_editar.'/lazer/'.$config_empreendimento['file_name'].'1'.$this->upload->data('file_ext'))){
									unlink('./assets/empreendimento/'.$cd_empreendimentos_editar.'/lazer/'.$config_empreendimento['file_name'].'1'.$this->upload->data('file_ext'));
				            	}
				            	$this->upload->do_upload($file);

							    $extensao = $this->upload->data('file_ext');
								//para montar os thumbs 
								$upload_data = $this->upload->data(); 
								$img = new canvas();
								$img->carrega ($config_empreendimento['upload_path'] .  $upload_data['file_name'])
									->redimensiona( '581', '371', 'preenchimento' )
									->hexa( '#50baea' )
								    ->grava( substr($config_empreendimento['upload_path'] .  $upload_data['file_name'] , 0, -4) .  $extensao );
								$img = null;

					            $nome_completo = substr($upload_data['file_name'] , 0, -4) .  $extensao;
							    $this->MEmpreendimentos->editar_bloco_lazer_img( $codigo, $nome_completo );

						    }else{

						    	$erros = array('error'=>$this->upload->display_errors());
						    	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Lazer ".$nome.": ".$erro); }
								redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);
						    }
						}
					}
	        	}					

				$this->session->set_flashdata('sucesso','Empreendimento editado com sucesso');
				$this->session->set_flashdata('suspenso','Caso as imagens não troquem, basta atualizar a página e/ou limpar os Cookies<br>( Ctrl + F5 )');
				
				redirect('empreendimentos/editar/'.$cd_empreendimentos_editar);

			}
		}

	// **********************************************	██████╗  
	// **********************************************	██╔══██╗ 
	// *********           Função           *********	██║  ██║ 
	// *********    deletar -> DELETE       *********	██║  ██║ 
	// **********************************************	██████╔╝ 
	// **********************************************	╚═════╝  

		public function excluir( $cd_empreendimentos_excluir = 0 ) {

			if( $cd_empreendimentos_excluir == 0 ){ redirect('empreendimentos'); }
			$dados['titulo'] = 'Empreendimento - Excluir';

			$perm = 0;
			$perm = $this->MVerificarPermissao->validar_permissao( $this->session->userdata("codigo"), "Empreendimentos", "Excluir" );

			$cd_usuario = $this->session->userdata("codigo");

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){

				$this->MEmpreendimentos->excluir_empreendimentos( $cd_empreendimentos_excluir, $cd_usuario );

				$this->session->set_flashdata('sucesso','Empreendimento excluido com sucesso');
				redirect('empreendimentos', 'refresh' );
			}else{
				$this->session->set_flashdata('suspenso','Você não possui permissão para excluir o empreendimento.');
				redirect('empreendimentos', 'refresh' );
			}
		}

		public function excluirlazer( $cd_empreendimento = 0 ) {

			if( $cd_empreendimento == 0 ){ redirect('empreendimentos'); }

			$dados['titulo'] = 'Empreendimento Lazer - Excluir';

			$perm = 0;
			$perm = $this->MVerificarPermissao->validar_permissao( $this->session->userdata("codigo"), "Empreendimentos", "Excluir" );

			$cd_usuario = $this->session->userdata("codigo");

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){


				$this->MEmpreendimentos->excluirlazer( $cd_empreendimento, $this->input->post() );

				$this->session->set_flashdata('sucesso','Lazer excluido com sucesso');
				redirect('empreendimentos/editar/'.$cd_empreendimento , 'refresh' );
			}else{
				$this->session->set_flashdata('suspenso','Você não possui permissão para excluir o campo de Lazer.');
				redirect('empreendimentos/editar/'.$cd_empreendimento , 'refresh' );
			}
		}

		public function excluirplanta( $cd_empreendimento = 0 ) {

			if( $cd_empreendimento == 0 ){ redirect('empreendimentos'); }

			$dados['titulo'] = 'Empreendimento Planta - Excluir';

			$perm = 0;
			$cd_usuario = $this->session->userdata("codigo");

			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Empreendimentos", "Excluir" );

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){

				$this->MEmpreendimentos->excluirplanta( $cd_empreendimento, $this->input->post() );

				$this->session->set_flashdata('sucesso','Planta excluido com sucesso');
				redirect('empreendimentos/editar/'.$cd_empreendimento , 'refresh' );
			}else{
				$this->session->set_flashdata('suspenso','Você não possui permissão para excluir o campo de Plantas.');
				redirect('empreendimentos/editar/'.$cd_empreendimento , 'refresh' );
			}
		}

		public function excluirobra( $cd_empreendimento = 0 ) {

			if( $cd_empreendimento == 0 ){ redirect('empreendimentos'); }

			$dados['titulo'] = 'Empreendimento Obra - Excluir';

			$perm = 0;
			$cd_usuario = $this->session->userdata("codigo");

			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Empreendimentos", "Excluir" );

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){

				$this->MEmpreendimentos->excluirobra( $cd_empreendimento, $this->input->post() );

				$this->session->set_flashdata('sucesso','Obra excluido com sucesso');
				redirect('empreendimentos/editar/'.$cd_empreendimento , 'refresh' );
			}else{
				$this->session->set_flashdata('suspenso','Você não possui permissão para excluir o campo de Plantas.');
				redirect('empreendimentos/editar/'.$cd_empreendimento , 'refresh' );
			}
		}
}