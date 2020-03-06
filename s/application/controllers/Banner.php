<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('MVerificarPermissao');
		$this->load->model('MBanner');
		require('canvas.php' );
	}

	public function index() {
		$dados['titulo'] 	= 'Banner';
		$dados['banner'] 	= $this->MBanner->buscar_banner();

		$cd_usuario 		= $this->session->userdata("codigo");
		$perm 				= 0;
		$perm 				= $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Banner", "Consultar" );

		if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){ $dados['pagina'] = 'sistema/banner/consultar.php'; }
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
			$dados['titulo'] = 'Banner - Cadastrar';

			$cd_usuario = $this->session->userdata("codigo");
			$perm = 0;		
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Banner", "Cadastrar" );

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){ $dados['pagina'] = 'sistema/banner/cadastrar.php'; }
			else{ $dados['pagina'] = 'acesso-negado.php'; }

			$this->load->helper('url');
			$this->form_validation->set_rules('nome','Nome','trim|required');
			$this->form_validation->set_rules('posicao','Posicao','trim|required');
			$this->form_validation->set_rules('estado','Estado','trim|required');
			$this->form_validation->set_rules('dtinicio','Data Inicio','trim|required');	
			$this->form_validation->set_rules('dtfinal','Data Final','trim|required');	

			if( $this->form_validation->run() == FALSE ){

				$this->load->view('base', $dados);

			}else{

				if ( $_FILES['banner_desktop']['name'] != null ){ 

					if (!file_exists('./assets/banner/teste/'))
					{ mkdir('./assets/banner/teste/', 0777, true); }

					$config_banner['upload_path'] 	= './assets/banner/teste/';
					$config_banner['allowed_types'] = 'jpg|png';
	      			$config_banner['file_name'] 	= 'teste';
			        $config_banner['remove_spaces'] = TRUE;
					$this->load->library('upload', $config_banner);
					$this->upload->initialize($config_banner);

					if ( !$this->upload->do_upload('banner_desktop') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Desktop:".$erro); }
						redirect('banner/cadastrar/');
		            }else{
						unlink('./assets/banner/teste/'.$config_banner['file_name'].$this->upload->data('file_ext'));
						if ( $_FILES['banner_tablet1']['name'] != null ){

							$config_banner['upload_path'] 	= './assets/banner/teste/';
							$config_banner['allowed_types'] = 'jpg|png';
			      			$config_banner['file_name'] 	= 'teste';
					        $config_banner['remove_spaces'] = TRUE;
							$this->load->library('upload', $config_banner);
							$this->upload->initialize($config_banner);

							if ( !$this->upload->do_upload('banner_tablet1') ){
				            	$erros = array('error'=>$this->upload->display_errors());
				            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Tablet 1:".$erro); }
								redirect('banner/cadastrar/');
				            }else{
								unlink('./assets/banner/teste/'.$config_banner['file_name'].$this->upload->data('file_ext'));
								if ( $_FILES['banner_tablet2']['name'] != null ){ 

									$config_banner['upload_path'] 	= './assets/banner/teste/';
									$config_banner['allowed_types'] = 'jpg|png';
			      					$config_banner['file_name'] 	= 'teste';
							        $config_banner['remove_spaces'] = TRUE;
									$this->load->library('upload', $config_banner);
									$this->upload->initialize($config_banner);

									if ( !$this->upload->do_upload('banner_tablet2') ){
						            	$erros = array('error'=>$this->upload->display_errors());
						            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Tablet 2:".$erro); }
										redirect('banner/cadastrar/');
						            }else{
										unlink('./assets/banner/teste/'.$config_banner['file_name'].$this->upload->data('file_ext'));
										if ( $_FILES['banner_mobile']['name'] != null ){ 

											$config_banner['upload_path'] 	= './assets/banner/teste/';
											$config_banner['allowed_types'] = 'jpg|png';
			      							$config_banner['file_name'] 	= 'teste';
									        $config_banner['remove_spaces'] = TRUE;
											$this->load->library('upload', $config_banner);
											$this->upload->initialize($config_banner);

											if ( !$this->upload->do_upload('banner_mobile') ){
								            	$erros = array('error'=>$this->upload->display_errors());
								            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Mobile:".$erro); }
												redirect('banner/cadastrar/');
								            }else{
												unlink('./assets/banner/teste/'.$config_banner['file_name'].$this->upload->data('file_ext'));

												$cd_novo_banner = $this->MBanner->cadastrar_banner( $this->input->post(), $cd_usuario );
											 

												if (!file_exists('./assets/banner/'.$cd_novo_banner.'/desktop/'))
												{ mkdir('./assets/banner/'.$cd_novo_banner.'/desktop/', 0777, true); }

												$config_banner['upload_path'] 	= './assets/banner/'.$cd_novo_banner.'/desktop/';
												$config_banner['allowed_types'] = 'jpg|png';
										      	$config_banner['file_name'] 	= $cd_novo_banner.'_desktop';
										        $config_banner['remove_spaces'] = TRUE;
												$this->load->library('upload', $config_banner);
												$this->upload->initialize($config_banner);
												$this->upload->do_upload('banner_desktop');

												$extensao = $this->upload->data('file_ext');

												//para montar os thumbs 
												$upload_data = $this->upload->data(); 
												$img = new canvas();
												$img->carrega ($config_banner['upload_path'] .  $upload_data['file_name'])
													->redimensiona( '1920', '540', 'crop' )  
												    ->grava( $config_banner['upload_path'].$config_banner['file_name'] .  $extensao );
												$img = null;  

									            $nome_completo = $config_banner['file_name'] .  $extensao;

									            $this->MBanner->cadastrar_banner_img( $cd_novo_banner, $nome_completo, 'desktop' );

												if (!file_exists('./assets/banner/'.$cd_novo_banner.'/tablet1/'))
												{ mkdir('./assets/banner/'.$cd_novo_banner.'/tablet1/', 0777, true); }
							
												$config_banner['upload_path'] 	= './assets/banner/'.$cd_novo_banner.'/tablet1/';
												$config_banner['allowed_types'] = 'jpg|png';
			      								$config_banner['file_name'] 	= $cd_novo_banner.'_tablet1';
			        							$config_banner['remove_spaces'] = TRUE;
												$this->load->library('upload', $config_banner);
												$this->upload->initialize($config_banner);
												$this->upload->do_upload('banner_tablet1');

												$extensao = $this->upload->data('file_ext');

												//para montar os thumbs 
												$upload_data = $this->upload->data(); 
												$img = new canvas();
												$img->carrega ($config_banner['upload_path'] .  $upload_data['file_name'])
													->redimensiona( '1200', '470', 'crop' )  
												    ->grava( $config_banner['upload_path'].$config_banner['file_name'] .  $extensao );
												$img = null;  

									            $nome_completo = $config_banner['file_name'] .  $extensao;
									            $this->MBanner->cadastrar_banner_img( $cd_novo_banner, $nome_completo, 'tablet1' );
	       

												if (!file_exists('./assets/banner/'.$cd_novo_banner.'/tablet2/'))
												{ mkdir('./assets/banner/'.$cd_novo_banner.'/tablet2/', 0777, true); }
							
												$config_banner['upload_path'] 	= './assets/banner/'.$cd_novo_banner.'/tablet2/';
												$config_banner['allowed_types'] = 'jpg|png';
		      									$config_banner['file_name'] 	= $cd_novo_banner.'_tablet2';
		        								$config_banner['remove_spaces'] = TRUE;
												$this->load->library('upload', $config_banner);
												$this->upload->initialize($config_banner);
												$this->upload->do_upload('banner_tablet2');
												$extensao = $this->upload->data('file_ext');

												//para montar os thumbs 
												$upload_data = $this->upload->data(); 
												$img = new canvas();
												$img->carrega ($config_banner['upload_path'] .  $upload_data['file_name'])
													->redimensiona( '991', '360', 'crop' )  
												    ->grava( $config_banner['upload_path'].$config_banner['file_name'] .  $extensao );
												$img = null;  

									            $nome_completo = $config_banner['file_name'] .  $extensao;
		            							$this->MBanner->cadastrar_banner_img( $cd_novo_banner, $nome_completo, 'tablet2' );


												if (!file_exists('./assets/banner/'.$cd_novo_banner.'/mobile/'))
												{ mkdir('./assets/banner/'.$cd_novo_banner.'/mobile/', 0777, true); }
							
												$config_banner['upload_path'] 	= './assets/banner/'.$cd_novo_banner.'/mobile/';
												$config_banner['allowed_types'] = 'jpg|png';
			      								$config_banner['file_name'] 	= $cd_novo_banner.'_mobile';
			        							$config_banner['remove_spaces'] = TRUE;
												$this->load->library('upload', $config_banner);
												$this->upload->initialize($config_banner);
												$this->upload->do_upload('banner_mobile');


												$extensao = $this->upload->data('file_ext');

												//para montar os thumbs 
												$upload_data = $this->upload->data(); 
												$img = new canvas();
												$img->carrega ($config_banner['upload_path'] .  $upload_data['file_name'])
													->redimensiona( '767', '297', 'crop' )  
												    ->grava( $config_banner['upload_path'].$config_banner['file_name'] .  $extensao );
												$img = null;  

									            $nome_completo = $config_banner['file_name'] .  $extensao;
		            							$this->MBanner->cadastrar_banner_img( $cd_novo_banner, $nome_completo, 'mobile' );  


												$this->session->set_flashdata('sucesso','Banner cadastrado com sucesso');
												redirect('banner');
											}
							        	}
						            }
						        }
		            		}
						}		            	
		            }
	        	}
	        	
			}
		}

	// **********************************************    ██████╗
	// **********************************************    ██╔══██╗ 
	// *********           Função           *********    ██████╔╝ 
	// *********            READ            *********    ██╔══██╗ 
	// **********************************************    ██║  ██║ 
	// **********************************************    ╚═╝  ╚═╝

		public function pesquisa() {
			$dados['titulo'] 	= 'Banner';

			$perm = 0;
			$cd_usuario = $this->session->userdata("codigo");
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Banner", "Consultar" );
			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){ $dados['pagina'] = 'sistema/banner/consultar.php'; }
			else{ $dados['pagina'] = 'acesso-negado.php'; }

			$dados['banner'] 	= $this->MBanner->pesquisar_banner( $this->input->post() );

			$this->load->view('base', $dados);
		}

	// **********************************************	██╗   ██╗
	// **********************************************	██║   ██║
	// *********           Função           *********	██║   ██║
	// *********     editar -> UPDATE       *********	██║   ██║
	// **********************************************	╚██████╔╝
	// **********************************************	 ╚═════╝ 

		public function editar( $cd_banner_editar = 0 ) {
			if( $cd_banner_editar == 0 ){ redirect('banner'); }
			$dados['titulo'] = 'Banner - Editar';

			$perm = 0;
			$perm = $this->MVerificarPermissao->validar_permissao( $this->session->userdata("codigo"), "Banner", "Editar" );

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){ $dados['pagina'] = 'sistema/banner/editar.php'; }
			else{ $dados['pagina'] = 'acesso-negado.php'; }		

			$this->load->helper('url');
			$this->form_validation->set_rules('nome','Nome','trim|required');
			$this->form_validation->set_rules('posicao','Posicao','trim|required');
			$this->form_validation->set_rules('estado','Estado','trim|required');
			$this->form_validation->set_rules('dtinicio','Data Inicio','trim|required');	
			$this->form_validation->set_rules('dtfinal','Data Final','trim|required');		
			
			if( $this->form_validation->run() == FALSE ){

				$dados['banner'] = $this->MBanner->buscar_banner_editar( $cd_banner_editar );
				if( !$dados['banner'] ){ redirect('banner'); }

				$this->load->view('base', $dados);

			}else{
				$this->MBanner->editar_banner_informacao($this->input->post(), $cd_banner_editar, $this->session->userdata("codigo"));

				if ( $_FILES['banner_desktop']['name'] != null ){ 

					if (!file_exists('./assets/banner/'.$cd_banner_editar.'/desktop/'))
					{ mkdir('./assets/banner/'.$cd_banner_editar.'/desktop/', 0777, true); }

					$config_banner['upload_path'] 	= './assets/banner/'.$cd_banner_editar.'/desktop/';
					$config_banner['allowed_types'] = 'jpg|png';
			      	$config_banner['file_name'] 	= $cd_banner_editar.'_desktop';
			        $config_banner['remove_spaces'] = TRUE;
					$this->load->library('upload', $config_banner);
					$this->upload->initialize($config_banner);

					if ( !$this->upload->do_upload('banner_desktop') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Desktop:".$erro); }
						redirect('banner/editar/'.$cd_banner_editar);
		            }else{

		            	if(file_exists('./assets/banner/'.$cd_banner_editar.'/desktop/'.$this->input->post('banner_desktop_antigo'))){
							unlink('./assets/banner/'.$cd_banner_editar.'/desktop/'.$this->input->post('banner_desktop_antigo'));
		            	}
		            	if(file_exists('./assets/banner/'.$cd_banner_editar.'/desktop/'.$config_banner['file_name'].'1'.$this->upload->data('file_ext'))){
							unlink('./assets/banner/'.$cd_banner_editar.'/desktop/'.$config_banner['file_name'].'1'.$this->upload->data('file_ext'));
		            	}
						$this->upload->do_upload('banner_desktop');

						$extensao = $this->upload->data('file_ext');
						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_banner['upload_path'].$upload_data['file_name'])
							->redimensiona( '1920', '540', 'crop' )  
						    ->grava( $config_banner['upload_path'].$config_banner['file_name'].$extensao );
						$img = null;  

			            $nome_completo = $config_banner['file_name'].$extensao;
			            $this->MBanner->editar_banner_img( $cd_banner_editar, $nome_completo, 'desktop' );
		            }
	        	}

				if ( $_FILES['banner_tablet1']['name'] != null ){ 

					if (!file_exists('./assets/banner/'.$cd_banner_editar.'/tablet1/'))
					{ mkdir('./assets/banner/'.$cd_banner_editar.'/tablet1/', 0777, true); }

					$config_banner['upload_path'] 	= './assets/banner/'.$cd_banner_editar.'/tablet1/';
					$config_banner['allowed_types'] = 'jpg|png';
			      	$config_banner['file_name'] 	= $cd_banner_editar.'_tablet1';
			        $config_banner['remove_spaces'] = TRUE;
					$this->load->library('upload', $config_banner);
					$this->upload->initialize($config_banner);

					if ( !$this->upload->do_upload('banner_tablet1') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Tablet 1:".$erro); }
						redirect('banner/editar/'.$cd_banner_editar);
		            }else{

		            	if(file_exists('./assets/banner/'.$cd_banner_editar.'/tablet1/'.$this->input->post('banner_tablet1_antigo'))){
							unlink('./assets/banner/'.$cd_banner_editar.'/tablet1/'.$this->input->post('banner_tablet1_antigo'));
		            	}
		            	if(file_exists('./assets/banner/'.$cd_banner_editar.'/tablet1/'.$config_banner['file_name'].'1'.$this->upload->data('file_ext'))){
							unlink('./assets/banner/'.$cd_banner_editar.'/tablet1/'.$config_banner['file_name'].'1'.$this->upload->data('file_ext'));
		            	}						
						
						$this->upload->do_upload('banner_tablet1');

						$extensao = $this->upload->data('file_ext');
						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_banner['upload_path'].$upload_data['file_name'])
							->redimensiona( '1200', '470', 'crop' )  
						    ->grava( $config_banner['upload_path'].$config_banner['file_name'].$extensao );
						$img = null;  

			            $nome_completo = $config_banner['file_name'].$extensao;
			            $this->MBanner->editar_banner_img( $cd_banner_editar, $nome_completo, 'tablet1' );	
		            }
	        	}

				if ( $_FILES['banner_tablet2']['name'] != null ){ 

					if (!file_exists('./assets/banner/'.$cd_banner_editar.'/tablet2/'))
					{ mkdir('./assets/banner/'.$cd_banner_editar.'/tablet2/', 0777, true); }

					$config_banner['upload_path'] 	= './assets/banner/'.$cd_banner_editar.'/tablet2/';
					$config_banner['allowed_types'] = 'jpg|png';
			      	$config_banner['file_name'] 	= $cd_banner_editar.'_tablet2';
			        $config_banner['remove_spaces'] = TRUE;
					$this->load->library('upload', $config_banner);
					$this->upload->initialize($config_banner);

					if ( !$this->upload->do_upload('banner_tablet2') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Tablet 2:".$erro); }
						redirect('banner/editar/'.$cd_banner_editar);
		            }else{

		            	if(file_exists('./assets/banner/'.$cd_banner_editar.'/tablet2/'.$this->input->post('banner_tablet2_antigo'))){
							unlink('./assets/banner/'.$cd_banner_editar.'/tablet2/'.$this->input->post('banner_tablet2_antigo'));
		            	}
		            	if(file_exists('./assets/banner/'.$cd_banner_editar.'/tablet2/'.$config_banner['file_name'].'1'.$this->upload->data('file_ext'))){
							unlink('./assets/banner/'.$cd_banner_editar.'/tablet2/'.$config_banner['file_name'].'1'.$this->upload->data('file_ext'));
		            	}						
						
						$this->upload->do_upload('banner_tablet2');

						$extensao = $this->upload->data('file_ext');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_banner['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '991', '360', 'crop' )  
						    ->grava( $config_banner['upload_path'].$config_banner['file_name'] .  $extensao );
						$img = null;  

			            $nome_completo = $config_banner['file_name'] .  $extensao;
			            $this->MBanner->editar_banner_img( $cd_banner_editar, $nome_completo, 'tablet2' );
		            }
	        	}

				if ( $_FILES['banner_mobile']['name'] != null ){ 

					if (!file_exists('./assets/banner/'.$cd_banner_editar.'/mobile/'))
					{ mkdir('./assets/banner/'.$cd_banner_editar.'/mobile/', 0777, true); }

					$config_banner['upload_path'] 	= './assets/banner/'.$cd_banner_editar.'/mobile/';
					$config_banner['allowed_types'] = 'jpg|png';
			      	$config_banner['file_name'] 	= $cd_banner_editar.'_mobile';
			        $config_banner['remove_spaces'] = TRUE;
					$this->load->library('upload', $config_banner);
					$this->upload->initialize($config_banner);

					if ( !$this->upload->do_upload('banner_mobile') ){
		            	$erros = array('error'=>$this->upload->display_errors());
		            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', "Mobile:".$erro); }
						redirect('banner/editar/'.$cd_banner_editar);
		            }else{

		            	if(file_exists('./assets/banner/'.$cd_banner_editar.'/mobile/'.$this->input->post('banner_mobile_antigo'))){
							unlink('./assets/banner/'.$cd_banner_editar.'/mobile/'.$this->input->post('banner_mobile_antigo'));
		            	}
		            	if(file_exists('./assets/banner/'.$cd_banner_editar.'/mobile/'.$config_banner['file_name'].'1'.$this->upload->data('file_ext'))){
							unlink('./assets/banner/'.$cd_banner_editar.'/mobile/'.$config_banner['file_name'].'1'.$this->upload->data('file_ext'));
		            	}						
						
						$this->upload->do_upload('banner_mobile');

						$extensao = $this->upload->data('file_ext');

						//para montar os thumbs 
						$upload_data = $this->upload->data(); 
						$img = new canvas();
						$img->carrega ($config_banner['upload_path'] .  $upload_data['file_name'])
							->redimensiona( '767', '297', 'crop' )  
						    ->grava( $config_banner['upload_path'].$config_banner['file_name'] .  $extensao );
						$img = null;  

			            $nome_completo = $config_banner['file_name'] .  $extensao;
		            	$this->MBanner->editar_banner_img( $cd_banner_editar, $nome_completo, 'mobile' );
		            }
	        	}

				$this->session->set_flashdata('sucesso','Usuário editado com sucesso');
				$this->session->set_flashdata('suspenso','Caso as imagens não troquem, basta atualizar a página e/ou limpar os Cookies<br>( Ctrl + F5 )');
				redirect('banner', 'refresh' );
			}
		}

	// **********************************************	██████╗  
	// **********************************************	██╔══██╗ 
	// *********           Função           *********	██║  ██║ 
	// *********    deletar -> DELETE       *********	██║  ██║ 
	// **********************************************	██████╔╝ 
	// **********************************************	╚═════╝  

		public function excluir( $cd_banner_excluir = 0 ) {

			if( $cd_banner_excluir == 0 ){ redirect('banner'); }
			$dados['titulo'] = 'Banner - Excluir';

			$perm = 0;
			$perm = $this->MVerificarPermissao->validar_permissao( $this->session->userdata("codigo"), "Banner", "Excluir" );

			$cd_usuario = $this->session->userdata("codigo");

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){

				$this->MBanner->excluir_banner( $cd_banner_excluir, $cd_usuario );

				$this->session->set_flashdata('sucesso','Banner excluido com sucesso');
				redirect('banner', 'refresh' );
			}else{
				$this->session->set_flashdata('suspenso','Você não possui permissão para excluir banner.');
				redirect('banner', 'refresh' );
			}
		}
}