<?php  	
	class MEmpreendimentos extends CI_Model{

	// **********************************************	 ██████╗ 
	// **********************************************	██╔════╝ 
	// *********           Função           *********	██║      
	// *********           CREATE           *********	██║      
	// **********************************************	╚██████╗ 
	// **********************************************	 ╚═════╝ 

		public function cadastrar( $cd_modificador, $dados ) {

			$url = str_replace(" ", "_", $dados["nome_preview"] );
			
			if( !isset($dados['perto_praia']) || $dados['perto_praia'] != 'on' ){ $dados['perto_praia'] = "off"; }
			if( !isset($dados['revenda']) || $dados['revenda'] != 'on' ){ $dados['revenda'] = "off"; }
			
			if( !isset($dados['1_dorm']) || $dados['1_dorm'] != 'on' ){ $dados['1_dorm'] = "off"; }
			
			if( !isset($dados['2_dorm']) || $dados['2_dorm'] != 'on' ){ $dados['2_dorm'] = "off"; }
			
			if( !isset($dados['3_dorm']) || $dados['3_dorm'] != 'on' ){ $dados['3_dorm'] = "off"; }
			
			if( !isset($dados['4_dorm']) || $dados['4_dorm'] != 'on' ){ $dados['4_dorm'] = "off"; }
			
			if( !isset($dados['1_suite']) || $dados['1_suite'] != 'on' ){ $dados['1_suite'] = "off"; }
			
			if( !isset($dados['2_suite']) || $dados['2_suite'] != 'on' ){ $dados['2_suite'] = "off"; }
			
			if( !isset($dados['3_suite']) || $dados['3_suite'] != 'on' ){ $dados['3_suite'] = "off"; }
			
			if( !isset($dados['4_suite']) || $dados['4_suite'] != 'on' ){ $dados['4_suite'] = "off"; }
			
			if( !isset($dados['1_vaga']) || $dados['1_vaga'] != 'on' ){ $dados['1_vaga'] = "off"; }
			
			if( !isset($dados['2_vaga']) || $dados['2_vaga'] != 'on' ){ $dados['2_vaga'] = "off"; }
			
			if( !isset($dados['3_vaga']) || $dados['3_vaga'] != 'on' ){ $dados['3_vaga'] = "off"; }
			
			if( !isset($dados['4_vaga']) || $dados['4_vaga'] != 'on' ){ $dados['4_vaga'] = "off"; }

			if( $dados['1_dorm'] == 'off' && $dados['2_dorm'] == 'off' && $dados['3_dorm'] == 'off' && $dados['4_dorm'] == 'off' ){ $dados['1_dorm'] = 'on';}

			$informacoes = array(
				'nm_empreendimento' 		=> $dados['nome'] ,
				'nm_preview_empreendimento' => $dados['nome_preview'] ,
				'nm_url_empreendimento' 	=> $url ,
				'cd_posicao' 				=> $dados['posicao'] ,
				'ic_empreendimento' 		=> "1" ,
				'ic_suspenso'				=> $dados['estado'] ,
				'ds_situacao'				=> $dados['situacao'] ,
				'ds_cidade'					=> "Praia Grande" ,
				'ds_bairro'					=> $dados['bairro'] ,
				'dt_empreendimento'			=> $dados['dt_empreendimento'] ,
				'ic_varanda'				=> $dados['varanda'] ,
				'cd_cor'					=> $dados['txtCor'] ,
				'ic_1_dorm'					=> $dados['1_dorm'] ,
				'ic_2_dorm'					=> $dados['2_dorm'] ,
				'ic_3_dorm'					=> $dados['3_dorm'] ,
				'ic_4_dorm'					=> $dados['4_dorm'] ,
				'ic_1_suite'				=> $dados['1_suite'] ,
				'ic_2_suite'				=> $dados['2_suite'] ,
				'ic_3_suite'				=> $dados['3_suite'] ,
				'ic_4_suite'				=> $dados['4_suite'] ,
				'ic_1_vaga'					=> $dados['1_vaga'] ,
				'ic_2_vaga'					=> $dados['2_vaga'] ,
				'ic_3_vaga'					=> $dados['3_vaga'] ,
				'ic_4_vaga'					=> $dados['4_vaga'] ,
				'ds_metra_min'				=> $dados['met-min'] ,
				'ds_metra_max'				=> $dados['met-max'] ,
				'ds_area_lazer'				=> $dados['lazer'] ,
				'ds_empreendimento'			=> $dados['descricao'] ,
				'ds_fundacao'				=> $dados['fundacao'] ,
				'ds_estrutura'				=> $dados['estrutura'] ,
				'ds_entrega'				=> $dados['entrega'] ,
				'ds_interno'				=> $dados['interno'] ,
				'ds_externo'				=> $dados['externo'] ,
				'ds_alvenaria'				=> $dados['alvenaria'] ,
				'ds_piso'					=> $dados['piso'] ,
				'ds_instalacoes'			=> $dados['instalacoes'] ,
				'ds_pintura'				=> $dados['pintura'] ,
				'ds_video'					=> $dados['video'] ,
				'vl_empreendimento'			=> $dados['vl_empreendimento'] ,
				'ds_mar'					=> $dados['mar'] ,
				'ic_perto_praia'			=> $dados['perto_praia'] ,
				'ic_revenda'				=> $dados['revenda'] ,
				'dt_modificacao'			=> date("d/m/Y H:i:s"),
				'cd_modificado' 			=> $cd_modificador
			);
			$this->db->insert('tb_empreendimento', $informacoes);
			$cd_empreendimento =  $this->db->insert_id();


			$info_endereco = array(
				'cd_empreendimento' => $cd_empreendimento ,
				'ds_logradouro' 	=> $dados['logradouro'] ,
				'ds_endereco'		=> $dados['endereco'] ,
				'ds_numero'			=> $dados['numero'] ,
				'ds_bairro'			=> $dados['bairro']
			);
			if(isset($dados['academia'])){$info_endereco += array( 'ds_academia' => 'on' );}
			else{$info_endereco += array( 'ds_academia' => 'off' );}

			if(isset($dados['escola'])){$info_endereco += array( 'ds_escola' => 'on' );}
			else{$info_endereco += array( 'ds_escola' => 'off' );}

			if(isset($dados['padaria'])){$info_endereco += array( 'ds_padaria' => 'on' );}
			else{$info_endereco += array( 'ds_padaria' => 'off' );}

			if(isset($dados['shopping'])){$info_endereco += array( 'ds_shopping' => 'on' );}
			else{$info_endereco += array( 'ds_shopping' => 'off' );}

			if(isset($dados['banco'])){$info_endereco += array( 'ds_banco' => 'on' );}
			else{$info_endereco += array( 'ds_banco' => 'off' );}

			if(isset($dados['hospital'])){$info_endereco += array( 'ds_hospital' => 'on' );}
			else{$info_endereco += array( 'ds_hospital' => 'off' );}

			if(isset($dados['loja'])){$info_endereco += array( 'ds_loja' => 'on' );}
			else{$info_endereco += array( 'ds_loja' => 'off' );}

			$this->db->insert(' tb_empreendimento_endereco', $info_endereco);

			return $cd_empreendimento;		
		}

		public function cadastrar_capa( $cd_empreendimento, $nome_capa ) {	

			$informacoes = array( 'ds_capa' => $nome_capa );

			$this->db->where('cd_empreendimento', $cd_empreendimento);
			$this->db->update('tb_empreendimento', $informacoes);
		}

		public function cadastrar_thumb( $cd_empreendimento, $nome_thumb ) {	

			$informacoes = array( 'ds_thumb' => $nome_thumb );

			$this->db->where('cd_empreendimento', $cd_empreendimento);
			$this->db->update('tb_empreendimento', $informacoes);
		}

		public function cadastrar_logo( $cd_empreendimento, $nome_logo ) {	

			$informacoes = array( 'ds_logo' => $nome_logo );

			$this->db->where('cd_empreendimento', $cd_empreendimento);
			$this->db->update('tb_empreendimento', $informacoes);
		}

		public function cadastrar_destaque1( $cd_empreendimento, $nome_destaque1 ) {	

			$informacoes = array( 'im_empreendimento1' => $nome_destaque1 );

			$this->db->where('cd_empreendimento', $cd_empreendimento);
			$this->db->update('tb_empreendimento', $informacoes);
		}

		public function cadastrar_destaque2( $cd_empreendimento, $nome_destaque2 ) {	

			$informacoes = array( 'im_empreendimento2' => $nome_destaque2 );

			$this->db->where('cd_empreendimento', $cd_empreendimento);
			$this->db->update('tb_empreendimento', $informacoes);
		}

		public function cadastrar_destaque_princi( $cd_empreendimento, $nome_destaque_princi ) {	

			$informacoes = array( 'im_empreendimento_principal' => $nome_destaque_princi );

			$this->db->where('cd_empreendimento', $cd_empreendimento);
			$this->db->update('tb_empreendimento', $informacoes);
		}

		public function cadastrar_mapa( $cd_empreendimento, $nome_mapa ) {	

			$informacoes = array( 'im_mapa' => $nome_mapa );

			$this->db->where('cd_empreendimento', $cd_empreendimento);
			$this->db->update('tb_empreendimento_endereco', $informacoes);
		}

		public function novo_lazer( $cd_empreendimentos, $nome_completo_img, $nome_lazer, $descri_lazer, $posicao, $icone ) {	

			$informacoes = array(
				'cd_empreendimento' => $cd_empreendimentos ,
				'nm_lazer' 			=> $nome_lazer ,
				'ds_lazer' 			=> $descri_lazer ,
				'im_lazer' 			=> $nome_completo_img ,
				'ds_posicao' 		=> $posicao,
				'im_icon'			=> $icone
			);

			$this->db->insert('tb_empreendimento_lazer', $informacoes);
			return $this->db->insert_id();
		}

		public function nova_planta( $cd_empreendimento, $nome_completo_img, $nome_planta, $metragem, $posicao ) {	

			$informacoes = array(
				'cd_empreendimento' 	=> $cd_empreendimento ,
				'nm_planta' 			=> $nome_planta ,
				'ds_metragem' 			=> $metragem ,
				'im_planta' 			=> $nome_completo_img ,
				'ds_posicao' 			=> $posicao
			);

			$this->db->insert('tb_empreendimento_planta', $informacoes);
			return $this->db->insert_id();
		}

		public function nova_obra( $cd_empreendimento, $nome_obra, $data, $posicao, $nome_img, $nome_img_thumb ) {

			$informacoes = array(
				'cd_empreendimento'	=> $cd_empreendimento ,
				'nm_obra' 			=> $nome_obra ,
				'im_obra' 			=> $nome_img ,
				'im_obra_thumb'		=> $nome_img_thumb ,
				'dt_obra' 			=> $data ,
				'ds_posicao' 		=> $posicao
			);

			$this->db->insert('tb_empreendimento_obra', $informacoes);
			return $this->db->insert_id();
		}

	// **********************************************    ██████╗
	// **********************************************    ██╔══██╗ 
	// *********           Função           *********    ██████╔╝ 
	// *********            READ            *********    ██╔══██╗ 
	// **********************************************    ██║  ██║ 
	// **********************************************    ╚═╝  ╚═╝ 

		public function buscar_empreendimentos() {
			$query = $this->db->select("*")
				->from("tb_empreendimento")
				->where("ic_empreendimento", 1 )
				->order_by('nm_empreendimento', 'asc');

			return $query->get()->result_array();			
		}

		public function buscar_empreendimentos_editar( $cd_empreendimento ) {
			$query = $this->db->select("*")
				->from("tb_empreendimento")
				->where("cd_empreendimento", $cd_empreendimento );

			return $query->get()->result_array();			
		}

		public function pesquisar_empreendimentos( $dados ) {

			$query = $this->db->select("*")
				->from("tb_empreendimento")
				->where("ic_empreendimento", 1 )
				->order_by('nm_empreendimento', 'asc');

			if ( array_key_exists('nome' , $dados ) ) {
				if (strlen($dados['nome'])){ 
					$query->like('nm_empreendimento', $dados['nome']);
				}
			}

			return $query->get()->result_array();			
		}

		public function buscar_cores( ) {

			$query = $this->db->select("*")
				->from("tb_colors")
				->order_by('ds_posicao', 'asc');

			return $query->get()->result_array();			
		}

		public function buscar_lazers( $cd_empreendimento ) {

			$query = $this->db->select("*")
				->from("tb_empreendimento_lazer")
				->where("cd_empreendimento", $cd_empreendimento )
				->order_by('ds_posicao', 'asc');

			return $query->get()->result_array();			
		}

		public function buscar_plantas( $cd_empreendimento ) {

			$query = $this->db->select("*")
				->from("tb_empreendimento_planta")
				->where("cd_empreendimento", $cd_empreendimento )
				->order_by('ds_posicao', 'asc');

			return $query->get()->result_array();			
		}

		public function buscar_endereco( $cd_empreendimento ) {

			$query = $this->db->select("*")
				->from("tb_empreendimento_endereco")
				->where("cd_empreendimento", $cd_empreendimento );

			return $query->get()->result_array();			
		}

		public function buscar_obra( $cd_empreendimento ) {

			$query = $this->db->select("*")
				->from("tb_empreendimento_obra")
				->where("cd_empreendimento", $cd_empreendimento )
				->order_by('ds_posicao', 'ASC');

			return $query->get()->result_array();			
		}
		
	// **********************************************	██╗   ██╗
	// **********************************************	██║   ██║
	// *********           Função           *********	██║   ██║
	// *********     editar -> UPDATE       *********	██║   ██║
	// **********************************************	╚██████╔╝
	// **********************************************	 ╚═════╝ 

		public function editar_empreendimentos_informacao( $dados, $cd_empreendimento, $cd_modificador ) {
			$url = str_replace(" ", "_", $dados['nome_preview']);

			if( !isset($dados['perto_praia']) || $dados['perto_praia'] != 'on' ){ $dados['perto_praia'] = "off"; }
			if( !isset($dados['revenda']) || $dados['revenda'] != 'on' ){ $dados['revenda'] = "off"; }
			
			if( !isset($dados['1_dorm']) || $dados['1_dorm'] != 'on' ){ $dados['1_dorm'] = "off"; }
			
			if( !isset($dados['2_dorm']) || $dados['2_dorm'] != 'on' ){ $dados['2_dorm'] = "off"; }
			
			if( !isset($dados['3_dorm']) || $dados['3_dorm'] != 'on' ){ $dados['3_dorm'] = "off"; }
			
			if( !isset($dados['4_dorm']) || $dados['4_dorm'] != 'on' ){ $dados['4_dorm'] = "off"; }
			
			if( !isset($dados['1_suite']) || $dados['1_suite'] != 'on' ){ $dados['1_suite'] = "off"; }
			
			if( !isset($dados['2_suite']) || $dados['2_suite'] != 'on' ){ $dados['2_suite'] = "off"; }
			
			if( !isset($dados['3_suite']) || $dados['3_suite'] != 'on' ){ $dados['3_suite'] = "off"; }
			
			if( !isset($dados['4_suite']) || $dados['4_suite'] != 'on' ){ $dados['4_suite'] = "off"; }
			
			if( !isset($dados['1_vaga']) || $dados['1_vaga'] != 'on' ){ $dados['1_vaga'] = "off"; }
			
			if( !isset($dados['2_vaga']) || $dados['2_vaga'] != 'on' ){ $dados['2_vaga'] = "off"; }
			
			if( !isset($dados['3_vaga']) || $dados['3_vaga'] != 'on' ){ $dados['3_vaga'] = "off"; }
			
			if( !isset($dados['4_vaga']) || $dados['4_vaga'] != 'on' ){ $dados['4_vaga'] = "off"; }

			if( $dados['1_dorm'] == 'off' && $dados['2_dorm'] == 'off' && $dados['3_dorm'] == 'off' && $dados['4_dorm'] == 'off' ){ $dados['1_dorm'] = 'on';}

			// Alterar Informações
			$informacoes = array(
				'nm_empreendimento' 		=> $dados['nome'] ,
				'nm_preview_empreendimento' => $dados['nome_preview'] ,
				'nm_url_empreendimento' 	=> $url ,
				'cd_posicao' 				=> $dados['posicao'] ,
				'ic_empreendimento' 		=> "1" ,
				'ic_suspenso'				=> $dados['estado'] ,
				'ds_situacao'				=> $dados['situacao'] ,
				'ds_cidade'					=> "Praia Grande" ,
				'ds_bairro'					=> $dados['bairro'] ,
				'dt_empreendimento'			=> $dados['dt_empreendimento'] ,
				'ic_varanda'				=> $dados['varanda'] ,
				'cd_cor'					=> $dados['txtCor'] ,
				'ic_1_dorm'					=> $dados['1_dorm'] ,
				'ic_2_dorm'					=> $dados['2_dorm'] ,
				'ic_3_dorm'					=> $dados['3_dorm'] ,
				'ic_4_dorm'					=> $dados['4_dorm'] ,
				'ic_1_suite'				=> $dados['1_suite'] ,
				'ic_2_suite'				=> $dados['2_suite'] ,
				'ic_3_suite'				=> $dados['3_suite'] ,
				'ic_4_suite'				=> $dados['4_suite'] ,
				'ic_1_vaga'					=> $dados['1_vaga'] ,
				'ic_2_vaga'					=> $dados['2_vaga'] ,
				'ic_3_vaga'					=> $dados['3_vaga'] ,
				'ic_4_vaga'					=> $dados['4_vaga'] ,
				'ds_metra_min'				=> $dados['met_min'] ,
				'ds_metra_max'				=> $dados['met_max'] ,
				'ds_area_lazer'				=> $dados['lazer'] ,
				'ds_empreendimento'			=> $dados['descricao'] ,
				'ds_fundacao'				=> $dados['fundacao'] ,
				'ds_estrutura'				=> $dados['estrutura'] ,
				'ds_entrega'				=> $dados['entrega'] ,
				'ds_interno'				=> $dados['interno'] ,
				'ds_externo'				=> $dados['externo'] ,
				'ds_alvenaria'				=> $dados['alvenaria'] ,
				'ds_piso'					=> $dados['piso'] ,
				'ds_instalacoes'			=> $dados['instalacoes'] ,
				'ds_pintura'				=> $dados['pintura'] ,
				'ds_video'					=> $dados['video'] ,
				'vl_empreendimento'			=> $dados['vl_empreendimento'] ,
				'ds_mar'					=> $dados['mar'] ,
				'ic_perto_praia'			=> $dados['perto_praia'] ,
				'ic_revenda'				=> $dados['revenda'] ,
				'dt_modificacao'			=> date("d/m/Y H:i:s"),
				'cd_modificado' 			=> $cd_modificador
			);
			// Executar alteração no Banco
			$this->db->where('cd_empreendimento', $cd_empreendimento);
			$this->db->update('tb_empreendimento', $informacoes);

			if( !isset($dados["academia"]) || $dados["academia"] 	!= 'on'){$dados["academia"] = 'off';}
			if( !isset($dados["escola"]) || $dados["escola"] 	!= 'on'){$dados["escola"]   = 'off';}
			if( !isset($dados["padaria"]) || $dados["padaria"] 	!= 'on'){$dados["padaria"]  = 'off';}
			if( !isset($dados["shopping"]) || $dados["shopping"] != 'on'){$dados["shopping"] = 'off';}
			if( !isset($dados["banco"]) || $dados["banco"] 		!= 'on'){$dados["banco"]    = 'off';}
			if( !isset($dados["hospital"]) || $dados["hospital"] 	!= 'on'){$dados["hospital"] = 'off';}
			if( !isset($dados["loja"]) || $dados["loja"] 		!= 'on'){$dados["loja"]     = 'off';}

			$inf_endereco = array(
				'ds_logradouro'	=> $dados['logradouro'] ,
				'ds_endereco'	=> $dados['endereco'] ,
				'ds_numero'		=> $dados['numero'] ,
				'ds_bairro' 	=> $dados["bairro"] ,
				'ds_academia' 	=> $dados["academia"] ,
				'ds_escola' 	=> $dados["escola"] ,
				'ds_padaria' 	=> $dados["padaria"] ,
				'ds_shopping' 	=> $dados["shopping"] ,
				'ds_banco' 		=> $dados["banco"] ,
				'ds_hospital' 	=> $dados["hospital"] ,
				'ds_loja' 		=> $dados["loja"]			
			);
			$this->db->where('cd_empreendimento', $cd_empreendimento);
			$this->db->update('tb_empreendimento_endereco', $inf_endereco);
		}
		public function editar_empreendimento_img( $cd_empreendimento, $nome_img, $onde ) {
			if($onde == "logo"){ $informacoes = array( 'ds_logo' => $nome_img ); }
			if($onde == "capa"){ $informacoes = array( 'ds_capa' => $nome_img ); }
			if($onde == "thumb"){ $informacoes = array( 'ds_thumb' => $nome_img ); }
			if($onde == "destaque1"){ $informacoes = array( 'im_empreendimento1' => $nome_img ); }
			if($onde == "destaque2"){ $informacoes = array( 'im_empreendimento2' => $nome_img ); }
			if($onde == "destaqueprincipal"){ $informacoes = array( 'im_empreendimento_principal' => $nome_img ); }

			$this->db->where('cd_empreendimento', $cd_empreendimento);
			$this->db->update('tb_empreendimento', $informacoes);	
		}
		public function editar_bloco_lazer( $dados ) {

			$informacoes = array(
				'nm_lazer' 		=> $dados["nm_lazer"] ,
				'ds_lazer' 		=> $dados["ds_lazer"] ,
				'im_icon' 		=> $dados["im_icon"] ,
				'ds_posicao' 	=> $dados["ds_posicao"]
			);

			$this->db->where('cd_lazer', $dados["cd_lazer"]);
			$this->db->update('tb_empreendimento_lazer', $informacoes);	
		}
		public function editar_bloco_lazer_img( $codigo, $nome_completo ) {
			$informacoes = array(
				'im_lazer' 		=> $nome_completo
			);
			$this->db->where('cd_lazer', $codigo);
			$this->db->update('tb_empreendimento_lazer', $informacoes);	
		}
		public function editar_bloco_obra( $dados ) {
			$informacoes = array(
				'nm_obra' 		=> $dados["nm_obra"] ,
				'dt_obra'		=> $dados["dt_obra"] ,
				'ds_posicao' 	=> $dados["ds_posicao"]
			);
			$this->db->where('cd_empreendimento_obra', $dados["cd_empreendimento_obra"]);
			$this->db->update('tb_empreendimento_obra', $informacoes);
		}
		public function editar_bloco_obra_img( $codigo, $nome_completo, $nome_completo_thumb ) {
			$informacoes = array(
				'im_obra'	=> $nome_completo,
				'im_obra_thumb'	=> $nome_completo_thumb
			);
			$this->db->where('cd_empreendimento_obra', $codigo);
			$this->db->update('tb_empreendimento_obra', $informacoes);
		}
		public function editar_bloco_planta( $dados ) {
			$informacoes = array(
				'nm_planta' 		=> $dados["nm_planta"] ,
				'ds_metragem' 		=> $dados["ds_metragem"] ,
				'ds_posicao' 		=> $dados["ds_posicao"]
			);
			$this->db->where('cd_empreendimento_planta', $dados["cd_empreendimento_planta"]);
			$this->db->update('tb_empreendimento_planta', $informacoes);	
		}
		public function editar_bloco_planta_img( $codigo, $nome_completo ) {
			$informacoes = array(
				'im_planta'	=> $nome_completo
			);
			$this->db->where('cd_empreendimento_planta', $codigo);
			$this->db->update('tb_empreendimento_planta', $informacoes);
		}
		public function editar_bloco_endereco_img( $codigo, $nome_completo ) {
			$informacoes = array(
				'im_mapa'	=> $nome_completo
			);
			$this->db->where('cd_empreendimento', $codigo);
			$this->db->update('tb_empreendimento_endereco', $informacoes);
		}

	// **********************************************	██████╗  
	// **********************************************	██╔══██╗ 
	// *********           Função           *********	██║  ██║ 
	// *********    deletar -> DELETE       *********	██║  ██║ 
	// **********************************************	██████╔╝ 
	// **********************************************	╚═════╝  

		public function excluir_empreendimentos( $cd_empreendimento , $cd_modificador ) {
			
			$informacoes = array(
				'ic_empreendimento' => '0',
				'dt_modificacao'	=> date("d/m/Y H:i:s"),
				'cd_modificado' 	=> $cd_modificador				
			);

			$this->db->where('cd_empreendimento', $cd_empreendimento);
			$this->db->update('tb_empreendimento', $informacoes);
		}

		public function excluirlazer( $cd_empreendimentos , $dados ) {
			$this->db->where('cd_empreendimento', $cd_empreendimentos);
			$this->db->where('cd_lazer', $dados['codigo']);
			$this->db->delete('tb_empreendimento_lazer');
		}

		public function excluirplanta( $cd_empreendimentos , $dados ) {
			$this->db->where('cd_empreendimento', $cd_empreendimentos);
			$this->db->where('cd_empreendimento_planta', $dados['codigo']);
			$this->db->delete('tb_empreendimento_planta');
		}

		public function excluirobra( $cd_empreendimentos , $dados ) {
			$this->db->where('cd_empreendimento', $cd_empreendimentos);
			$this->db->where('cd_empreendimento_obra', $dados['codigo']);
			$this->db->delete('tb_empreendimento_obra');
		}


	}
?>