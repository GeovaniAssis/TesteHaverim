<?php  	
	class MTabelas extends CI_Model{

	// **********************************************	 ██████╗ 
	// **********************************************	██╔════╝ 
	// *********           Função           *********	██║      
	// *********           CREATE           *********	██║      
	// **********************************************	╚██████╗ 
	// **********************************************	 ╚══════════╝

		public function cadastrar_tabela( $nome, $preco, $revenda, $mes, $ano, $cd_modificador ) {

			$informacoes = array(
				'nm_tabela' 		=> $nome ,
				'ic_precos' 		=> $preco ,
				'ic_revenda' 		=> $revenda ,
				'ds_mes' 			=> $mes ,
				'ds_ano' 			=> $ano ,
				'ic_ativo'			=> 1,
				'cd_modificado'		=> $cd_modificador,
				'cd_ip' 			=> $_SERVER['REMOTE_ADDR'],
				'dt_modificacao' 	=> date("d/m/Y H:i:s")
			);

			$this->db->insert('tb_tabelas',$informacoes);

			$query = $this->db->select("max(cd_tabela)")
				->from("tb_tabelas");

			return $query->get()->result_array();
		}

	// **********************************************    ██████╗
	// **********************************************    ██╔══██╗ 
	// *********           Função           *********    ██████╔╝ 
	// *********            READ            *********    ██╔══██╗ 
	// **********************************************    ██║  ██║ 
	// **********************************************    ╚═╝  ╚═╝ 

		public function buscar_tabelas( ) {
			$query = $this->db->select("*")
				->from("tb_tabelas")
				->where("ic_ativo", 1 );

			return $query->get()->result_array();			
		}

		public function buscar_tabela( $cd_tabela ) {
			$query = $this->db->select("*")
				->from("tb_tabelas")
				->where("ic_ativo", 1 )
				->where("cd_tabela", $cd_tabela );

			return $query->get()->result_array();			
		}

		public function verificar_data( $mes, $ano, $preco, $revenda ) {
			$query = $this->db->select("cd_tabela")
				->from("tb_tabelas")
				->where("ds_mes", $mes )
				->where("ds_ano", $ano )
				->where("ic_precos", $preco )
				->where("ic_ativo", 1 )
				->where("ic_revenda", $revenda );

			return $query->get()->result_array();			
		}

	// **********************************************	██╗    ██╗
	// **********************************************	██║    ██║
	// *********           Função           *********	██║    ██║
	// *********     editar -> UPDATE       *********	██║    ██║
	// **********************************************	╚██████╔╝
	// **********************************************	 ╚══════════╝ 

		public function editar_arquivo_tabela( $cd_tabela, $nome_completo ) {
			$informacoes = array(
				'ds_tabela' 		=> $nome_completo
			);

			$this->db->where('cd_tabela', $cd_tabela);
			$this->db->update('tb_tabelas', $informacoes);	
		}

		public function editar_tabela( $cd_tabela, $nome, $preco, $revenda, $mes, $ano, $cd_modificador ) {

			$informacoes = array(
				'nm_tabela' 		=> $nome ,
				'ic_precos' 		=> $preco ,
				'ic_revenda' 		=> $revenda ,
				'ds_mes' 			=> $mes ,
				'ds_ano' 			=> $ano ,
				'ic_ativo'			=> 1 ,
				'cd_modificado'		=> $cd_modificador ,
				'cd_ip' 			=> $_SERVER['REMOTE_ADDR'] ,
				'dt_modificacao' 	=> date("d/m/Y H:i:s")
			);

			$this->db->where('cd_tabela', $cd_tabela);
			$this->db->update('tb_tabelas', $informacoes);	
		}

	// **********************************************	██████╗  
	// **********************************************	██ ╔══██ ╗ 
	// *********           Função           *********	██║    ██║ 
	// *********    deletar -> DELETE       *********	██║   ██ ║ 
	// **********************************************	██████ ╔╝ 
	// **********************************************	╚═══════════╝  

		public function excluir_tabela( $cd_tabela, $cd_usuario ) {
			$informacoes = array( 'ic_ativo' => 0 );

			$this->db->where('cd_tabela', $cd_tabela);
			$this->db->update('tb_tabelas', $informacoes);	
		}

	}
?>