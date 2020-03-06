<?php  	
	class MBanner extends CI_Model{

	// **********************************************	 ██████╗ 
	// **********************************************	██╔════╝ 
	// *********           Função           *********	██║      
	// *********           CREATE           *********	██║      
	// **********************************************	╚██████╗ 
	// **********************************************	 ╚═════╝ 

		public function cadastrar_banner( $dados, $cd_modificador ) {
			// Alterar Informações
			$informacoes = array(
				'nm_banner' 			=> $dados['nome'] ,
				'ic_banner' 			=> 1 ,
				'ic_suspenso' 			=> $dados['estado'] ,
				'ds_posicao' 			=> $dados["posicao"] ,
				'dt_inicio' 			=> $dados["dtinicio"] ,
				'dt_final' 				=> $dados["dtfinal"] ,
				'ds_link' 				=> $dados["link"] ,
				'ds_caminho_desktop'	=> "0" ,
				'ds_caminho_tablet1'	=> "0" ,
				'ds_caminho_tablet2'	=> "0" ,
				'ds_caminho_mobile'		=> "0" ,
				'dt_modificacao'		=> date("d/m/Y H:i:s"),
				'cd_modificado' 		=> $cd_modificador
			);
			$this->db->insert('tb_banner', $informacoes);
			return $this->db->insert_id();
		}

		public function cadastrar_banner_img( $cd_banner, $nome_banner, $onde ) {			
			if($onde == "desktop"){ $informacoes = array( 'ds_caminho_desktop' => $nome_banner ); }
			if($onde == "tablet1"){ $informacoes = array( 'ds_caminho_tablet1' => $nome_banner ); }
			if($onde == "tablet2"){ $informacoes = array( 'ds_caminho_tablet2' => $nome_banner ); }
			if($onde == "mobile" ){ $informacoes = array( 'ds_caminho_mobile' => $nome_banner ); }
			$this->db->where('cd_banner', $cd_banner);
			$this->db->update('tb_banner', $informacoes);	
		}

	// **********************************************    ██████╗
	// **********************************************    ██╔══██╗ 
	// *********           Função           *********    ██████╔╝ 
	// *********            READ            *********    ██╔══██╗ 
	// **********************************************    ██║  ██║ 
	// **********************************************    ╚═╝  ╚═╝ 

		public function buscar_banner() {
			$query = $this->db->select("*")
				->from("tb_banner")
				->where("ic_banner", 1 )
				->order_by('ds_posicao', 'asc');

			return $query->get()->result_array();			
		}

		public function pesquisar_banner( $dados ) {

			$query = $this->db->select("*")
				->from("tb_banner")
				->where("ic_banner", 1 )
				->order_by('ds_posicao', 'asc');

			if ( array_key_exists('nome' , $dados ) ) {
				if (strlen($dados['nome'])){ 
					$query->like('nm_banner', $dados['nome']);
				}
			}

			return $query->get()->result_array();			
		}

		public function buscar_banner_editar( $cd_banner ) {
			$query = $this->db->select("*")
				->from("tb_banner")
				->where("cd_banner", $cd_banner );

			return $query->get()->result_array();			
		}

	// **********************************************	██╗   ██╗
	// **********************************************	██║   ██║
	// *********           Função           *********	██║   ██║
	// *********     editar -> UPDATE       *********	██║   ██║
	// **********************************************	╚██████╔╝
	// **********************************************	 ╚═════╝ 

		public function editar_banner_informacao( $dados, $cd_banner, $cd_modificador ) {
			// Alterar Informações
			$informacoes = array(
				'nm_banner' 		=> $dados['nome'] ,
				'ic_suspenso' 		=> $dados['estado'] ,
				'ds_posicao' 		=> $dados["posicao"] ,
				'dt_inicio' 		=> $dados["dtinicio"] ,
				'dt_final' 			=> $dados["dtfinal"] ,
				'ds_link' 			=> $dados["link"] ,
				'dt_modificacao'	=> date("d/m/Y H:i:s"),
				'cd_modificado' 	=> $cd_modificador
			);

			// Executar alteração no Banco
			$this->db->where('cd_banner', $cd_banner);
			$this->db->update('tb_banner', $informacoes);	
		}

		public function editar_banner_img( $cd_banner, $nome_banner, $onde ) {			
			if($onde == "desktop"){ $informacoes = array( 'ds_caminho_desktop' => $nome_banner ); }
			if($onde == "tablet1"){ $informacoes = array( 'ds_caminho_tablet1' => $nome_banner ); }
			if($onde == "tablet2"){ $informacoes = array( 'ds_caminho_tablet2' => $nome_banner ); }
			if($onde == "mobile" ){ $informacoes = array( 'ds_caminho_mobile' => $nome_banner ); }
			$this->db->where('cd_banner', $cd_banner);
			$this->db->update('tb_banner', $informacoes);	
		}

	// **********************************************	██████╗  
	// **********************************************	██╔══██╗ 
	// *********           Função           *********	██║  ██║ 
	// *********    deletar -> DELETE       *********	██║  ██║ 
	// **********************************************	██████╔╝ 
	// **********************************************	╚═════╝  

		public function excluir_banner( $cd_banner , $cd_modificador ) {
			
			$informacoes = array(
				'ic_banner' 		=> '0',
				'dt_modificacao'	=> date("d/m/Y H:i:s"),
				'cd_modificado' 	=> $cd_modificador				
			);

			$this->db->where('cd_banner', $cd_banner);
			$this->db->update('tb_banner', $informacoes);

		}

	}
?>