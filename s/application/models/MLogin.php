<?php  	
	class MLogin extends CI_Model{

	// **********************************************	 ██████╗ 
	// **********************************************	██╔════╝ 
	// *********           Função           *********	██║      
	// *********           CREATE           *********	██║      
	// **********************************************	╚██████╗ 
	// **********************************************	 ╚═════╝ 

	// **********************************************    ██████╗
	// **********************************************    ██╔══██╗ 
	// *********           Função           *********    ██████╔╝ 
	// *********            READ            *********    ██╔══██╗ 
	// **********************************************    ██║  ██║ 
	// **********************************************    ╚═╝  ╚═╝ 

		public function validar_usuario( $dados ) {
			$query = $this->db->select("*")
					->from("tb_usuario")
					->where('ds_email', $dados['email'])
					->where('ic_usuario', 1)
					->where('ds_senha', md5($dados['senha']));
			return $query->get()->row_array();
		}

		public function checar_usuario( $dados ) {

			$query = $this->db->select('*')
				->from("tb_usuario")
				->where('ds_email', $dados['email']);

			return $query->get()->row_array();

		}
		
		public function buscar_permissoes( $usuario ) {

			$query = $this->db->select("tb_usuario_permissao.cd_modulo, tb_modulo.nm_modulo, tb_modulo.ds_modulo, tb_usuario_permissao.cd_permissao")
				->from("tb_usuario_permissao")
				->join("tb_modulo", "tb_modulo.cd_modulo = tb_usuario_permissao.cd_modulo","inner")
				->where("tb_usuario_permissao.cd_usuario", $usuario )
				->where("tb_usuario_permissao.ic_usu_perm", 1 );

			return $query->get()->result_array();
			
		}
		
		public function buscar_modulo( $usuario ) {

			$query = $this->db->select("tb_modulo.nm_modulo, tb_modulo.nm_resumido_modulo, tb_modulo.ds_modulo")
				->from("tb_modulo")
				->join("tb_usuario_permissao", "tb_usuario_permissao.cd_modulo = tb_modulo.cd_modulo","inner")
				->where("tb_usuario_permissao.cd_usuario", $usuario )
				->where("tb_usuario_permissao.ic_usu_perm", 1 )
				->where("tb_modulo.ic_modulo", 1 )
				->group_by('tb_modulo.nm_modulo')
				->order_by("tb_modulo.ds_posicao", "asc" );


			return $query->get()->result_array();
			
		}
		
		public function buscar_modulo_cadastrar( $usuario ) {

			$query = $this->db->select("tb_modulo.nm_modulo, tb_modulo.nm_resumido_modulo, tb_modulo.ds_modulo")
				->from("tb_modulo")
				->join("tb_usuario_permissao", "tb_usuario_permissao.cd_modulo = tb_modulo.cd_modulo","inner")
				->where("tb_usuario_permissao.cd_usuario", $usuario )
				->where("tb_usuario_permissao.ic_usu_perm", 1 )
				->where("tb_usuario_permissao.cd_permissao", 1 )
				->where("tb_modulo.ic_modulo", 1 )
				->group_by('tb_modulo.nm_modulo')
				->order_by("tb_modulo.ds_posicao", "asc" );


			return $query->get()->result_array();
			
		}

	// **********************************************	██╗   ██╗
	// **********************************************	██║   ██║
	// *********           Função           *********	██║   ██║
	// *********     editar -> UPDATE       *********	██║   ██║
	// **********************************************	╚██████╔╝
	// **********************************************	 ╚═════╝ 

		public function resetar_senha( $codigo, $senha ) {

			$this->db->where('cd_usuario', $codigo);
	    	$this->db->update('tb_usuario', array('ds_senha' => md5($senha), 'dt_modificacao' => date("d/m/Y H:i:s"), 'cd_modificado' => $codigo ));

	    	return $senha;

		}

	// **********************************************	██████╗  
	// **********************************************	██╔══██╗ 
	// *********           Função           *********	██║  ██║ 
	// *********    deletar -> DELETE       *********	██║  ██║ 
	// **********************************************	██████╔╝ 
	// **********************************************	╚═════╝  

	
	}
?>