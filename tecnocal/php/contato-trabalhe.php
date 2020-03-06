<?php
  require_once 'connection.php';
  include ('envia-email.php');
  $conn = Database::conexao();

  if( !empty($_FILES['curriculo']['name']) ) {
      $arquivoNAME_cv     = $_FILES['curriculo']['name'];
      $arquivoTMP_NAME_cv = $_FILES['curriculo']['tmp_name'];
      $arquivoEXT_cv      = strtolower(end(explode('.', $arquivoNAME_cv)));

      $arquivoDIR      = '../upload/';
      $_UParquivo['extensoes'] = array('pdf', 'doc', 'docx', 'PDF', 'DOC', 'DOCX');
      $temArquivo = 1;   
  }


  if ( $temArquivo == 1 && array_search($arquivoEXT_cv, $_UParquivo['extensoes'] ) === false ){
      echo "Envie seu Currículo no formato PDF ou DOCX, erro ao enviar a mensagem tente novamente";
  }else{

    $data = array(
      'nome'      => $_POST['nome'],
      'telefone'  => $_POST['telefone'],
      'email'     => $_POST['email'],
      'area'      => $_POST['area'],
      'msg'       => $_POST['mensagem'],

      'data'      => date("d/m/Y"),
      'hora'      => date('H:i'),
      'ip'        => $_SERVER['REMOTE_ADDR'] 
    );

    try {

        $stmt = $conn->prepare("INSERT INTO tb_contato_trabalhe_conosco ( nm_contato, ds_telefone, ds_email, ds_area, ds_mensagem, ds_curriculo, dt_contato, hr_contato, cd_ip ) VALUES ( :nome, :telefone, :email, :area, :msg, :curriculo, :data, :hora, :ip ); ");

        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':telefone', $_POST['telefone']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':area', $data['area']);
        $stmt->bindParam(':msg', $data['msg']);
        $stmt->bindParam(':curriculo', $arquivoNAME_cv);
        $stmt->bindValue(':data', $data['data']);
        $stmt->bindValue(':hora', $data['hora']);
        $stmt->bindValue(':ip', $data['ip']);
        
        $stmt->execute();

        $gid = $conn->prepare(" SELECT MAX(cd_contato) FROM tb_contato_trabalhe_conosco; ");
        $gid->execute();
        $getid = $gid->fetchColumn();

        if($getid){

          $body = "
            <table border=0 cellpadding='7' bgcolor='#fff'>

              <tr bgcolor='#50baea'>
                <td>
                  <font face='Verdana, Arial, Helvetica, sans-serif' size='2'>
                    <strong style='color: #fff;'>Data:</strong>
                  </font>
                </td>

                <td colspan='6'>
                  <font face='Verdana, Arial, Helvetica, sans-serif' style='color: #fff;' size='2'>".$data['data']."</font>
                </td>
              </tr>

              <tr bgcolor='#F8F8F8'>
                <td>
                  <font face='Verdana, Arial, Helvetica, sans-serif' size='2'>
                    <strong>Hora:</strong>
                  </font>
                </td>

                <td colspan='6'>
                  <font face='Verdana, Arial, Helvetica, sans-serif' size='2'>".$data['hora']."</font>
                </td>
              </tr>

              <tr>
                <td colspan=2 align=center>
                  <b style='color: #50baea; font-size: 20px;'>Mensagem de Contato</b>
                </td>
              </tr>

              <tr bgcolor='#50baea'>
                <td>
                  <font face= 'Arial, Helvetica, sans-serif'>
                    <b style='color: #fff;'>Nome:</b>
                  </font>
                </td>

                <td>
                  <font face= 'Arial, Helvetica, sans-serif' style='color: #fff;'>".$data['nome']."</font>
                </td>
              </tr>

              <tr>
                <td>
                  <font face= 'Arial, Helvetica, sans-serif'>
                    <b>E-mail:</b>
                  </font>
                </td>

                <td>
                  <font face= 'Arial, Helvetica, sans-serif'>".$data['email']."</font>
                </td>
              </tr>

              <tr bgcolor='#50baea'>
                <td>
                  <font face= 'Arial, Helvetica, sans-serif'>
                    <b style='color: #fff;'>Telefone:</b>
                  </font>
                </td>

                <td>
                  <font face= 'Arial, Helvetica, sans-serif' style='color: #fff;'>".$telefone."</font>
                </td>
              </tr>  

              <tr>
                <td>
                  <font face= 'Arial, Helvetica, sans-serif'>
                    <b>Área de atuação:</b>
                  </font>
                </td>

                <td>
                  <font face= 'Arial, Helvetica, sans-serif'>".$data['area']."</font>
                </td>
              </tr> 

              <tr bgcolor='#50baea'>
                <td>
                  <font face= 'Arial, Helvetica, sans-serif'>
                    <b style='color: #fff;'>Mensagem:</b>
                  </font>
                </td>

                <td>
                  <font face= 'Arial, Helvetica, sans-serif' style='color: #fff;'>".$data['msg']."</font>
                </td>
              </tr> 

            </table>";

            
            $nome = $data['nome'];
            $email = $data['email'];
            $formulario = 'Contato Trabalhe Conosco';


            include ('PHPMailer/class.phpmailer.php');
            require 'PHPMailer/PHPMailerAutoload.php';

            $useragent = $_SERVER['HTTP_USER_AGENT'];

            $tipo = (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) ? 'M' : 'C';

            // Inicia a classe PHPMailer
            $mail = new PHPMailer();
            $mail->IsSMTP(); // Define que a mensagem será SMTP
            $mail->Host = "smtp.gmail.com:587"; // Endereço do servidor SMTP
            $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
            $mail->Username = 'tecnologia@summercomunicacao.com.br'; // Usuário do servidor SMTP
            $mail->Password = 'tecepw5828'; // Senha do servidor SMTP
            $mail->SMTPSecure = "tls";

            // Define o remetente
            $mail->From = "tecnologia@summercomunicacao.com.br";
            $mail->FromName = "Tecnocal - ".$formulario; 

            // Define os destinatário(s)
            $mail->AddAddress('geovani.assis@summercomunicacao.com.br', 'Geovani - Teste'); //E-mail do desenvolvedor (para testes)
            // $mail->AddBCC('bcc@summercomunicacao.com.br', 'BCC Summer'); // Copia (obrigatório para produção)

            // Define o retorno de resposta
            $mail->AddReplyTo($email, $nome);

            // Define os dados técnicos da Mensagem
            $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
            $mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
            $mail->AddAttachment($arquivoTMP_NAME_cv, $arquivoNAME_cv);

            // Define a mensagem (Texto e Assunto)
            $mail->Subject = $tipo . ' | Nº ' . $getid . ' - '.$formulario; // Assunto da mensagem
            $mail->Body = $body; // Corpo da mensagem

            // Envia o e-mail
            $enviado = $mail->Send();
            move_uploaded_file($arquivoTMP_NAME_cv, $arquivoDIR.$getid.'-'.$arquivoNAME_cv);

            // Limpa os destinatários e os anexos
            $mail->ClearAllRecipients();
            $mail->ClearAttachments();

          // Exibe uma mensagem de resultado
          if ($enviado) {
             echo 'true';
          }else{
            echo 'error';
          }

        }

    }catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

  }

?>