<?php  	
	class MCorretores extends CI_Model{

	// **********************************************	 ██████╗ 
	// **********************************************	██╔════╝ 
	// *********           Função           *********	██║      
	// *********           CREATE           *********	██║      
	// **********************************************	╚██████╗ 
	// **********************************************	 ╚══════════╝

	// **********************************************    ██████╗
	// **********************************************    ██╔══██╗ 
	// *********           Função           *********    ██████╔╝ 
	// *********            READ            *********    ██╔══██╗ 
	// **********************************************    ██║  ██║ 
	// **********************************************    ╚═══╝  ╚═══╝ 

		public function buscar_corretores( $limit, $offset ) {
			$query = $this->db->select("cd_user_tabela, nm_responsavel, nm_imobiliaria, nm_email")
				->from("tb_user_tabela")
				->where("ic_inativo", 0 )
				->limit($limit,$offset)
				->order_by("cd_user_tabela","DESC");

			return $query->get()->result_array();			
		}

		public function pesquisar_corretores( $dados ) {

			$query = $this->db->select("cd_user_tabela, nm_responsavel, nm_imobiliaria, nm_email")
				->from("tb_user_tabela")
				->where("ic_inativo", 0 )
				->order_by("cd_user_tabela","DESC");

			if ( array_key_exists('nome' , $dados ) ) {
				if (strlen($dados['nome'])){ 
					$query->like('nm_responsavel', $dados['nome']);
				}
			}
			if ( array_key_exists('email' , $dados ) ){
				if (strlen($dados['email'])){
					$query->like('nm_email', $dados['email']);
				}
			}

			return $query->get()->result_array();			
		}

		public function buscar_corretor( $cd_user_tabela ) {
			$query = $this->db->select("*")
				->from("tb_user_tabela")
				->where("cd_user_tabela", $cd_user_tabela );

			return $query->get()->result_array();			
		}

		public function verificar_email( $email ) {
			$query = $this->db->select("cd_user_tabela")
				->from("tb_user_tabela")
				->where("nm_email", $email )
				->where("ic_inativo", 0 );

			return $query->get()->result_array();			
		}

		public function paginacao(){
	
			$query = $this->db->select('COUNT(*) as count', FALSE)
				->from("tb_user_tabela")
				->where("ic_inativo", 0 );
						
			$tmp = $query->get()->result_array();
			
			return $tmp[0]['count'];
		}

	// **********************************************	██╗    ██╗
	// **********************************************	██║    ██║
	// *********           Função           *********	██║    ██║
	// *********     editar -> UPDATE       *********	██║    ██║
	// **********************************************	╚██████╔╝
	// **********************************************	 ╚══════════╝ 

		public function editar_corretor( $dados, $cd_user_tabela, $cd_usuario ) {
			// Alterar Informações
			$informacoes = array(
				'ds_creci' 			=> $dados['creci'] ,
				'nm_imobiliaria' 	=> $dados['imobiliaria'] ,
				'ds_telefone' 		=> $dados['telefone'] ,
				'ds_cnpj' 			=> $dados['cnpj'] ,
				'nm_responsavel'	=> $dados['responsavel'] ,
				'nm_endereco' 		=> $dados['endereco'] ,
				'nm_numero' 		=> $dados['numero'] ,
				'nm_bairro' 		=> $dados['bairro'] ,
				'nm_cidade' 		=> $dados['cidade'] ,
				'nm_estado' 		=> $dados['estado'] ,
				'nm_email' 			=> $dados['email']
			);
			// Executar alteração no Banco
			$this->db->where('cd_user_tabela', $cd_user_tabela);
			$this->db->update('tb_user_tabela', $informacoes);	
		}

	// **********************************************	██████╗  
	// **********************************************	██ ╔══██ ╗ 
	// *********           Função           *********	██║    ██║ 
	// *********    deletar -> DELETE       *********	██║   ██ ║ 
	// **********************************************	██████ ╔╝ 
	// **********************************************	╚═══════════╝ 

		public function excluir_corretor( $cd_user_tabela ) {
			$informacoes = array( 'ic_inativo' => 1 );

			$this->db->where('cd_user_tabela', $cd_user_tabela);
			$this->db->update('tb_user_tabela', $informacoes);	
		} 

	}
?>