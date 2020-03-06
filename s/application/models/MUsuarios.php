<?php  	
	class MUsuarios extends CI_Model{

	// **********************************************	 ██████╗ 
	// **********************************************	██╔════╝ 
	// *********           Função           *********	██║      
	// *********           CREATE           *********	██║      
	// **********************************************	╚██████╗ 
	// **********************************************	 ╚═════╝ 

		public function cadastrar_usuario( $dados, $cd_modificador, $senha ) {
			// Alterar Informações
			$informacoes = array(
				'ic_suspenso' 		=> $dados['estado'] ,
				'ic_usuario' 		=> "1" ,
				'nm_usuario' 		=> $dados['nome'] ,
				'ds_email' 			=> $dados['email'] ,
				'cd_perfil' 		=> $dados['perfil'] ,
				'ds_senha' 			=> md5($senha) ,
				'dt_modificacao'	=> date("d/m/Y H:i:s"),
				'cd_modificado' 	=> $cd_modificador
			);
			// Inserindo no Banco
			$this->db->insert('tb_usuario',$informacoes);



			$query = $this->db->select("cd_usuario")
				->from("tb_usuario")				
				->where("ds_email", $dados['email'] );

			return $query->get()->result_array();
		}

		public function cadastrar_permissoes( $cd_usuario, $permissoes, $modulos, $tipo_permissao ) {

			foreach ($modulos as $modulo){
				foreach ($tipo_permissao as $tipo){

					$cd_modulo 		= $modulo['cd_modulo'];
					$cd_permissao 	= $tipo['cd_permissao'];

					if ( isset($permissoes[$cd_modulo][$cd_permissao]) ) {
						$dados = array(
							'cd_usuario' 	=> $cd_usuario,
							'cd_modulo' 	=> $modulo['cd_modulo'], 
							'cd_permissao' 	=> $tipo['cd_permissao'],
							'ic_usu_perm' 	=> '1'
						);
					}else{
						$dados = array(
							'cd_usuario' 	=> $cd_usuario,
							'cd_modulo' 	=> $modulo['cd_modulo'], 
							'cd_permissao'	=> $tipo['cd_permissao'],
							'ic_usu_perm' 	=> '0'
						);
					}
					$this->db->insert('tb_usuario_permissao',$dados);

				}
			}
		}

	// **********************************************    ██████╗
	// **********************************************    ██╔══██╗ 
	// *********           Função           *********    ██████╔╝ 
	// *********            READ            *********    ██╔══██╗ 
	// **********************************************    ██║  ██║ 
	// **********************************************    ╚═╝  ╚═╝ 
	
		public function buscar_email( $email ) {
			$query = $this->db->select("cd_usuario")
				->from("tb_usuario")
				->where("ds_email", $email );

			return $query->get()->result_array();			
		}

		public function buscar_usuario( $cd_usuario ) {
			$query = $this->db->select("tb_usuario.cd_usuario, tb_usuario.ic_suspenso, tb_usuario.nm_usuario, tb_usuario.ds_email, tb_perfil.nm_perfil")
				->from("tb_usuario")
				->join("tb_perfil", "tb_perfil.cd_perfil = tb_usuario.cd_perfil","inner")
				->where("tb_usuario.ic_usuario", 1 )
				->where("tb_usuario.cd_usuario", $cd_usuario );

			return $query->get()->result_array();			
		}
	
		public function buscar_usuarios() {
			$query = $this->db->select("tb_usuario.cd_usuario, tb_usuario.ic_suspenso, tb_usuario.nm_usuario, tb_usuario.ds_email, tb_perfil.nm_perfil")
				->from("tb_usuario")
				->join("tb_perfil", "tb_perfil.cd_perfil = tb_usuario.cd_perfil","inner")
				->where("tb_usuario.ic_usuario", 1 )
				->order_by('tb_usuario.nm_usuario', 'asc');

			return $query->get()->result_array();			
		}
		
		public function buscar_perfis() {
			$query = $this->db->select("*")
				->from("tb_perfil");

			return $query->get()->result_array();			
		}
		
		public function buscar_modulos() {
			$query = $this->db->select("*")
				->from("tb_modulo")
				->where("ic_modulo", 1);

			return $query->get()->result_array();			
		}
		
		public function buscar_permissoes() {
			$query = $this->db->select("*")
				->from("tb_permissoes")
				->where("ic_permissao", 1);

			return $query->get()->result_array();			
		}
		
		public function buscar_permissoes_usuario( $usuario ) {
			$query = $this->db->select("*")
				->from("tb_usuario_permissao")
				->where("cd_usuario", $usuario);

			return $query->get()->result_array();			
		}


		public function pesquisar_usuarios( $dados ) {

			$query = $this->db->select("tb_usuario.cd_usuario, tb_usuario.ic_suspenso, tb_usuario.nm_usuario, tb_usuario.ds_email, tb_perfil.nm_perfil")
				->from("tb_usuario")
				->join("tb_perfil", "tb_perfil.cd_perfil = tb_usuario.cd_perfil","inner")
				->where("tb_usuario.ic_usuario", 1 )
				->order_by('tb_usuario.nm_usuario', 'asc');

			if ( array_key_exists('nome' , $dados ) ) {
				if (strlen($dados['nome'])){ 
					$query->like('tb_usuario.nm_usuario', $dados['nome']);
				}
			}
			if ( array_key_exists('email' , $dados ) ){
				if (strlen($dados['email'])){
					$query->like('tb_usuario.ds_email', $dados['email']);
				}
			}

			return $query->get()->result_array();			
		}

	// **********************************************	██╗   ██╗
	// **********************************************	██║   ██║
	// *********           Função           *********	██║   ██║
	// *********     editar -> UPDATE       *********	██║   ██║
	// **********************************************	╚██████╔╝
	// **********************************************	 ╚═════╝ 

		public function editar_usuario( $dados, $cd_usuario, $cd_modificador ) {
			// Alterar Informações
			$informacoes = array(
				'ic_suspenso' 		=> $dados['estado'] ,
				'nm_usuario' 		=> $dados['nome'] ,
				'ds_email' 		=> $dados['email'] ,
				'cd_perfil' 		=> $dados['perfil'] ,
				'dt_modificacao'	=> date("d/m/Y H:i:s"),
				'cd_modificado' 	=> $cd_modificador
			);			
			// Alterar Senha
			if( $dados['senha'] != ""  ){
				$informacoes['ds_senha'] =  md5($dados['senha']);
			}
			// Executar alteração no Banco
			$this->db->where('cd_usuario', $cd_usuario);
			$this->db->update('tb_usuario', $informacoes);	
		}

		public function editar_permissoes( $cd_usuario, $permissoes, $modulos, $tipo_permissao ) {
			$this->db->query( 'DELETE FROM tb_usuario_permissao WHERE cd_usuario=?', $cd_usuario );
			foreach ($modulos as $modulo){
				foreach ($tipo_permissao as $tipo){

					$cd_modulo 		= $modulo['cd_modulo'];
					$cd_permissao 	= $tipo['cd_permissao'];

					if ( isset($permissoes[$cd_modulo][$cd_permissao]) ) {
						$dados = array(
							'cd_usuario' 	=> $cd_usuario,
							'cd_modulo' 	=> $modulo['cd_modulo'], 
							'cd_permissao' 	=> $tipo['cd_permissao'],
							'ic_usu_perm' 	=> '1'
						);
					}else{
						$dados = array(
							'cd_usuario' 	=> $cd_usuario,
							'cd_modulo' 	=> $modulo['cd_modulo'], 
							'cd_permissao'	=> $tipo['cd_permissao'],
							'ic_usu_perm' 	=> '0'
						);
					}
					$this->db->insert('tb_usuario_permissao',$dados);

				}
			}
		}

	// **********************************************	██████╗  
	// **********************************************	██╔══██╗ 
	// *********           Função           *********	██║  ██║ 
	// *********    deletar -> DELETE       *********	██║  ██║ 
	// **********************************************	██████╔╝ 
	// **********************************************	╚═════╝  

		public function excluir_usuario( $cd_usuario , $cd_modificador ) {
			
			$informacoes = array(
				'ic_usuario' => '0',
				'dt_modificacao'	=> date("d/m/Y H:i:s"),
				'cd_modificado' 	=> $cd_modificador				
			);

			$this->db->where('cd_usuario', $cd_usuario);
			$this->db->update('tb_usuario', $informacoes);

		}
	
	}
?>