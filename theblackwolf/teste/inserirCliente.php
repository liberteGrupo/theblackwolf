
<?php
include '../conexao/conecta.inc';
$nome= mysql_real_escape_string(strip_tags(trim($_POST["nome"])));
$email= mysql_real_escape_string(strip_tags(trim($_POST["email"])));
$tel= mysql_real_escape_string(strip_tags(trim($_POST["email"])));
$cel= mysql_real_escape_string(strip_tags(trim($_POST["celular"])));
$endereco= mysql_real_escape_string(strip_tags(trim($_POST["endereco"])));
$cidade= mysql_real_escape_string(strip_tags(trim($_POST["cidade"])));
$estado= mysql_real_escape_string(strip_tags(trim($_POST["estado"])));
$bairro = mysql_real_escape_string(strip_tags(trim($_POST["bairro"])));
$senha= mysql_real_escape_string(strip_tags(trim($_POST["senha"])));
//$hash = Bcrypt::hash($senha);
$numero = mysql_real_escape_string(strip_tags(trim($_POST["numero"])));
$cep = mysql_real_escape_string(strip_tags(trim($_POST["cep"])));
$cpf = mysql_real_escape_string(strip_tags(trim($_POST["cpf"])));
$tipoCliente = 'RES';
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
	if ($nome != '' && $email != '' && $senha != '')
	{
		$url  = 'theblackwolf.hol.es/admin/dashboard';
		$msg  = "<strong>Nome:</strong> $nome<br>";
		$msg .= "<strong>E-mail:</strong> $email<br>";
		$msg .= "<strong>Mensagem:</strong> $mensagem<br>";
		$msg .= "<strong>Olá seu cadastro está quase finalizado agora clique a aqui pra confirmar<br>".$url;
		$recipient = "igor_1917@hotmail.com";
		$subject = "Theblackwolf";
		$header = "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		$header .= "From: $email\r\n";
		if (mail($recipient, $subject, $msg, $header))
		{
$query = "INSERT INTO endereco (CIDADE,ESTADO,BAIRRO,ENDERECO,NUMERO,CEP,TELEFONE,CELULAR) VALUES ('$cidade','$estado','$bairro','$endereco','$numero','$cep','$tel','$cel')";
if(mysql_query($query))
{
$id = mysql_insert_id();
$consulta =mysql_query("INSERT INTO cliente (ID_ENDERECO,NOME_CLIENTE,EMAIL_CLIENTE,SENHA_CLIENTE,TIPO_CLIENTE,CPF_CLIENTE)VALUES ('$id','$nome','$email','$senha','$tipoCliente','$cpf')");
}
	if($query){
	 echo '<script language="Javascript">
	alert("Seu cadastro está quase finalizado agora verifique o seu email enviado obrigado por sua Colaboracão.");
</script>';
		exit ();	
	}	
		} else {
		  echo '<script type="text/javascript">alert("Nós lamentamos mas não foi possivel Enviar o Contato.");
	       alert("Email inválido.");
   
</script>';
		exit ();		
		}
	} else{
		  echo '<script type="text/javascript">alert("Por favor Preecha todos os campos.");
	       alert("Email inválido.");
 
</script>';
		exit ();		
	}
 
 
 
 