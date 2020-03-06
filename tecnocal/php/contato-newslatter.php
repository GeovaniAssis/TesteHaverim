<?php
  require_once 'connection.php';
  $conn = Database::conexao();

  $data = array(
    'nome'            => ($_POST['nome']),
    'email'           => utf8_decode($_POST['email']),

    'data'            => date("d/m/Y"),
    'hora'            => date('H:i'),
    'ip'              => $_SERVER['REMOTE_ADDR'] 
  );
  try {
      $stmt = $conn->prepare("INSERT INTO tb_newslatter ( nm_contato, ds_email, dt_contato, hr_contato, cd_ip ) VALUES ( :nome, :email, :data, :hora, :ip ); ");
      $stmt->bindParam(':nome', $data['nome']);
      $stmt->bindParam(':email', $data['email']);
      $stmt->bindValue(':data', $data['data']);
      $stmt->bindValue(':hora', $data['hora']);
      $stmt->bindValue(':ip', $data['ip']);
      $stmt->execute();
      echo "true";
  }catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }
?>