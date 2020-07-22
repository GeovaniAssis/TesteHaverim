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

        try {

          $preco = $conn->prepare("SELECT cd_tabela, ds_tabela FROM tb_tabelas WHERE ic_ativo = 1 AND ic_precos = 1 ORDER BY ds_ano DESC, ds_mes DESC ;");
          $preco->execute();
          $tbpreco = $preco->fetchAll();

          $revenda = $conn->prepare("SELECT cd_tabela, ds_tabela FROM tb_tabelas WHERE ic_ativo = 1 AND ic_revenda = 1 ORDER BY ds_ano DESC, ds_mes DESC ;");
          $revenda->execute();
          $tbrevenda = $revenda->fetchAll();

          session_start();
          $_SESSION['login-tabela'] = $email;
          $_SESSION['senha-tabela'] = $_POST['tab_senha'];
          $_SESSION['tabelapreco'] = $tbpreco;
          $_SESSION['tabelarevenda'] = $tbrevenda;


          try {
            $stmt = $conn->prepare(" INSERT INTO ci_sessions_imobiliaria ( mod_imobiliaria, date_primeiro_login, ip_address_imobiliaria ) VALUES ( :mod_imobiliaria, :data, :ip ); ");
            $stmt->bindValue(':mod_imobiliaria', $usuario[0]['cd_user_tabela']);
            $stmt->bindValue(':data', date("Y-m-d H:i:s"));
            $stmt->bindParam(':ip', $_SERVER['REMOTE_ADDR']);
            $stmt->execute();
          }catch(PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
          }

        }catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        echo 'true';
      }else{
        echo 'false';
      }

  }catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

?>