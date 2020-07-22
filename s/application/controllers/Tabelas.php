<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabelas extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('MVerificarPermissao');
		$this->load->model('MTabelas');
	}

	public function index() {
		$dados['titulo'] 	= 'Tabelas';
		$dados['tabelas'] 	= $this->MTabelas->buscar_tabelas();

		$perm = 0;
		$cd_usuario = $this->session->userdata("codigo");
		$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Tabelas", "Consultar" );

		if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){
			$dados['pagina'] = 'sistema/tabelas/consultar.php';
		}else{
			$dados['pagina'] = 'acesso-negado.php';
		}

		$this->load->view('base', $dados);
	}

	// **********************************************	 ██████╗ 
	// **********************************************	██╔════╝ 
	// *********           Função           *********	██║      
	// *********           CREATE           *********	██║      
	// **********************************************	╚██████╗ 
	// **********************************************	 ╚═════╝ 

		public function cadastrar( ) {
			$dados['titulo'] = 'Tabelas - Cadastrar';

			$this->load->helper('url');
			$this->form_validation->set_rules('nome',		'Nome',			'trim|required');
			$this->form_validation->set_rules('tipo',		'Tipo',			'trim|required');
			$this->form_validation->set_rules('referencia',	'Referência',	'trim|required');

			$cd_usuario = $this->session->userdata("codigo");
			$perm = 0;		
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Tabelas", "Cadastrar" );

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){
				$dados['pagina'] = 'sistema/tabelas/cadastrar.php';
			}else{
				$dados['pagina'] = 'acesso-negado.php';
			}

			if( $this->form_validation->run() == FALSE ){

				$this->load->view('base', $dados);

			}else{
				if ( $_FILES['tabela']['name'] != null ){
					if ( !file_exists('./assets/tabelas/') ) { mkdir('./assets/tabelas/', 0777, true); }

					$preco = "";
					$revenda = "";
					$nome_tabela = "";
					$data = array( );
					$data = explode( "-" , $this->input->post("referencia") );

					if( $this->input->post("tipo") == 0){
						$preco = 1;
						$revenda = 0;
						$nome_tabela = "tabela_preco";
					}else{
						$preco = 0;
						$revenda = 1;
						$nome_tabela = "tabela_revenda";
					}

					$velidar_data = $this->MTabelas->verificar_data( $data[1], $data[0], $preco, $revenda );

					if( isset($velidar_data[0]) ){
						$this->session->set_flashdata('erro', "Para este tipo de tabela, o mês e ano ja possui cadastro, por favor tente outra data.");
						redirect('tabelas/cadastrar');
					}else{

						$cd_tabela = $this->MTabelas->cadastrar_tabela( $this->input->post("nome"), $preco, $revenda, $data[1], $data[0], $cd_usuario );

						$cd_tabela = $cd_tabela[0]["max(cd_tabela)"];

						if ( !file_exists('./assets/tabelas/'.$cd_tabela.'/') )
							{ mkdir('./assets/tabelas/'.$cd_tabela.'/', 0777, true); }

						$config['upload_path']		= './assets/tabelas/'.$cd_tabela.'/';
						$config['allowed_types']	= 'pdf|doc|docx';
					    $config['file_name'] 		= $nome_tabela;
					    $config['remove_spaces']	= TRUE;

					    $this->load->library('upload', $config);
						$this->upload->initialize($config);

						if ( !$this->upload->do_upload('tabela') ){
			            	$erros = array('error'=>$this->upload->display_errors());
			            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', $erro); }
							redirect('tabelas');
			            }

			            $nome_completo = $nome_tabela.$this->upload->data('file_ext');

				        $this->MTabelas->editar_arquivo_tabela( $cd_tabela, $nome_completo );

						$this->session->set_flashdata('sucesso','Tabela cadastrada com sucesso');
						redirect('tabelas');
					}
				}else{
					$this->session->set_flashdata('erro', "Não foi possivel indentificar o arquivo enviado, tente novamente.");
					redirect('tabelas/cadastrar');
				}
			}
		}

	// **********************************************    ██████╗
	// **********************************************    ██╔════██╗ 
	// *********           Função           *********    ██████╔╝ 
	// *********            READ            *********    ██╔══██╗ 
	// **********************************************    ██║  ██║ 
	// **********************************************    ╚═══╝  ╚═══╝

	// **********************************************	██╗   ██╗
	// **********************************************	██║   ██║
	// *********           Função           *********	██║   ██║
	// *********     editar -> UPDATE       *********	██║   ██║
	// **********************************************	╚██████╔╝
	// **********************************************	 ╚═════╝ 

		public function editar( $cd_tabela = 0 ) {

			if( $cd_tabela == 0 ){ redirect('tabelas'); }
			$dados['titulo'] = 'Tabelas - Editar';

			$this->load->helper('url');
			$this->form_validation->set_rules('nome',		'Nome',			'trim|required');
			$this->form_validation->set_rules('tipo',		'Tipo',			'trim|required');
			$this->form_validation->set_rules('referencia',	'Referência',	'trim|required');

			$cd_usuario = $this->session->userdata("codigo");
			$perm = 0;		
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Tabelas", "Editar" );


			if( $this->form_validation->run() == FALSE ){

				if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){
					$dados['pagina'] = 'sistema/tabelas/editar.php';

					$dados['tabela'] = $this->MTabelas->buscar_tabela( $cd_tabela );
					if( !$dados['tabela'] ){ redirect('tabelas'); }

				}else{
					$dados['pagina'] = 'acesso-negado.php';
				}

				$this->load->view('base', $dados);

			}else{
				if ( !file_exists('./assets/tabelas/') ) { mkdir('./assets/tabelas/', 0777, true); }

				$preco = "";
				$revenda = "";
				$nome_tabela = "";
				$data = array( );
				$data = explode( "-" , $this->input->post("referencia") );

				if( $this->input->post("tipo") == 0){
					$preco = 1; $revenda = 0; $nome_tabela = "tabela_preco";
				}else{
					$preco = 0; $revenda = 1; $nome_tabela = "tabela_revenda";
				}

				$velidar_data = $this->MTabelas->verificar_data( $data[1], $data[0], $preco, $revenda );

				if( isset($velidar_data[0]) && $velidar_data[0]['cd_tabela'] != $cd_tabela ){
					$this->session->set_flashdata('erro', "Para este tipo de tabela, o mês e ano ja possui cadastro, por favor tente outra data.");
					$pagina = 'tabelas/editar/'.$cd_tabela.'/';
					redirect( $pagina );
				}else{
					$this->MTabelas->editar_tabela( $cd_tabela, $this->input->post("nome"), $preco, $revenda, $data[1], $data[0], $cd_usuario );

					if ( $_FILES['tabela']['name'] != null ){
						if ( !file_exists('./assets/tabelas/'.$cd_tabela.'/') )
							{ mkdir('./assets/tabelas/'.$cd_tabela.'/', 0777, true); }

						if(file_exists('./assets/tabelas/'.$cd_tabela.'/'.$this->input->post('tabela_antigo'))){
							unlink('./assets/tabelas/'.$cd_tabela.'/'.$this->input->post('tabela_antigo'));
		            	}

						$config['upload_path']		= './assets/tabelas/'.$cd_tabela.'/';
						$config['allowed_types']	= 'pdf|doc|docx';
					    $config['file_name'] 		= $nome_tabela;
					    $config['remove_spaces']	= TRUE;

					    $this->load->library('upload', $config);
						$this->upload->initialize($config);

						if ( !$this->upload->do_upload('tabela') ){
			            	$erros = array('error'=>$this->upload->display_errors());
			            	foreach ($erros as $erro) { $this->session->set_flashdata('erro', $erro); }
							redirect('tabelas');
			            }

			            $nome_completo = $nome_tabela.$this->upload->data('file_ext');

				        $this->MTabelas->editar_arquivo_tabela( $cd_tabela, $nome_completo );
					}

					$this->session->set_flashdata('sucesso','Tabela editada com sucesso.');
					redirect('tabelas');
				}
			}
		}

	// **********************************************	██████╗  
	// **********************************************	██╔══██╗ 
	// *********           Função           *********	██║  ██║ 
	// *********    deletar -> DELETE       *********	██║  ██║ 
	// **********************************************	██████╔╝ 
	// **********************************************	╚═════╝  
		
		public function excluir( $cd_tabela = 0 ) {

			if( $cd_tabela == 0 ){ redirect('tabelas'); }

			$perm = 0;
			$cd_usuario = $this->session->userdata("codigo");
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Tabelas", "Excluir" );

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){

				$this->MTabelas->excluir_tabela( $cd_tabela, $cd_usuario );

				$this->session->set_flashdata('sucesso','Tabela excluida com sucesso');
				redirect('tabelas', 'refresh' );
			}else{
				$this->session->set_flashdata('suspenso','Você não possui permissão para excluir tabelas.');
				redirect('tabelas', 'refresh' );
			}
		}
}