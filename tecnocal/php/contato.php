<?php

  /*
  *   Inclui os arquivos necessários
  */
  require_once './connection.php';
  include ('envia-email.php');
  $conn = Database::conexao();

  /*
  *   Informações para armazenar no banco, você pode editá-lo conforme necessidade
  */
  $data = array(
    'nome' => ($_POST['nome']),
    'email' =>utf8_decode($_POST['email']),
    'telefone' =>($_POST['telefone']),
    'assunto' =>($_POST['assunto']),
    'cep' => ($_POST['cep']),
    'estado' => ($_POST['estado']),
    'cidade' => ($_POST['cidade']),
    'endereco' => ($_POST['endereco']),
    'msg' =>($_POST['mensagem']),
    'data'  =>date("Y-m-d"),
    'hora' => date('H:i'),
    'ip'  => $_SERVER['REMOTE_ADDR'] 
  );

  try {

      $stmt = $conn->prepare("INSERT INTO tb_contato 
                                (codigo, nome, email, telefone, assunto, cep, estado, cidade, endereco, mensagem, dt_contato, hr_contato, cd_ip) 
                              VALUES 
                              (null, :nome, :email, :telefone, :assunto, :cep, :estado, :cidade, :endereco, :mensagem, :data, :hora, :ip) ");

      $stmt->bindParam(':nome', $data['nome']);
      $stmt->bindParam(':email', $data['email']);
      $stmt->bindParam(':telefone', $data['telefone']);
      $stmt->bindParam(':assunto', $data['assunto']);
      $stmt->bindParam(':cep', $data['cep']);
      $stmt->bindParam(':estado', $data['estado']);
      $stmt->bindParam(':cidade', $data['cidade']);
      $stmt->bindParam(':endereco', $data['endereco']);
      $stmt->bindParam(':mensagem', $data['msg']);
      $stmt->bindValue(':data', $data['data']);
      $stmt->bindValue(':hora', $data['hora']);
      $stmt->bindValue(':ip', $data['ip']);
      
      $stmt->execute();

      $gid = $conn->prepare(" SELECT MAX(codigo) FROM tb_contato ");
      $gid->execute();
      $getid = $gid->fetchColumn();

      if($getid){

        /*
        *   Corpor html da mensagem
        */
        $body = "
         <table border=0 cellpadding='7' bgcolor='#f8f8f8'>
           <tr bgcolor='#F8F8F8'>
            <td><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><strong>Data:</strong></font></td>
            <td colspan='6'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>".$data['data']."</font></td>
           </tr>
           <tr bgcolor='#F8F8F8'>
            <td><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><strong>Hora:</strong></font></td>
            <td colspan='6'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>".$data['hora']."</font></td>
          </tr>
          <tr>
            <td colspan=2 align=center><b>Mensagem de Contato</b>
          </tr>
          <tr>
            <td><font face= 'Arial, Helvetica, sans-serif'> <b>Nome:</b></font></td>
            <td><font face= 'Arial, Helvetica, sans-serif'>".$data['nome']."</font> </td>
          </tr>
          <tr>
            <td><font face= 'Arial, Helvetica, sans-serif'> <b>E-mail:</b></font></td>
            <td><font face= 'Arial, Helvetica, sans-serif'>".$data['email']."</font> </td>
          </tr>
          <tr>
            <td><font face= 'Arial, Helvetica, sans-serif'> <b>Telefone:</b></font></td>
            <td><font face= 'Arial, Helvetica, sans-serif'>".$data['telefone']."</font> </td>
          </tr>   
          <tr>
            <td><font face= 'Arial, Helvetica, sans-serif'> <b>Assunto:</b></font></td>
            <td><font face= 'Arial, Helvetica, sans-serif'>".$data['assunto']."</font> </td>
          </tr>    
          <tr>
            <td><font face= 'Arial, Helvetica, sans-serif'> <b>Mensagem:</b></font></td>
            <td><font face= 'Arial, Helvetica, sans-serif'>".$data['msg']."</font> </td>
          </tr>           
        </table>";

        echo ( Email::enviar( $body, $data['nome'], $data['email'], $getid,'Contato' ));

      }
      


  }
  catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }


?>
