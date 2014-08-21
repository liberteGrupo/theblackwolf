<?php
if(isset($_POST['enviar'])){
$conteudo = mysql_real_escape_string(strip_tags(trim($_POST['conteudo'])));
$mensagem = mysql_real_escape_string(trim(($_POST['mensagem'])));
if(empty($conteudo)){
     $pop = "Informe o assunto da mensagem";
}elseif (empty($mensagem)) {
     $pop = "Informe o conteúdo da mensagem";	
}else
{
     $query  ="SELECT * FROM newsletter WHERE STATUS = true";
     $result = MySQLQuery($query);
if (mysql_num_rows($result) === 1) {
                echo "Nenhum inscrito Cadastrado";
}else {
   while($usuario = mysql_fetch_assoc($result)) {
     $data        = date('d/m/y H:i');
     $urlBase     = 'htpp://theblackwolf.hol.es/';
     $link        = $urlBase .'cancel.php?token=' .$usuario['TOKEN'];
     $mensagem   .= "Para não receber mais nosso emails clique aqui" . $urlBase.$data;
     $header      = "MIME-Version: 1.0\r\n";
     $header     .= "Content-Type: text/html; charset=iso-8859-1\r\n";
     $header     .= "From: igor_1917@hotmail.com\r\n";
     $enviarEmail = mail($usuario['EMAIL_CLIENTE'], $usuario['NOME_CLIENTE'], $mensagem, $header);
     $pop[$usuario['EMAIL_CLIENTE']] = $enviarEmail;
     var_dump($pop);
                }
            }
     if(!is_array($pop))
        {  
   
        }else
           foreach($pop as $usuario){
          }
      }
  }

