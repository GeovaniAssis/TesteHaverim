<?php
  require_once 'connection.php';
  include ('envia-email.php');
  $conn = Database::conexao();

  $nome           = $_POST['nome'];
  $email          = $_POST['email'];
  $telefone       = $_POST['telefone'];
  $celular        = $_POST['celular'];
  $bairro         = $_POST['bairro'];
  $empreendimento = $_POST['empreendimento'];
  $renda          = 'R$ '.$_POST['renda'].',00';
  $nascimento     = implode("/",array_reverse(explode("-", $_POST['nascimento'])));
  if( $_POST['servidor'] ){ 
    $servidor     = "1";
    $txtservidor  = "Sim";
  }else{
    $servidor     = "0";
    $txtservidor  = "Não";
  }
  if( $_POST['fgts'] ){
    $fgts         = "1";
    $txtfgts      =  "Sim";
  }else{
    $fgts         = "0"; 
    $txtfgts      = "Não";
  }
  if( $_POST['dependentes'] ){ 
    $dependentes  = "1";
    $txtdependentes =  "Sim";
  }else{ 
    $dependentes  = "0";
    $txtdependentes =  "Não";
  }
  $data         = date("d/m/Y");
  $hora         = date('H:i');
  $datahora     = $data." ".$hora;
  $ip           = $_SERVER['REMOTE_ADDR'];


  try {

      $stmt = $conn->prepare(" INSERT INTO tb_pre_avaliacao ( nm_contato, ds_email, ds_telefone, ds_celular, ds_bairro, ds_empreendimento, vl_renda, dt_nascimento, ic_servidor, ic_fgts, ic_dependentes, dt_contato, hr_contato, cd_ip ) VALUES ( :nome, :email, :telefone, :celular, :bairro, :empreendimento, :renda, :nascimento, :servidor, :fgts, :dependentes, :data, :hora, :ip ); ");
      $stmt->bindValue(':nome', $nome);
      $stmt->bindValue(':email', $email);
      $stmt->bindParam(':telefone', $telefone);
      $stmt->bindParam(':celular', $celular);
      $stmt->bindParam(':bairro', $bairro);    
      $stmt->bindParam(':empreendimento', $empreendimento);
      $stmt->bindParam(':renda', $renda);
      $stmt->bindParam(':nascimento', $nascimento);
      $stmt->bindParam(':servidor', $servidor);
      $stmt->bindParam(':fgts', $fgts);    
      $stmt->bindParam(':dependentes', $dependentes);
      $stmt->bindParam(':data', $data);
      $stmt->bindParam(':hora', $hora);
      $stmt->bindParam(':ip', $ip);   
      $stmt->execute();

      $gid = $conn->prepare(" SELECT MAX(cd_avaliacao) FROM tb_pre_avaliacao; ");
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
                <font face='Verdana, Arial, Helvetica, sans-serif' style='color: #fff;' size='2'>".$data."</font>
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
                <b style='color: #50baea; font-size: 20px;'>Pré-Avaliação</b>
              </td>
            </tr>

            <tr bgcolor='#50baea'>
              <td>
                <font face= 'Arial, Helvetica, sans-serif'>
                  <b style='color: #fff;'>Nome:</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif' style='color: #fff;'>".$nome."</font>
              </td>
            </tr>

            <tr>
              <td>
                <font face= 'Arial, Helvetica, sans-serif'>
                  <b>E-mail:</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif'>".$email."</font>
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
                <font face= 'Arial, Helvetica, sans-serif'>".$celular."</font>
              </td>
            </tr> 

            <tr bgcolor='#50baea'>
              <td>
                <font face= 'Arial, Helvetica, sans-serif'>
                  <b style='color: #fff;'>Bairro desejado:</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif' style='color: #fff;'>".$bairro."</font>
              </td>
            </tr> 

            <tr>
              <td>
                <font face= 'Arial, Helvetica, sans-serif'>
                  <b>Empreendimento:</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif'>".$empreendimento."</font>
              </td>
            </tr>  

            <tr bgcolor='#50baea'>
              <td>
                <font face= 'Arial, Helvetica, sans-serif'>
                  <b style='color: #fff;'>Renda bruta:</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif' style='color: #fff;'>".$renda."</font>
              </td>
            </tr> 

            <tr>
              <td>
                <font face= 'Arial, Helvetica, sans-serif'>
                  <b>Data de nascimento:</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif'>".$nascimento."</font>
              </td>
            </tr>  

            <tr bgcolor='#50baea'>
              <td>
                <font face= 'Arial, Helvetica, sans-serif'>
                  <b style='color: #fff;'>É servidor público?</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif' style='color: #fff;'>".$txtservidor."</font>
              </td>
            </tr> 

            <tr>
              <td>
                <font face= 'Arial, Helvetica, sans-serif'>
                  <b>Possui mínimo de 3 anos de FGTS?</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif'>".$txtfgts."</font>
              </td>
            </tr>  

            <tr bgcolor='#50baea'>
              <td>
                <font face= 'Arial, Helvetica, sans-serif'>
                  <b style='color: #fff;'>Possui dependentes?</b>
                </font>
              </td>

              <td>
                <font face= 'Arial, Helvetica, sans-serif' style='color: #fff;'>".$txtdependentes."</font>
              </td>
            </tr> 
          
          </table>";

        echo ( Email::enviar( $body, $nome, $email, $getid, 'Pré-Avaliação' ));
      }    

  }catch(PDOException $e) {
      echo 'Houve um erro no sistema, por favor tente mais tarde.';
  }

?>