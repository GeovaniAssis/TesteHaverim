<?php 
    include ('connection.php');
    include ('PHPMailer/class.phpmailer.php');
    require 'PHPMailer/PHPMailerAutoload.php';

    $nome            = $_POST['name'];
    $idComprador     = $_POST['idComprador'];
    $cpf             = $_POST['cpf'];
    $cpf_anti        = $_POST['cpf_anti'];
    $email           = $_POST['email'];
    $telefone        = $_POST['telefone'];
    $telefone_anti   = $_POST['telefone_anti'];
    $pais            = $_POST['pais'];
    $estado          = $_POST['estado'];
    $cidade          = $_POST['cidade'];

    $idProduto       = $_POST['idProduto'];
    $valor           = $_POST['valor'];
    $valor_anti      = $_POST['valor_anti'];
    $nmProduto       = $_POST['nmProduto'];
    $qtparcela       = '1';
   
    $resposta        = $_POST['resposta'];
    $modo            = $_POST['modo'];
    $transactionID   = $_POST['transactionID'];
    $transactionInfo = $_POST['transactionInfo'];

    if( $modo == 'boleto' ) {
        $urlBoleto   = $_POST['boleto'];
    }else{
        $qtparcela   = $_POST['parcela'];
    };

    $getid           = 0;
    $hr_envio        = date('H:i');
    $dt_enviox       = addslashes(date("U"));
    $dt_envio        = date("d/m/Y", $dt_enviox);
    $ip              = $_SERVER['REMOTE_ADDR'];
    $hoje            = date("Y-m-d");

    // Função date do PHP para o PORTUGUÊS 
    setlocale(LC_ALL, 'pt_BR.utf8');
    date_default_timezone_set('America/Sao_Paulo');
    $body            = "";
    $useragent       = $_SERVER['HTTP_USER_AGENT'];


    if( $resposta == 'paid' || $resposta == 'authorized' ){

        $sql3 = $conn->prepare("UPDATE in_dashboard_usuarios SET cd_status_pagamento = :status, ds_modo = :modo, qt_parcela = :parcela, ds_cpf = :cpf, ds_email = :email, ds_telefone = :telefone, vl_anuidade = :valor, nm_anuidade = :nmProduto, dt_pagamento = :hoje WHERE cd_dashboard = :produto AND cd_usuarios = :usuario;");
        $conn->exec("set names utf8");
        $sql3->bindValue(':status', 3);
        $sql3->bindValue(':produto', $idProduto);
        $sql3->bindValue(':usuario', $idComprador);
        $sql3->bindValue(':modo', $modo);
        $sql3->bindValue(':parcela', $qtparcela);
        $sql3->bindValue(':cpf', $cpf_anti);
        $sql3->bindValue(':email', $email);
        $sql3->bindValue(':telefone', $telefone_anti);
        $sql3->bindValue(':valor', $valor_anti);
        $sql3->bindValue(':nmProduto', $nmProduto);
        $sql3->bindValue(':hoje', $hoje);
        $sql3->execute();

    }else if( $resposta == 'waiting_payment' ){

        $sql3 = $conn->prepare("UPDATE in_dashboard_usuarios SET cd_status_pagamento = :status, ds_modo = :modo, qt_parcela = :parcela, ds_cpf = :cpf, ds_email = :email, ds_telefone = :telefone, vl_anuidade = :valor, nm_anuidade = :nmProduto, dt_pagamento = :hoje WHERE cd_dashboard = :produto AND cd_usuarios = :usuario;");
        $conn->exec("set names utf8");
        $sql3->bindValue(':status', 2);
        $sql3->bindValue(':produto', $idProduto);
        $sql3->bindValue(':usuario', $idComprador);
        $sql3->bindValue(':modo', $modo);
        $sql3->bindValue(':parcela', $qtparcela);
        $sql3->bindValue(':cpf', $cpf_anti);
        $sql3->bindValue(':email', $email);
        $sql3->bindValue(':telefone', $telefone_anti);
        $sql3->bindValue(':valor', $valor_anti);
        $sql3->bindValue(':nmProduto', $nmProduto);
        $sql3->bindValue(':hoje', $hoje);
        $sql3->execute();

    };


    $gid = $conn->prepare(" SELECT cd_dashusu FROM in_dashboard_usuarios WHERE cd_dashboard = :produto AND cd_usuarios = :usuario;");
    $gid->bindValue(':usuario', $idComprador);
    $gid->bindValue(':produto', $idProduto);
    $gid->execute();
    $getid = $gid->fetchColumn();


    if( $resposta == 'paid' || $resposta == 'authorized' || $resposta == 'waiting_payment' ){

        $sql2 = $conn->prepare(" INSERT INTO tb_pagamento_pagarme ( id_transacao, ds_status, ds_info_transacao, ativo, cd_comprador, fm_pagamento ) VALUES (  :id,  :status, :info,  :ativo, :comprador, :pagamento );");
        $sql2->bindValue(':id', $transactionID);
        $sql2->bindValue(':status', $resposta);
        $sql2->bindValue(':info', json_encode($transactionInfo));
        $sql2->bindValue(':ativo', 1);
        $sql2->bindValue(':comprador', $idComprador);
        $sql2->bindValue(':pagamento', $getid);
        $sql2->execute();

    };

    $gid = $conn->prepare(" SELECT MAX(cd_pagamento) FROM tb_pagamento_pagarme ");
    $gid->execute();
    $id_pagamento = $gid->fetchColumn();

  
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
    $mail->FromName = "Associação Brasileira de Quiropraxia"; // Seu nome


    // Define os destinatário(s)
    // $mail->AddAddress('geovani.assis@summercomunicacao.com.br', 'Programador | Geovani');
    $mail->AddAddress($email, $nome);
    // $mail->AddReplyTo($email, $nome);
    $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
    $mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)

    $mail->Subject = '0';
    $body = "0";

    // Define a mensagem (Texto e Assunto)

    // if( $resposta != 'waiting_payment' && $modo != 'cartao' ){

        switch ($resposta) {

            case 'waiting_payment':
                $mail->Subject = 'Associação Brasileira de Quiropraxia - Aguardando Pagamento'; // Assunto da mensagem
                $body = "
                    <table border=0 cellpadding='7' bgcolor='#f1f1f1'>

                      <tr bgcolor='#f1f1f1'>
                        <td><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><strong>Data:</strong></font></td>
                        <td colspan='6'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>".$dt_envio."</font></td>
                      </tr>

                      <tr>
                        <td colspan=2 align=center><b>Mensagem de Anuidade Nº. ".$id_pagamento."</b>
                      </tr>

                      <tr>
                        <td colspan=2 align=center bgcolor='#39639e' style='color: #ffffff;'><b>ASSOCIADO:</b>
                      </tr>

                      <tr bgcolor='#ffffff'>
                        <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'><b>Nome:</b></font></td>
                        <td><font face= 'Arial, Helvetica, sans-serif'>".$nome."</font> </td>
                      </tr>

                      <tr bgcolor='#6ca1ea'>
                        <td><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>CPF:</b></font></td>
                        <td bgcolor='#ffffff'><font face= 'Arial, Helvetica, sans-serif'>".$cpf_anti."</font> </td>
                      </tr>

                      <tr bgcolor='#ffffff'>
                        <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>E-mail:</b></font></td>
                        <td><font face= 'Arial, Helvetica, sans-serif'>".$email."</font> </td>
                      </tr>

                      <tr bgcolor='#6ca1ea'>
                        <td><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Telefone:</b></font></td>
                        <td bgcolor='#ffffff'><font face= 'Arial, Helvetica, sans-serif'>".$telefone_anti."</font> </td>
                      </tr>

                      <tr>
                        <td colspan=2 align=center bgcolor='#39639e' style='color: #ffffff;'><b>ANUIDADE:</b>
                      </tr>

                      <tr bgcolor='#ffffff'>
                        <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Nome da Turma:</b></font></td>
                        <td><font face= 'Arial, Helvetica, sans-serif'>".$nmProduto."</font> </td>
                      </tr>

                      <tr bgcolor='#6ca1ea'>
                        <td><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Valor:</b></font></td>
                        <td bgcolor='#ffffff'><font face= 'Arial, Helvetica, sans-serif'>".$valor_anti."</font> </td>
                      </tr>

                      <tr bgcolor='#ffffff'>
                        <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Forma de Pagamento:</b></font></td>
                        <td><font face= 'Arial, Helvetica, sans-serif'>Boleto</font> </td>
                      </tr>

                      <tr>
                        <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Boleto:</b></font></td>
                        <td bgcolor='#ffffff'><font face= 'Arial, Helvetica, sans-serif'>".$urlBoleto."</font> </td>
                      </tr>

                    </table>
                ";
            break;

            case 'paid':
            case 'authorized':
                $mail->Subject = 'Associação Brasileira de Quiropraxia - Pagamento Efetuado'; // Assunto da mensagem
                $body = "<table border=0 cellpadding='7' bgcolor='#f1f1f1'>
                            <tr bgcolor='#f1f1f1'>
                                <td><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><strong>Data:</strong></font></td>
                                <td colspan='6'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>".$dt_envio."</font></td>
                            </tr>

                            <tr>
                                <td colspan=2 align=center><b>Mensagem de Anuidade Nº. ".$id_pagamento."</b>
                            </tr>

                            <tr>
                                <td colspan=2 align=center bgcolor='#39639e' style='color: #ffffff;'><b>ASSOCIADO:</b>
                            </tr>

                            <tr bgcolor='#ffffff'>
                                <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'><b>Nome:</b></font></td>
                                <td><font face= 'Arial, Helvetica, sans-serif'>".$nome."</font> </td>
                            </tr>

                            <tr bgcolor='#6ca1ea'>
                                <td><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>CPF:</b></font></td>
                                <td bgcolor='#ffffff'><font face= 'Arial, Helvetica, sans-serif'>".$cpf_anti."</font> </td>
                            </tr>

                            <tr bgcolor='#ffffff'>
                                <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>E-mail:</b></font></td>
                                <td><font face= 'Arial, Helvetica, sans-serif'>".$email."</font> </td>
                            </tr>

                            <tr bgcolor='#6ca1ea'>
                                <td><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Telefone:</b></font></td>
                                <td bgcolor='#ffffff'><font face= 'Arial, Helvetica, sans-serif'>".$telefone_anti."</font> </td>
                            </tr>

                            <tr>
                                <td colspan=2 align=center bgcolor='#39639e' style='color: #ffffff;'><b>ANUIDADE:</b>
                            </tr>

                            <tr bgcolor='#ffffff'>
                                <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Nome da Anuidade:</b></font></td>
                                <td><font face= 'Arial, Helvetica, sans-serif'>".$nmProduto."</font> </td>
                            </tr>

                            <tr bgcolor='#ffffff'>
                                <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Parcelado em:</b></font></td>
                                <td><font face= 'Arial, Helvetica, sans-serif'>".$qtparcela." vez(es)</font> </td>
                            </tr>

                            <tr bgcolor='#6ca1ea'>
                                <td><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Valor:</b></font></td>
                                <td bgcolor='#ffffff'><font face= 'Arial, Helvetica, sans-serif'>".$valor_anti."</font> </td>
                            </tr>

                            <tr bgcolor='#ffffff'>
                                <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Forma de Pagamento:</b></font></td>
                                <td><font face= 'Arial, Helvetica, sans-serif'>Cartão</font> </td>
                            </tr>

                            <tr bgcolor='#6ca1ea'>
                                <td><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Status:</b></font></td>
                                <td bgcolor='#ffffff'><font face= 'Arial, Helvetica, sans-serif'>Pago</font> </td>
                            </tr>
                        </table>";
            break;

            case 'refunded':
            case 'pending_refund':
            case 'refuAnuidade':
                $mail->Subject = 'Associação Brasileira de Quiropraxia - Pagamento não efetuado'; // Assunto da mensagem
                $body = "
                    <table border=0 cellpadding='7' bgcolor='#f1f1f1'>

                      <tr bgcolor='#f1f1f1'>
                        <td><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><strong>Data:</strong></font></td>
                        <td colspan='6'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>".$dt_envio."</font></td>
                      </tr>

                      <tr>
                        <td colspan=2 align=center><b>Mensagem de Anuidade Nº. ".$id_pagamento."</b>
                      </tr>

                      <tr>
                        <td colspan=2 align=center bgcolor='#39639e' style='color: #ffffff;'><b>ASSOCIADO:</b>
                      </tr>

                      <tr bgcolor='#ffffff'>
                        <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'><b>Nome:</b></font></td>
                        <td><font face= 'Arial, Helvetica, sans-serif'>".$nome."</font> </td>
                      </tr>

                      <tr bgcolor='#6ca1ea'>
                        <td><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>CPF:</b></font></td>
                        <td bgcolor='#ffffff'><font face= 'Arial, Helvetica, sans-serif'>".$cpf_anti."</font> </td>
                      </tr>

                      <tr bgcolor='#ffffff'>
                        <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>E-mail:</b></font></td>
                        <td><font face= 'Arial, Helvetica, sans-serif'>".$email."</font> </td>
                      </tr>

                      <tr bgcolor='#6ca1ea'>
                        <td><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Telefone:</b></font></td>
                        <td bgcolor='#ffffff'><font face= 'Arial, Helvetica, sans-serif'>".$telefone_anti."</font> </td>
                      </tr>

                      <tr>
                        <td colspan=2 align=center bgcolor='#39639e' style='color: #ffffff;'><b>ANUIDADE:</b>
                      </tr>

                      <tr bgcolor='#ffffff'>
                        <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Nome da Turma:</b></font></td>
                        <td><font face= 'Arial, Helvetica, sans-serif'>".$nmProduto."</font> </td>
                      </tr>

                      <tr bgcolor='#6ca1ea'>
                        <td><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Valor:</b></font></td>
                        <td bgcolor='#ffffff'><font face= 'Arial, Helvetica, sans-serif'>".$valor_anti."</font> </td>
                      </tr>

                      <tr bgcolor='#ffffff'>
                        <td bgcolor='#6ca1ea'><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Forma de Pagamento:</b></font></td>
                        <td><font face= 'Arial, Helvetica, sans-serif'>Cartão</font> </td>
                      </tr>

                      <tr bgcolor='#6ca1ea'>
                        <td><font face= 'Arial, Helvetica, sans-serif' style='color: #ffffff;'> <b>Status:</b></font></td>
                        <td bgcolor='#ffffff'><font face= 'Arial, Helvetica, sans-serif'>Não efetuado</font> </td>
                      </tr>

                    </table>";
            break;

        };
    // };
    $mail->Body = $body;
    // Envia o e-mail
    $mail->Send();
    // Limpa os destinatários e os anexos
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();

    echo $resposta;     
	
 ?>