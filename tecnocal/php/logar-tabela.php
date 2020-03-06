<?php
  require_once 'connection.php';
  $conn = Database::conexao();
  $email = ($_POST['tab_email']);
  $senha = MD5($_POST['tab_senha']);

  try {
      $verificar = $conn->prepare("SELECT * FROM tb_user_tabela WHERE nm_email = :email AND nm_senha = :senha ;");
      $verificar->bindParam(':email', $email);
      $verificar->bindParam(':senha', $senha);
      $verificar->execute();
      $usuario = $verificar->fetchAll();

      if ($usuario) {
        session_start();

        $_SESSION['login-tabela'] = $email;
        $_SESSION['senha-tabela'] = $_POST['tab_senha'];

        echo 'true';
      }else{
        echo 'false';
      }

  }catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

?>