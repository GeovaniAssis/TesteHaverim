<?php
  require_once 'connection.php';
  include ('envia-email.php');
  $conn = Database::conexao();

  if( $_POST['telefone'] ){ $telefone = $_POST['telefone']; }else{ $telefone = "Não informado"; }

      $creci        = $_POST['creci'];
      $imobiliaria  = $_POST['imobiliaria'];
      $telefone     = $_POST['telefone'];
      $cnpj         = $_POST['cnpj'];
      $responsavel  = $_POST['responsavel'];
      $endereco     = $_POST['endereco'];
      $numero       = $_POST['numero'];
      $bairro       = $_POST['bairro'];
      $cidade       = $_POST['cidade'];
      $estado       = $_POST['estado'];
      $email        = $_POST['email'];
      $senha        = $_POST['senha'];
      $senhamd5     = md5($_POST['senha']);

      $data         = date("d/m/Y");
      $hora         = date('H:i');
      $datahora     = $data." ".$hora;
      $ip           = $_SERVER['REMOTE_ADDR'];

  try {
    $verificar = $conn->prepare("SELECT * FROM tb_user_tabela WHERE nm_email = :email ;");
    $verificar->bindParam(':email', $email);
    $verificar->execute();
    $usuario = $verificar->fetchAll();
    if ($usuario) {
      echo 'E-mail já cadastrado.';
    }else{
      $stmt = $conn->prepare(" INSERT INTO tb_user_tabela ( dt_criacao, cd_ip, ds_creci, nm_imobiliaria, ds_telefone, ds_cnpj, nm_responsavel, nm_endereco, nm_numero, nm_bairro, nm_cidade, nm_estado, nm_email, nm_senha, ds_perfil, user_treinamento_imobiliaria,   eficacia_treinamento_imobiliaria ) VALUES ( :datahora, :ip, :creci, :imobiliaria, :telefone, :cnpj, :responsavel, :endereco, :numero, :bairro, :cidade, :estado, :email, :senha, 0, 1, 0 ); ");
      $stmt->bindValue(':datahora', $datahora);
      $stmt->bindValue(':ip', $ip);
      $stmt->bindParam(':creci', $creci);
      $stmt->bindParam(':imobiliaria', $imobiliaria);
      $stmt->bindParam(':telefone', $telefone);    
      $stmt->bindParam(':cnpj', $cnpj);
      $stmt->bindParam(':responsavel', $responsavel);
      $stmt->bindParam(':endereco', $endereco);
      $stmt->bindParam(':numero', $numero);
      $stmt->bindParam(':bairro', $bairro);    
      $stmt->bindParam(':cidade', $cidade);
      $stmt->bindParam(':estado', $estado);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':senha', $senhamd5);      
      $stmt->execute();
      
      echo 'true';
    }

  }catch(PDOException $e) {
      echo 'Houve um erro no sistema, por favor tente mais tarde.';
  }

?>