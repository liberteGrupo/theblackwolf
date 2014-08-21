<?php

include '../../conexao/conecta.inc';

$nome  = htmlspecialchars(strip_tags($_POST['nome']));
$email = htmlspecialchars(strip_tags($_POST['email']));
$token = md5(uniqid().time()); 
	if (!filter_var($email,FILTER_VALIDATE_EMAIL))
	{ 
           echo '<script type="text/javascript">alert("E-mail inválido!.");
	   alert("Email inválido.");
           location.href="../../index.php"
</script>';
          exit ();		
	} elseif
		(!filter_var($email, FILTER_SANITIZE_EMAIL))
		{
       echo '<script type="text/javascript">alert("E-mail inválido!. Contém caracteres não permitidos.");
	    alert("Email inválido.");
            location.href="../../index.php"
</script>';
		exit ();		
	}
	if ($nome != '' && $email != '')
	{
		$link     = 'theblackwolf.hol.es';
		echo      '<meta charset="UTF-8">';
		$urlBase  = 'htpp://theblackwolf.hol.es/';
		$link     = $urlBase.'confirm.php?token='.$token;
                $link2     = $urlBase.'cancel.php?token='.$token;
                $msg      = "<strong>Nome:</strong> $nome <br>";
		$msg     .= "<strong>E-mail:</strong> $email <br>";
		$msg     .= "<strong>Mensagem:</strong> Você assinou a newsletter do site Theblackwolf e Voce receberá notificacoes quanto a promocões e ofertas  <br>";
                $msg     .= "Para confirmar seu cadastro clique aqui ".$link." <br>";
                $msg     .= "<strong>Importante:</strong> se não quiser que enviemos notificações clique aqui ".$link2." <br></strong> - Mensagem enviada em <strong>".date('d:m:Y H:i')."</strong>";
		$recipient= $email;
		$subject  = "Theblackwolf";
		$header   = "MIME-Version: 1.0\r\n";
		$header  .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		$header  .= "From: igor_1917@hotmail.com\r\n";
		if(mail($recipient, $subject, $msg, $header))
		{
        $query = mysql_query("INSERT INTO newsletter (NOME_CLIENTE,EMAIL_CLIENTE,TOKEN,STATUS) VALUES('$nome','$email','$token','0')");
	echo '<script language="Javascript">
	alert("Newsletter cadastrado agora verifique no seu email para confirmar o cadastro!.");
location.href="../../index.php"
</script>';
                }
		}
		 else {
		  echo '<script type="text/javascript">alert("Nós lamentamos mas não foi possivel Enviar o Contato.");
	       alert("Email inválido.");
           location.href="../../index.php"
</script>';
		exit ();		
		}



