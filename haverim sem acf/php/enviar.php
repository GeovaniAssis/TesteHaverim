<?php 
  echo "sucesso";
  die();
  include ('connection.php');
  include ('envia-email.php');

  $dados['nome']     = trim($_POST['nome']);
  $dados['email']    = trim($_POST['email']);
  $dados['telefone'] = trim($_POST['telefone']);
  $dados['assunto']  = trim($_POST['assunto']);
  $dados['mensagem'] = trim($_POST['mensagem']);
  $dados['data'] = date('d/m/Y');
  $dados['hora'] = date('H:i');
  
  try{
    $sql = $conn->prepare("
        INSERT INTO tb_contato (
          nm_contato,
          ds_email,
          ds_telefone,
          ds_assunto,
          ds_mensagem,
          dt_conato,
          hr_contato
        )VALUES(
          :nome,
          :email,
          :telefone,
          :assunto,
          :mensagem,
          :data,
          :hora
        );
    ");
    $sql->bindValue( ':nome', $dados['nome'] );
    $sql->bindValue( ':email', $dados['email'] );
    $sql->bindValue( ':telefone', $dados['telefone'] );
    $sql->bindValue( ':assunto', $dados['assunto'] );
    $sql->bindValue( ':mensagem', $dados['mensagem'] );
    $sql->bindValue( ':data', $dados['data'] );
    $sql->bindValue( ':hora', $dados['hora'] );
    $sql->bindValue( ':hora', $_POST['atividade'] );
    $sql->execute();

  }catch(PDOException $Exception ) {
    throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
  }

    $body = '
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <table border="0" cellpadding="7" bgcolor="#f1f1f1" style="color:rgb(0,0,0);font-family:&quot;Times New Roman&quot;;font-size:medium" align="center">
        <tbody>
          <tr bgcolor="#f1f1f1">          
            <td>
              <font face="Verdana, Arial, Helvetica, sans-serif" size="2">
                <strong>Data:</strong>          
              </font>        
            </td>          
            <td colspan="6">
              <font face="Verdana, Arial, Helvetica, sans-serif" size="2">".$hoje."</font>        
            </td>         
          <tr bgcolor="#f1f1f1">
            
            <td>
              <font face="Verdana, Arial, Helvetica, sans-serif" size="2">
                <strong>Hora:</strong>          
              </font>        
            </td>          
            <td colspan="6">
              <font face="Verdana, Arial, Helvetica, sans-serif" size="2">".$hora."</font>        
            </td>
            
          </tr>
          
      
          <tr>
            
            <td colspan="2" align="center" bgcolor="#f88c4d" style="color:rgb(255,255,255)">
              <b>Nova mesagem:</b>        
            </td>
            
          </tr>
          
          <tr bgcolor="#f88c4d">
            
            <td>
              <font face="Arial, Helvetica, sans-serif" style="color:rgb(255,255,255)">
                <b>Nome:</b>          
              </font>        
            </td>
            
            <td bgcolor="#ffffff">
              <font face="Arial, Helvetica, sans-serif">".$Nome."</font>        
            </td>
            
          </tr>
          

          <tr bgcolor="#f88c4d">
            
            <td>
              <font face="Arial, Helvetica, sans-serif" style="color:rgb(255,255,255)">
                <b>E-mail:</b>          
              </font>        
            </td>
            
            <td bgcolor="#ffffff">
              <font face="Arial, Helvetica, sans-serif">".$email."</font>        
            </td>
            
          </tr>

          <tr bgcolor="#f88c4d">
            
            <td>
              <font face="Arial, Helvetica, sans-serif" style="color:rgb(255,255,255)">
                <b>Telefone:</b>          
              </font>        
            </td>
            
            <td bgcolor="#ffffff">
              <font face="Arial, Helvetica, sans-serif">".$telefone."</font>        
            </td>
            
          </tr>

          <tr bgcolor="#f88c4d">
            
            <td>
              <font face="Arial, Helvetica, sans-serif" style="color:rgb(255,255,255)">
                <b>Assunto:</b>          
              </font>        
            </td>
            
            <td bgcolor="#ffffff">
              <font face="Arial, Helvetica, sans-serif">".$assunto."</font>        
            </td>
            
          </tr>

          <tr bgcolor="#f88c4d">
            
            <td>
              <font face="Arial, Helvetica, sans-serif" style="color:rgb(255,255,255)">
                <b>Mensagem:</b>          
              </font>        
            </td>
            
            <td bgcolor="#ffffff">
              <font face="Arial, Helvetica, sans-serif">".$mensagem."</font>        
            </td>
            
          </tr>
          <tr bgcolor="#f1f1f1">
            
            <td colspan="2" align="center" >
              <b style="font-size: 20px;">Acesse:</b>        
            </td>
            
          </tr>
            
          <tr bgcolor="#f1f1f1">
            
            <td colspan="2" align="center">
              <a href="http://testehaverim.ga" face="Arial, Helvetica, sans-serif" style="font-size: 20px;" >TesteHaverim.ga</a>     
            </td>
            
          </tr>
        </tbody>
      </table>
    ';

    echo ( Email::enviar( $body, "Haverim", "geovaniaspe@gmail.com", 'Contato' ) );
  }
?>