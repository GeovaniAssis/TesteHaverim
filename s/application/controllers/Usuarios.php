<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('MVerificarPermissao');
		$this->load->model('MUsuarios');
	}

	public function index() {
		$dados['titulo'] 	= 'Usuários';
		$dados['usuarios'] 	= $this->MUsuarios->buscar_usuarios();

		$perm = 0;
		$cd_usuario = $this->session->userdata("codigo");
		$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Usuários", "Consultar" );

		if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){ $dados['pagina'] = 'sistema/usuarios/consultar.php'; }
		else{ $dados['pagina'] = 'acesso-negado.php'; }

		$this->load->view('base', $dados);
	}

	// **********************************************	 ██████╗ 
	// **********************************************	██╔════╝ 
	// *********           Função           *********	██║      
	// *********           CREATE           *********	██║      
	// **********************************************	╚██████╗ 
	// **********************************************	 ╚═════╝ 

		public function cadastrar( ) {
			$dados['titulo'] = 'Usuários - Cadastrar';

			$this->load->helper('url');
			$this->form_validation->set_rules('nome','Nome','trim|required');
			$this->form_validation->set_rules('email','E-mail','trim|required');
			$this->form_validation->set_rules('perfil','Perfil','trim|required');
			$this->form_validation->set_rules('estado','Estado','trim|required');

			$cd_usuario = $this->session->userdata("codigo");
			$perm = 0;		
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Usuários", "Cadastrar" );

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){ $dados['pagina'] = 'sistema/usuarios/cadastrar.php'; }
			else{ $dados['pagina'] = 'acesso-negado.php'; }	


			if( $this->form_validation->run() == FALSE ){

				$dados['perfis'] = $this->MUsuarios->buscar_perfis();
				$dados['modulos'] = $this->MUsuarios->buscar_modulos();
				$dados['tipo_permissao'] = $this->MUsuarios->buscar_permissoes();

				$this->load->view('base', $dados);

			}else{
				if( null != $this->MUsuarios->buscar_email( $this->input->post("email") ) ){
					$this->session->set_flashdata('erro','Este e-mail já esta cadastrado.');
					redirect('usuarios/cadastrar', 'refresh' );
				}else{
					$senha = $this->my_functions->generate_pwd();
					$cd_novo_usuario = $this->MUsuarios->cadastrar_usuario( $this->input->post(), $cd_usuario, $senha );

					$this->MUsuarios->cadastrar_permissoes( $cd_novo_usuario[0]["cd_usuario"], $this->input->post("permissoes"), $this->MUsuarios->buscar_modulos(), $this->MUsuarios->buscar_permissoes() );

					$configuracao['assunto'] = 'Tecnocal | Novo Usuário';
					$configuracao['remetente'] = array( 'nome' => 'Tecnocal',  'email' => 'tecnologia@summercomunicacao.com.br' );
					$configuracao['replayto'][] = array( 'nome' => 'Tecnocal', 'email' => 'tecnologia@summercomunicacao.com.br' );
					$configuracao['destinatarios'][] = array( 'nome' => $this->input->post("nome"), 'email' => $this->input->post("email") ); 
					$configuracao['titulo'] = "Você foi cadastrado no sistema Tecnocal";
					$configuracao['dados'] = array(
						'senha: ' => $senha,
						'url para Acesso: ' => base_url()
					);
					$configuracao['msg'] = 
						'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
							<table id="Table_01" align="center" width="600" border="0" cellpadding="0" cellspacing="0" style="font-family: arial; background-color: #f1f1f1;">

							  <tr>
							    <td width="600" height="200" style="background-color: #f1f1f1;">
							      <img style="margin: 0 auto; display: block;" src="https://tecnocalconstrutora.com.br/novidades/tecnocal2.0/recuperar-senha/images/tecnocal.png" />
							    </td>
							  </tr>

							  <tr>
							    <td width="600">
							      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0; text-align: center; color: #000000; font-size: 20px; font-weight: bold; background-color: #f1f1f1;">

							        <td width="40"></td>

							        <td width="520" style="background-color: #fff; border-top-left-radius: 25px; border-bottom-right-radius: 25px;">
							          <div style="margin: 15px; padding: 15px; border: solid 3px #125683; border-top-left-radius: 15px; border-bottom-right-radius: 15px;">

							            <p style="margin-top: 0;">CADASTRO DE USUÁRIO</p>

							            <p style="margin: 0; font-size: 16px;">
							              Olá, '.$this->input->post("nome").'.<br>Este é um aviso automático, você foi cadastrado no sistema administrativo Tecnocal.<br> Acesse com o seguinte e-mail e senha:
							            </p>          
		            
		            					<hr style="margin: 30px 0; border-color: #125683;">

		            					<p style="">Seu e-mail de acesso é:</p>

							            <p style="margin: 0; font-size: 16px;">
							              '.$this->input->post("email").'
							            </p>

		            					<p style="">Sua senha é:</p>

							            <p style="margin: 0; font-size: 16px;">
							              '.$senha.'
							            </p>

							          </div>
							        </td>
							        <td width="40"></td>
							      </table>
							    </td>
							  </tr>

							  <tr>
							    <td width="600" height="100" border="0" cellpadding="0" cellspacing="0" align="center">
							      <table width="600" height="100" border="0" cellpadding="0" cellspacing="0" align="center">

							        <td width="40" height="100" style="background-color: #f1f1f1;">
							        </td>

							        <td width="520" height="100" style=" padding: 0px; margin: 0px; background-color: #f1f1f1;  border-bottom: solid 2px #50baea;">

							          <p style="margin: 0; text-align: center; font-family: arial; color: #125683; font-size: 20px;">ACESSE:<br><a href="http://concepts.summercomunicacao.com.br/tecnocal2.0/s/" style="text-decoration: none;">http://concepts.summercomunicacao.com.br/tecnocal2.0/s</a></p>

							        </td>

							        <td width="40" height="100" style="background-color: #f1f1f1;">
							        </td>

							      </table>
							    </td>
							  </tr>

							  <tr>
							    <td width="600" height="100" border="0" cellpadding="0" cellspacing="0" align="center">
							      <table width="600" height="100" border="0" cellpadding="0" cellspacing="0" align="center">

							        <td width="40" height="100" style="background-color: #fff;">
							        </td>

							        <td height="100" style=" padding: 0px; margin: 0px; background-color: #fff; padding: 0px; margin: 0px; background-color: #fff; border-top: solid 2px #50baea;">

							          <p style="margin: 0; text-align: center; font-family: arial; color: #000000; font-size: 20px;">Todos os direitos reservados 2019.</p>

							        </td>

							        <td width="40" height="100" style="background-color: #fff;">
							        </td>

							      </table>
							    </td>
							  </tr>
							</table>
						';

					$this->my_functions->enviar_email( $configuracao );

					$this->session->set_flashdata('sucesso','Usuário cadastrado com sucesso');
					$this->session->set_flashdata('suspenso','Foi enviado um e-mail com a senha para o novo usuário');
					redirect('usuarios', 'refresh' );
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
			$dados['titulo'] 	= 'Usuários';

			$perm = 0;
			$cd_usuario = $this->session->userdata("codigo");
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Usuários", "Consultar" );
			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){ $dados['pagina'] = 'sistema/usuarios/consultar.php'; }
			else{ $dados['pagina'] = 'acesso-negado.php'; }

			$dados['usuarios'] 	= $this->MUsuarios->pesquisar_usuarios( $this->input->post() );

			$this->load->view('base', $dados);
		}

	// **********************************************	██╗   ██╗
	// **********************************************	██║   ██║
	// *********           Função           *********	██║   ██║
	// *********     editar -> UPDATE       *********	██║   ██║
	// **********************************************	╚██████╔╝
	// **********************************************	 ╚═════╝ 

		public function editar( $cd_usu_editar = 0 ) {
			if( $cd_usu_editar == 0 ){ redirect('usuarios'); }
			$dados['titulo'] = 'Usuários - Editar';

			$this->load->helper('url');
			$this->form_validation->set_rules('nome','Nome','trim|required');
			$this->form_validation->set_rules('email','E-mail','trim|required');
			$this->form_validation->set_rules('perfil','Perfil','trim|required');
			$this->form_validation->set_rules('estado','Estado','trim|required');

			$cd_usuario = $this->session->userdata("codigo");

			if( $this->form_validation->run() == FALSE ){

				$perm = 0;		
				$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Usuários", "Editar" );

				if( $cd_usuario == $cd_usu_editar ){
					$dados['pagina'] = 'sistema/usuarios/editar.php';
				}else{
					if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){ $dados['pagina'] = 'sistema/usuarios/editar.php'; }
					else{ $dados['pagina'] = 'acesso-negado.php'; }				
				}

				$dados['usuario'] = $this->MUsuarios->buscar_usuario( $cd_usu_editar );
				if( !$dados['usuario'] ){ redirect('usuarios'); }

				$dados['perfis'] = $this->MUsuarios->buscar_perfis();
				$dados['modulos'] = $this->MUsuarios->buscar_modulos();
				$dados['tipo_permissao'] = $this->MUsuarios->buscar_permissoes();
				$dados['usuario_permissao'] = $this->MUsuarios->buscar_permissoes_usuario( $cd_usu_editar );

				$this->load->view('base', $dados);

			}else{

				if( $this->input->post('senha') != $this->input->post('confsenha') ){
					$this->session->set_flashdata('erro', 'O campo senha e confirmar senha estão diferente');
					redirect('usuarios/editar/'.$cd_usu_editar, 'refresh' );
				}

				$this->MUsuarios->editar_usuario($this->input->post(), $cd_usu_editar, $cd_usuario);
				$this->MUsuarios->editar_permissoes( $cd_usu_editar, $this->input->post("permissoes"), $this->MUsuarios->buscar_modulos(), $this->MUsuarios->buscar_permissoes() );
				
				$this->session->set_flashdata('sucesso','Usuário editado com sucesso');
				redirect('usuarios', 'refresh' );
			}
		}

	// **********************************************	██████╗  
	// **********************************************	██╔══██╗ 
	// *********           Função           *********	██║  ██║ 
	// *********    deletar -> DELETE       *********	██║  ██║ 
	// **********************************************	██████╔╝ 
	// **********************************************	╚═════╝  
		
		public function excluir( $cd_usu_excluir = 0 ) {

			if( $cd_usu_excluir == 0 ){ redirect('usuarios'); }
			$dados['titulo'] = 'Usuários - Excluir';

			$perm = 0;
			$perm = $this->MVerificarPermissao->validar_permissao( $this->session->userdata("codigo"), "Usuários", "Excluir" );

			$cd_usuario = $this->session->userdata("codigo");

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){

				$this->MUsuarios->excluir_usuario( $cd_usu_excluir, $cd_usuario );

				$this->session->set_flashdata('sucesso','Usuário excluido com sucesso');
				redirect('usuarios', 'refresh' );
			}else{
				$this->session->set_flashdata('suspenso','Você não possui permissão para excluir usuários.');
				redirect('usuarios', 'refresh' );
			}
		}
}