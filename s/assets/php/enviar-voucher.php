<?php
// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
include ($_SERVER["DOCUMENT_ROOT"].'abq/wp-content/themes/abq/php/connection.php');
include ('PHPMailer/class.phpmailer.php');
require 'PHPMailer/PHPMailerAutoload.php';

$useragent = $_SERVER['HTTP_USER_AGENT'];
$tipo = (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) ? 'M' : 'C';

//user
//email
//voucher

$user = utf8_decode($_POST['user']);
$email = utf8_decode($_POST['email']);
$voucher = utf8_decode($_POST['voucher']);
$datax = addslashes(date("U"));
$data = date("d/m/Y", $datax);
$hora = date('H:i'); 
$ip = $_SERVER['REMOTE_ADDR'];

// Inicia a classe PHPMailer
$mail = new PHPMailer();
// Define os dados do servidor e tipo de conexão
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.gmail.com:587"; // Endereço do servidor SMTP
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Username = 'tecnologia@summercomunicacao.com.br'; // Usuário do servidor SMTP
$mail->Password = 'tecepw5828'; // Senha do servidor SMTP
$mail->SMTPSecure = "tls";
// Define o remetente
$mail->From = "tecnologia@summercomunicacao.com.br"; // Seu e-mail
$mail->FromName = "ABQ - Envio de Voucher"; // Seu nome
// Define os destinatário(s)

$mail->AddAddress('alexandre.vale@summercomunicacao.com.br', 'Alexandre do Vale'); //E-mail do desenvolvedor (para testes)
// $mail->AddAddress($email, $user); 
// $mail->AddAddress('secretariageral@quiropraxia.org.br', 'Secretaria Geral ABQ'); 

// $mail->AddBCC('bcc@summercomunicacao.com.br', 'BCC Summer'); // Copia (obrigatório para produção)


// $mail->AddReplyTo($email, $nome);
// $body = "
//     <table border=0 cellpadding='7' bgcolor='#f8f8f8'>
//        <tr bgcolor='#F8F8F8'>
//         <td><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><strong>Data:</strong></font></td>
//         <td colspan='6'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>$data</font></td>
//        </tr>
//        <tr bgcolor='#F8F8F8'>
//         <td><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><strong>Hora:</strong></font></td>
//         <td colspan='6'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>$hora</font></td>
//       </tr>
//       <tr>
//         <td colspan=2 align=center><b>Seu voucher chegou!</b>
//       </tr>
//       <tr>
//         <td><font face= 'Arial, Helvetica, sans-serif'> <b>Código do Voucher:</b></font></td>
//         <td><font face= 'Arial, Helvetica, sans-serif'>$voucher</font> </td>
//       </tr>
//     </table>";
$body = '<table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td>
        <img src="http://associacaoquiropraxia.org.br/wp-content/themes/abq/imgs/head.jpg" width="600" height="386" alt="">
      </td>
    </tr>
    <tr>
      <td style="text-align: center;font-family: arial">
        <p style="color:#39639e;margin:15px;padding:15px;">
          <b>Parabéns! Você acaba de ganhar um voucher de desconto do Clube de Benefícios da ABQ.</b>
        </p>
        <h1 style="color:#39639e;background-color:#ccc;margin:15px;padding:15px;">'.$voucher.'</h1>
        <p style="color:#000;">Essas são algumas das vantagens que você recebe por fazer parte do Clube de Benefícios da ABQ - Associação Brasileira de Quiropraxia. Aproveite o seu presente e continue acompanhando nosso site para receber outros privilégios.</p>
      </td>
    </tr>
    <tr>
      <td>
        <table width="300" border="0" cellpadding="0" cellspacing="0" align="left">
          <tr>
            <td>
               <img src="http://associacaoquiropraxia.org.br/wp-content/themes/abq/imgs/logo.jpg" width="300" height="78" alt="">
            </td>
          </tr>
        </table>
        <table width="300" border="0" cellpadding="0" cellspacing="0" align="right">
          <tr>
        <td height="85">
          <h2 style="color:#39639e;font-family:arial;font-style:italic;">Clube de Benefícios</h2>
        </td>
          </tr>
        </table>       
      </td>
    </tr> 
  </table>';
// Define os dados técnicos da Mensagem
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
// Define a mensagem (Texto e Assunto)
$mail->Subject = 'ABQ - Voucher Promocional'; // Assunto da mensagem
$mail->Body = $body;
// Envia o e-mail
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
// Exibe uma mensagem de resultado
if ($enviado) {
    echo 1;
} else {
    echo 0;
}
?>