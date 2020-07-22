<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Corretores extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('MVerificarPermissao');
		$this->load->model('MCorretores');
		$this->load->library('Excel');
	}

	public function index( $offset = 0 ) {
		$dados['titulo'] 	= 'Corretores';

		$perm = 0;
		$cd_usuario = $this->session->userdata("codigo");
		$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Corretores", "Consultar" );

		if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){
			$dados['pagina'] = 'sistema/corretores/consultar.php';

			$limit = 20;

			$data['query_id']		  = $query_id;
			$dados['corretores'] 	= $this->MCorretores->buscar_corretores( $limit, $offset );

			$config['base_url']       = site_url("corretores/pag/");
			$config['total_rows']     = $this->MCorretores->paginacao();
			$config['per_page']       = $limit;
			$config['num_links']      = 4;
			$config['uri_segment']    = 3;
			$config['full_tag_open']  = "<div class='pagination'>";
			$config['full_tag_close'] = '</div > ';

			$config['first_link']     = 'Primeira Página';
			$config['last_link']      = 'Ultima Página';

			$this->pagination->initialize($config);

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
	// **********************************************	 ╚══════════╝ 

		public function exportar( ){

			$this->excel->setActiveSheetIndex(0);

			$this->excel->getActiveSheet()->setTitle('tb_user_tabela');

			$this->excel->getActiveSheet()->setCellValue('A1', 'Corretor');
		    $this->excel->getActiveSheet()->setCellValue('B1', 'Email');
		    $this->excel->getActiveSheet()->setCellValue('C1', 'Telefone');
		    $this->excel->getActiveSheet()->setCellValue('D1', 'Imobiliária');
		    $this->excel->getActiveSheet()->setCellValue('E1', 'CRECI');
		    $this->excel->getActiveSheet()->setCellValue('F1', 'Último Acesso');

			$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    		$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
			$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
		    $this->excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(16);
			$this->excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
		    $this->excel->getActiveSheet()->getStyle('C1')->getFont()->setSize(16);
			$this->excel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
		    $this->excel->getActiveSheet()->getStyle('D1')->getFont()->setSize(16);
			$this->excel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
		    $this->excel->getActiveSheet()->getStyle('E1')->getFont()->setSize(16);
			$this->excel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
		    $this->excel->getActiveSheet()->getStyle('F1')->getFont()->setSize(16);

			for($col = ord('A'); $col <= ord('C'); $col++){
                $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        	}

        	$data2 = $this->db->query('SELECT nm_responsavel, nm_email, ds_telefone, nm_imobiliaria, ds_creci, MAX(date_primeiro_login) FROM tb_user_tabela INNER JOIN  ci_sessions_imobiliaria ON tb_user_tabela.cd_user_tabela = ci_sessions_imobiliaria.mod_imobiliaria GROUP BY ds_creci ORDER BY date_primeiro_login ASC');

        	$rs = $data2;
    		$exceldata = array( );

    		foreach ($rs->result_array() as $row){
			    $exceldata[] = $row;
			}

			$this->excel->getActiveSheet()->fromArray($exceldata, null, 'A2');
     
		    $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		    $this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		    $this->excel->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		    $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A2');
		     
		    $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		    $this->excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		    $this->excel->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		     
		    $filename='Corretores-'.date("Y-m-d-G").'h'.date('i').'m'.date('s').'s.xls'; 
		    header('Content-Type: application/vnd.ms-excel');
		    header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		    header('Cache-Control: max-age=0');

		    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		    $objWriter->save('php://output');
		}

	// **********************************************    ██████╗
	// **********************************************    ██╔════██╗ 
	// *********           Função           *********    ██████╔╝ 
	// *********            READ            *********    ██╔══██╗ 
	// **********************************************    ██║  ██║ 
	// **********************************************    ╚═══╝  ╚═══╝

		public function pag( $offset = 0 ) {
			$dados['titulo'] 	= 'Corretores';

			$perm = 0;
			$cd_usuario = $this->session->userdata("codigo");
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Corretores", "Consultar" );

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){
				$dados['pagina'] = 'sistema/corretores/consultar.php';

				$limit = 20;

				$data['query_id']		  = $query_id;
				$dados['corretores'] 	= $this->MCorretores->buscar_corretores( $limit, $offset );

				$config['base_url']       = site_url("corretores/pag/");
				$config['total_rows']     = $this->MCorretores->paginacao();
				$config['per_page']       = $limit;
				$config['num_links']      = 4;
				$config['uri_segment']    = 3;
				$config['full_tag_open']  = "<div class='pagination'>";
				$config['full_tag_close'] = '</div > ';

				$config['first_link']     = 'Primeira Página';
				$config['last_link']      = 'Ultima Página';

				$this->pagination->initialize($config);

			}else{
				$dados['pagina'] = 'acesso-negado.php';
			}

			$this->load->view('base', $dados);
		}

		public function pesquisa( ) {
			$dados['titulo'] 	= 'Corretores';

			$perm = 0;
			$cd_usuario = $this->session->userdata("codigo");
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Corretores", "Consultar" );

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){
				$dados['pagina'] = 'sistema/corretores/pesquisar.php';

				if( $this->input->post("nome") == "" && $this->input->post("email") == "" ){ redirect('corretores'); }

				$dados['corretores'] = $this->MCorretores->pesquisar_corretores( $this->input->post() );

			}else{
				$dados['pagina'] = 'acesso-negado.php';
			}

			$this->load->view('base', $dados);
		}

	// **********************************************	██╗   ██╗
	// **********************************************	██║   ██║
	// *********           Função           *********	██║   ██║
	// *********     editar -> UPDATE       *********	██║   ██║
	// **********************************************	╚██████╔╝
	// **********************************************	 ╚══════════╝ 

		public function editar( $cd_user_tabela = 0 ) {

			if( $cd_user_tabela == 0 ){ redirect('corretores'); }
			$dados['titulo'] = 'Corretores - Editar';

			$this->load->helper('url');
			$this->form_validation->set_rules('imobiliaria', 'Imobiliária', 'trim|required');
			$this->form_validation->set_rules('responsavel', 'Responsável',	'trim|required');
			$this->form_validation->set_rules('cnpj',		 'CNPJ',		'trim|required');
			$this->form_validation->set_rules('creci',		 'CRECI',		'trim|required');
			$this->form_validation->set_rules('email',		 'E-mail',		'trim|required');
			$this->form_validation->set_rules('telefone',	 'Telefone',	'trim|required');
			$this->form_validation->set_rules('endereco',	 'Endereço',	'trim|required');
			$this->form_validation->set_rules('numero',		 'Número',		'trim|required');
			$this->form_validation->set_rules('bairro',		 'Bairro',		'trim|required');
			$this->form_validation->set_rules('cidade',		 'Cidade',		'trim|required');
			$this->form_validation->set_rules('estado',		 'Estado',		'trim|required');

			$cd_usuario = $this->session->userdata("codigo");
			$perm = 0;		
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Corretores", "Editar" );


			if( $this->form_validation->run() == FALSE ){

				if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){
					$dados['pagina'] = 'sistema/corretores/editar.php';

					$dados['corretore'] = $this->MCorretores->buscar_corretor( $cd_user_tabela );
					if( !$dados['corretore'] ){ redirect('corretores'); }

				}else{
					$dados['pagina'] = 'acesso-negado.php';
				}

				$this->load->view('base', $dados);

			}else{

				$velidar_email = $this->MCorretores->verificar_email( $this->input->post("email") );

				if( $velidar_email[0]['cd_user_tabela'] != $cd_user_tabela ){
					$this->session->set_flashdata('erro', "Desculpe, este e-mail já esta sendo usado por outro corretor.");
					$pagina = 'corretores/editar/'.$cd_user_tabela.'/';
					redirect( $pagina );
				}else{
					$this->MCorretores->editar_corretor( $this->input->post(), $cd_user_tabela, $cd_usuario );

					$this->session->set_flashdata('sucesso','Corretor editado com sucesso.');
					$pagina = 'corretores/editar/'.$cd_user_tabela.'/';
					redirect( $pagina );
				}
			}
		}

	// **********************************************	██████╗  
	// **********************************************	██╔════██╗ 
	// *********           Função           *********	██║    ██║ 
	// *********    deletar -> DELETE       *********	██║    ██║ 
	// **********************************************	██████ ╔╝ 
	// **********************************************	╚═══════════╝  
		
		public function excluir( $cd_user_tabela = 0 ) {

			if( $cd_user_tabela == 0 ){ redirect('corretores'); }

			$perm = 0;
			$cd_usuario = $this->session->userdata("codigo");
			$perm = $this->MVerificarPermissao->validar_permissao( $cd_usuario, "Corretores", "Excluir" );

			if( $perm["ic_usu_perm"] == 1 || $perm["ic_usu_perm"] == "1"){

				$this->MCorretores->excluir_corretor( $cd_user_tabela );

				$this->session->set_flashdata('sucesso','Corretor excluido com sucesso');
				redirect('corretores', 'refresh' );
			}else{
				$this->session->set_flashdata('suspenso','Você não possui permissão para excluir corretores.');
				redirect('corretores', 'refresh' );
			}
		}
}