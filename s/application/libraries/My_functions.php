<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_functions {
	
	function generate_pwd($intQtdCaracter = 10){
		$token = "";            
	    for($x=0;$x<($intQtdCaracter+1);$x++){
	       $numAleatorio = rand(0,2);
	       if($numAleatorio == 1){
	        $token .= chr(rand(65,90));
	       }
	       elseif($numAleatorio == 2){
	        $token .= chr(rand(97,122));
	       }
	       else{
	       $token .= rand(0,10);
	        }
	       }
	    return $token;
	}

	function remove_accent($str){
	  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ' , 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ' , 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ' , 'ĳ' , 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ' , 'œ' , 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ' , 'ǽ' , 'Ǿ', 'ǿ');
	  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
	 
	  return str_replace($a, $b, $str);
	}
	 
	function sanitize($z){	   
	   return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),
	  array('', '-', ''), remove_accent($z)));
	}

	function limpa_str($str){
	    $c = array('Ç', 'ç');
	    $a = array('Á', 'À', 'Ä', 'Â', 'Ã', 'á', 'à', 'ä', 'â', 'â', 'ã');
	    $e = array('Ë', 'É', 'Ê', 'ë', 'é', 'ê' , '&');
	    $i = array('Ï', 'Í', 'ï', 'í');
	    $o = array('Ö', 'Ó', 'Ô', 'Õ', 'ö', 'ó', 'ô', 'õ');
	    $u = array('Ü', 'Ú', 'ü', 'ú');
	    return str_replace('(', '', str_replace(')', '', str_replace('/', '', str_replace($c, 'c', str_replace($a, 'a', str_replace($e, 'e', str_replace($i, 'i', str_replace($o, 'o', str_replace($u, 'u', str_replace(' ', '-', $str))))))))));
 	}

 	function formatar_data($data){
 		return ( $data == '' )? '0000-00-00 00:00:00' : date('Y-m-d H:i:s', strtotime( str_replace("/", "-", $data ) ) );
 	}

 	function enviar_email( $configuracao ) {

		require_once('PHPMailer/PHPMailerAutoload.php');

		$mail = new PHPMailer();

		//Define os dados do servidor e tipo de conexão

		$mail->IsSMTP(); // Define que a mensagem será SMTP
		$mail->Host = "smtp.gmail.com:587"; // Endereço do servidor SMTP
		$mail->SMTPAuth = TRUE; // Autenticação
		$mail->Username = GMAIL_ACCOUNT; // Usuário do servidor SMTP
		$mail->Password = GMAIL_PASSWPRD; // Senha da caixa postal utilizada
		$mail->SMTPSecure = "tls";

		//Define os replay to)
		foreach ($configuracao['replayto'] as $k => $v) {
			$mail->AddReplyTo( $v['email'] , $v['nome'] );
		}

		//Define o remetente
		$mail->From = $configuracao['remetente']['email']; 
		$mail->FromName = $configuracao['remetente']['nome']; 

		//Define os destinatário(s)
		foreach ($configuracao['destinatarios'] as $k => $v) {
			$mail->AddAddress( $v['email'] , $v['nome'] );
		}
		
		//Define os dados técnicos da Mensagem
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)

		$msg  = $configuracao['msg']; 
		
	    

	    //Texto e Assunto
		$mail->Subject = $configuracao['assunto']; // Assunto da mensagem
		$mail->Body = $msg;

		//Envio da Mensagem
		$enviado = $mail->Send();

		//Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();

	}

	function enviar_imagem( $sistema, $caminho, $arquivo, $largura, $altura) {

		require('Canvas.php' );	

		$config['upload_path']   = $_SERVER['DOCUMENT_ROOT'].$sistema.$caminho;
		$config['allowed_types'] = 'jpg|png';	
		$config['encrypt_name']  = TRUE;

		$CI =& get_instance();
		$CI->load->library('upload', $config);

		$res = array();

		$_FILES['userfile']['name']     = $arquivo['file']['name']; 
	    $_FILES['userfile']['type']     = $arquivo['file']['type'];
	    $_FILES['userfile']['tmp_name'] = $arquivo['file']['tmp_name'];
	    $_FILES['userfile']['error']    = $arquivo['file']['error'];
	    $_FILES['userfile']['size']     = $arquivo['file']['size'];   

		if ( ! $CI->upload->do_upload() )
		{
		    $res[] = $CI->upload->display_errors('', '');
		}
		else
		{
		
			$upload_data = $CI->upload->data(); 

			//para montar os thumbs 
			$img = new Canvas();
			$img->hexa( '#FFFFFF' )
				->novaImagem( $largura, $altura )
				->marca( $config['upload_path'] .'/'. $upload_data['file_name'], 'meio', 'centro' )
			    ->grava( substr($config['upload_path'] .'/'. $upload_data['file_name'] , 0, -4) .  '_thumb.jpg' );

			$img = null;    

			$res[]= array('url' => $caminho.'/'.$upload_data['file_name'] , 'image' => substr($upload_data['file_name'] , 0, -4) );

		}

		return json_encode($res);

	}

	function deletar_imagem($sistema, $arquivos) {

		foreach ($arquivos as $valores) 
		{
			$path = $_SERVER['DOCUMENT_ROOT'].$sistema.$valores['url'];
			$path_thumb = $_SERVER['DOCUMENT_ROOT'].$sistema.substr($valores['url'], 0, -4).'_thumb.jpg';

			unlink($path);
			unlink($path_thumb);
		}
		
		echo 1;	
	}


	function enviar_arquvio( $sistema, $caminho, $arquivo) {

		$config['upload_path']   = $_SERVER['DOCUMENT_ROOT'].$sistema.$caminho;
		$config['allowed_types'] = 'pdf';	
		$config['encrypt_name']  = TRUE;

		$CI =& get_instance();
		$CI->load->library('upload', $config);

		$res = array();

		$_FILES['userfile']['name']     = $arquivo['file']['name']; 
	    $_FILES['userfile']['type']     = $arquivo['file']['type'];
	    $_FILES['userfile']['tmp_name'] = $arquivo['file']['tmp_name'];
	    $_FILES['userfile']['error']    = $arquivo['file']['error'];
	    $_FILES['userfile']['size']     = $arquivo['file']['size'];   

		if ( ! $CI->upload->do_upload() )
		{
		    $res[] = $CI->upload->display_errors('', '');
		}
		else
		{
			$upload_data = $CI->upload->data(); 
			$res[]= array('url' => $caminho.'/'.$upload_data['file_name'] , 'pdf' => substr($upload_data['file_name'] , 0, -4) );

		}

		return json_encode($res);

	}

	function deletar_arquivo($sistema, $arquivos) {

		foreach ($arquivos as $valores) 
		{
			$path = $_SERVER['DOCUMENT_ROOT'].$sistema.$valores['url'];
			
			unlink($path);
		}
		
		echo 1;	
	}

	
 	function formatar_cpf($cpf){
 		if(strlen($cpf)>14){
 			return  str_replace(".", "",str_replace("-", "", str_replace("/", "", $cpf ) ) );
 		}
 		else{
 			return  str_replace(".", "",str_replace("-", "", $cpf ) );
 		}
 		
 	}

 	function formatar_moeda($moeda){
 		return  str_replace(",", ".",str_replace(".", "",str_replace("R$", "", $moeda ) ) );
 	}

	function formatar_celular( $celular ){
		return '55'.str_replace("(", "",str_replace(")", "",str_replace(".", "",str_replace(" ", "", $celular ) ) ) );
	}

	function checktime($horario) {

		$horario = str_split($horario, 2);
		
	    if ( !array_key_exists( 0, $horario ) || $horario[0] < 0 || $horario[0] > 23 || !is_numeric($horario[0])) {
	        return false;
	    }
	    if ( !array_key_exists( 1, $horario ) || $horario[1] < 0 || $horario[1] > 59 || !is_numeric($horario[1])) {
	        return false;
	    }
	    return true;

	}
 
	function retorna_dias($dia){
		switch ($dia) {
			case 'Mon':
				return 'SEGUNDA';
				break;

			case 'Tue':
				return 'TERÇA';
				break;

			case 'Wed':
				return 'QUARTA';
				break;

			case 'Thu':
				return 'QUINTA';
				break;

			case 'Fri':
				return 'SEXTA';
				break;

			case 'Sat':
				return 'SÁBADO';
				break;
			
			default:
				return 'DOMINGO';
				break;
		}
 	}

 	function validar_cpf($cpf = null) {
 	
 		$cpf = str_replace(".", "", $cpf );
 		$cpf = str_replace("-", "", $cpf );

	    // Verifiva se o número digitado contém todos os digitos
	    $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
	 
	    // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
	    if (strlen($cpf) != 11 ||
	        $cpf == '00000000000' ||
	        $cpf == '11111111111' ||
	        $cpf == '22222222222' ||
	        $cpf == '33333333333' ||
	        $cpf == '44444444444' ||
	        $cpf == '55555555555' ||
	        $cpf == '66666666666' ||
	        $cpf == '77777777777' ||
	        $cpf == '88888888888' ||
	        $cpf == '99999999999') {
	        return FALSE;
	    } else {
	        // Calcula os números para verificar se o CPF é verdadeiro
	        for ($t = 9; $t < 11; $t++) {
	            for ($d = 0, $c = 0; $c < $t; $c++) {
	                $d += $cpf{$c} * (($t + 1) - $c);
	            }
	 
	            $d = ((10 * $d) % 11) % 10;
	            if ($cpf{$c} != $d) {
	                return FALSE;
	            }
	        }
	        return TRUE;
	    }

	}

	function mask($val, $mask){
		$maskared = '';
		$k = 0;
		for($i = 0; $i<=strlen($mask)-1; $i++){
		
			if($mask[$i] == '#'){

		 		if(isset($val[$k]))
		 			$maskared .= $val[$k++];

			}
		 	else
		 	{
				if(isset($mask[$i]))
		 			$maskared .= $mask[$i];
		 	}
		}
		return $maskared;
	}

}