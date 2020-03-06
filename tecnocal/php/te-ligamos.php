<?php

  require_once 'connection.php';
  include ('envia-email.php');
  $conn = Database::conexao();

  $data = array(
    'nome'            => ($_POST['lig_nome']),
    'telefone'        => ($_POST['lig_telefone']),
    'email'           => 'geovani.assis@summercomunicacao.com.br',
    'data'            => date("d/m/Y"),
    'hora'            => date('H:i'),
    'ip'              => $_SERVER['REMOTE_ADDR'] 
  );

  try {

      $stmt = $conn->prepare("INSERT INTO tb_te_ligamos ( nm_contato, ds_telefone, dt_contato, hr_contato, cd_ip ) VALUES ( :nome, :telefone, :data, :hora, :ip ); ");

      $stmt->bindParam(':nome',     $data['nome']);
      $stmt->bindParam(':telefone', $data['telefone']);      
      $stmt->bindValue(':data',     $data['data']);
      $stmt->bindValue(':hora',     $data['hora']);
      $stmt->bindValue(':ip',       $data['ip']);
      
      $stmt->execute();

      $gid = $conn->prepare(" SELECT MAX(cd_ligamos) FROM tb_te_ligamos; ");

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
                <b style='color: #50baea; font-size: 20px;'>Mensagem de Te Ligamos</b>
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
                  <b >Telefone:</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif'>".$data['telefone']."</font>
              </td>
            </tr>  
          
          </table>";

        echo ( Email::enviar( $body, $data['nome'], $data['email'], $getid,'Contato Te Ligamos' ));
      }

  }catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

?>