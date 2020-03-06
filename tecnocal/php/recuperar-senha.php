<?php

  require_once 'connection.php';
  include ('envia-email.php');

  /*
   *  Função para gerar senhas aleatórias
   * 
   *  @param integer $tamanho Tamanho da senha a ser gerada
   *  @param boolean $maiusculas Se terá letras maiúsculas
   *  @param boolean $numeros Se terá números
   *  @param boolean $simbolos Se terá símbolos
   * 
   *  @return string A senha gerada
   */
  function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){

      $lmin = 'abcdefghijklmnopqrstuvwxyz';
      $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $num = '1234567890';
      $simb = '!@#$%*-';
      $retorno = '';
      $caracteres = '';

      $caracteres .= $lmin;
      if ($maiusculas) $caracteres .= $lmai;
      if ($numeros) $caracteres .= $num;
      if ($simbolos) $caracteres .= $simb;

      $len = strlen($caracteres);
      for ($n = 1; $n <= $tamanho; $n++) {
          $rand = mt_rand(1, $len);
          $retorno .= $caracteres[$rand-1];
      }
      return $retorno;
  }

  $conn = Database::conexao();
  $email = ($_POST['rec_email']);
  $senha = geraSenha(6, false, true); 
  $senhamd5 = md5($senha); 

  try {

    $verificar = $conn->prepare("SELECT * FROM tb_user_tabela WHERE nm_email = :email ;");
    $verificar->bindParam(':email', $email);
    $verificar->execute();
    $usuario = $verificar->fetchAll();

    if ($usuario) {

      $trocar_senha = $conn->prepare("UPDATE tb_user_tabela SET nm_senha = :senha WHERE nm_email = :email ;");
      $trocar_senha->bindParam(':email', $email);
      $trocar_senha->bindParam(':senha', $senhamd5);
      $trocar_senha->execute();

      $cd = $usuario[0]['cd_user_tabela'];
      $responsavel = $usuario[0]['nm_responsavel'];
      $hoje = date("d/m/Y");
      $hora = date('H:i');

      $body = "
        <table border=0 cellpadding='7' bgcolor='#fff'>

          <tr bgcolor='#50baea'>
            <td>
              <font face='Verdana, Arial, Helvetica, sans-serif' size='2'>
                <strong style='color: #fff;'>Data:</strong>
              </font>
            </td>

            <td colspan='6'>
              <font face='Verdana, Arial, Helvetica, sans-serif' style='color: #fff;' size='2'>".$hoje."</font>
            </td>
          </tr>

          <tr bgcolor='#F8F8F8'>
            <td>
              <font face='Verdana, Arial, Helvetica, sans-serif' size='2'>
                <strong>Hora:</strong>
              </font>
            </td>

            <td colspan='6'>
              <font face='Verdana, Arial, Helvetica, sans-serif' size='2'>".$hora."</font>
            </td>
          </tr>

          <tr>
            <td colspan=2 align=center>
              <b style='color: #50baea; font-size: 20px;'>Recuperar Senha</b>
            </td>
          </tr>

          <tr bgcolor='#50baea'>
            <td>
              <font face= 'Arial, Helvetica, sans-serif'>
                <b style='color: #fff;'>Nova Senha:</b>
              </font>
            </td>

            <td>
              <font face= 'Arial, Helvetica, sans-serif' style='color: #fff;'>".$senha."</font>
            </td>
          </tr>
       
        </table>";

      echo ( Email::enviar( $body, $responsavel, $email, $cd,'Recuperar Senha' ));

    }else{
      echo 'false';
    }

  }catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
  }

?>