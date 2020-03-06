<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('MLogin');
	}
	
	public function index() {

		$this->load->helper('url');

		$this->form_validation->set_rules('email','E-mail','trim|required');
		$this->form_validation->set_rules('senha','Senha','trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login/login');
		}
		else
		{	
			$usuario = $this->MLogin->validar_usuario($this->input->post());

			if( !$usuario ):

				$this->session->set_flashdata('erro','Email/Senha Inválido ou Usuário inexistente');

				redirect('login', 'refresh' );

			elseif( $usuario['ic_suspenso'] == 1 ):	

				$this->session->set_flashdata('suspenso','Usuário suspenso, entre em contato com o administrador');

				redirect('login', 'refresh' );

			else:

				$permissoes = $this->MLogin->buscar_permissoes( $usuario['cd_usuario'] ) ;
				$modulos = $this->MLogin->buscar_modulo( $usuario['cd_usuario'] ) ;
				$modulo_cadastrar = $this->MLogin->buscar_modulo_cadastrar( $usuario['cd_usuario'] ) ;

				$dados = array('codigo' => $usuario['cd_usuario'], 
							   'usuario' => $usuario['nm_usuario'], 
							   'email' => $usuario['ds_email'], 
							   'perfil' => $usuario['cd_perfil'],
							   'permissoes' => $permissoes,
							   'modulos' => $modulos,
							   'modulos_cadastrar' => $modulo_cadastrar);

				$this->session->set_userdata($dados);
			
				redirect('home','refresh'); 

			endif;

		}

	}

	// **********************************************	██╗   ██╗
	// **********************************************	██║   ██║
	// *********           Função           *********	██║   ██║
	// *********     editar -> UPDATE       *********	██║   ██║
	// **********************************************	╚██████╔╝
	// **********************************************	 ╚═════╝ 

		public function recuperar_senha() {


			$this->form_validation->set_rules('email','E-mail','trim|required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('login/recuperar-senha');
			}
			else
			{	

				$usuario = $this->MLogin->checar_usuario( $this->input->post() );


				if($usuario){

					$senha = $this->MLogin->resetar_senha( $usuario['cd_usuario'], $this->my_functions->generate_pwd() );

					$configuracao['assunto'] = 'Tecnocal | Recuperação de senha';
					$configuracao['remetente'] = array( 'nome' => 'Tecnocal',  'email' => 'tecnologia@summercomunicacao.com.br' );
					$configuracao['replayto'][] = array( 'nome' => 'Tecnocal', 'email' => 'tecnologia@summercomunicacao.com.br' );
					$configuracao['destinatarios'][] = array( 'nome' => $usuario['nm_usuario'], 'email' => $usuario['ds_email'] ); 
					$configuracao['titulo'] = "Sua nova senha foi gerada com sucesso";
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

						            <p style="margin-top: 0;">RECUPERAÇÃO DE SENHA</p>

						            <p style="margin: 0; font-size: 16px;">
						              Olá, '.$usuario['nm_usuario'].'.<br>Este é um aviso automático sobre seu pedido de recuperação de senha.
						            </p>          
	            
	            					<hr style="margin: 30px 0; border-color: #125683;">

	            					<p style="">Sua nova senha é:</p>

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
						</table>';


					$this->my_functions->enviar_email( $configuracao );

					$this->session->set_flashdata('sucesso','Recuperação de senha efetuado com sucesso!  Verifique seu email');

					redirect('login', 'refresh');

				}else{

					$this->session->set_flashdata('erro','Email Inválido ou Usuário inexistente.');

					redirect('recuperar-senha', 'refresh');

				}

			}

		}

	// **********************************************	██████╗  
	// **********************************************	██╔══██╗ 
	// *********           Função           *********	██║  ██║ 
	// *********    deletar -> DELETE       *********	██║  ██║ 
	// **********************************************	██████╔╝ 
	// **********************************************	╚═════╝  

		public function sair() {

			$this->session->sess_destroy();
			redirect('login', 'refresh');
		
		}
	
}