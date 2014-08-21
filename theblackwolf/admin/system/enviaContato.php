<?php
include '../../conexao/conecta.inc';
$nome = htmlspecialchars(strip_tags($_POST['nome']));
$texto = htmlspecialchars(strip_tags($_POST['texto']));
$email = htmlspecialchars(strip_tags($_POST['email']));
$mensagem = htmlspecialchars(strip_tags($_POST['texto']));
	if (!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		  echo '<script type="text/javascript">alert("E-mail inválido!.");
	       alert("Email inválido.");
           location.href="../../contato.php"
</script>';
	  exit ();		
	} elseif
		(!filter_var($email, FILTER_SANITIZE_EMAIL))
		{
       echo '<script type="text/javascript">alert("E-mail inválido!. Contém caracteres não permitidos.");
	   alert("Email inválido.");
       location.href="../../contato.php"
</script>';
		exit ();		
	}
	if ($nome != '' && $email != '' && $texto != '')
	{
		$msg  = "<strong>Nome:</strong> $nome<br>";
		$msg .= "<strong>E-mail:</strong> $email<br>";
		$msg .= "<strong>Mensagem:</strong> $mensagem<br>";
		$recipient = "igor_1917@hotmail.com";
		$subject = "Theblackwolf";
		$header = "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		$header .= "From: $email\r\n";
	if (mail($recipient, $subject, $msg, $header))
		{
        $query = mysql_query("INSERT INTO contato (NOME_CLIENTE,EMAIL_CLIENTE,MENSAGEM_CLIENTE) VALUES('$nome','$email','$mensagem')");
	if($query){
	echo '<script language="Javascript">
	alert("Contato enviado obrigado por sua Colaboracão.");
location.href="../../contato.php"
</script>';
	exit ();	
	}	
	}else {
		  echo '<script type="text/javascript">alert("Nós lamentamos mas não foi possivel Enviar o Contato.");
	       alert("Email inválido.");
           location.href="../../contato.php"
</script>';
	exit ();		
		}
	}else{
		  echo '<script type="text/javascript">alert("Por favor Preecha todos os campos.");
	       alert("Email inválido.");
           location.href="../../contato.php"
</script>';
	exit ();		
	}
 
 
 
 