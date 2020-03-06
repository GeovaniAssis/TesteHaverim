<?php

  require_once 'connection.php';
  include ('envia-email.php');
  $conn = Database::conexao();

  if( $_POST['telefone'] ){ $telefone = $_POST['telefone']; }else{ $telefone = "Não informado"; }

  $data = array(
    'nome'      => $_POST['nome'],
    'telefone'  => $telefone,
    'email'     => $_POST['email'],
    'celular'   => $_POST['celular'],
    'assunto'   => $_POST['assunto'],
    'msg'       => $_POST['mensagem'],

    'data'      => date("d/m/Y"),
    'hora'      => date('H:i'),
    'ip'        => $_SERVER['REMOTE_ADDR'] 
  );

  try {

      $stmt = $conn->prepare("INSERT INTO tb_contato ( nm_contato, ds_telefone, ds_email, ds_celular, ds_assunto, ds_mensagem, dt_contato, hr_contato, cd_ip ) VALUES ( :nome, :telefone, :email, :celular, :assunto, :msg, :data, :hora, :ip ); ");

      $stmt->bindParam(':nome', $data['nome']);
      $stmt->bindParam(':telefone', $telefone);
      $stmt->bindParam(':email', $data['email']);
      $stmt->bindParam(':celular', $data['celular']);
      $stmt->bindParam(':assunto', $data['assunto']);
      $stmt->bindParam(':msg', $data['msg']);
      $stmt->bindValue(':data', $data['data']);
      $stmt->bindValue(':hora', $data['hora']);
      $stmt->bindValue(':ip', $data['ip']);
      
      $stmt->execute();

      $gid = $conn->prepare(" SELECT MAX(cd_contato) FROM tb_contato; ");
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
                  <b>Celular:</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif'>".$data['celular']."</font>
              </td>
            </tr> 

            <tr bgcolor='#50baea'>
              <td>
                <font face= 'Arial, Helvetica, sans-serif'>
                  <b style='color: #fff;'>Assunto:</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif' style='color: #fff;'>".$data['assunto']."</font>
              </td>
            </tr> 

            <tr>
              <td>
                <font face= 'Arial, Helvetica, sans-serif'>
                  <b>Mensagem:</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif'>".$data['msg']."</font>
              </td>
            </tr>           
          </table>";

        echo ( Email::enviar( $body, $data['nome'], $data['email'], $getid,'Contato SAC' ));
      }

  }catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

?>