<?php
include 'conn.php';
//Envia E-mails
/* @var $toName type */
function EnviaNewletter(){
if(isset($_POST['envia'])){
$conteudo = mysql_real_escape_string(strip_tags(trim($_POST['conteudo'])));
$mensagem =  mysql_real_escape_string(trim(($_POST['mensagem'])));
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
     $urlBase     = 'htpp://localhost/theblackwolf';
     $link        = $urlBase . 'cancel.php?token=' . $usuario['TOKEN'];
     $mensagem   .= "Para não receber mais nosso emails clique aqui" . $urlBase.$data;
     $enviarEmail = SendEmail($conteudo, $mensagem, $usuario['EMAIL_CLIENTE'], $usuario['NOME_CLIENTE']);
     $pop[$usuario['EMAIL_CLIENTE']] = $enviarEmail;
     var_dump($pop);
                }
            }
     if(!is_array($pop))
        {  
         
        }else
           foreach($pop as $usuario){
               echo 'Deu ceerto';
            }
      }
  }
}
function RegisterNews(){
    if(isset($_POST['cadastrar'])){ 
          $nome  = mysql_escape_string(strip_tags(trim($_POST["nome"])));
          $email = mysql_real_escape_string(strip_tags(trim($_POST["email"])));
          $token = md5(uniqid().time()); 
          if(empty($_POST['nome'])){
               echo '<script language="Javascript">
                   alert("Digite um Nome");
location.href="frmNews.php"
</script>';
          }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
               echo '<script language="Javascript">
                   alert("Informe um Email válido!");
location.href="frmNews.php"
</script>';
          }else{
               $query = "SELECT * FROM newsletter WHERE EMAIL_CLIENTE= '$email' ";
               $result = mysql_query($query);
               if(mysql_num_rows($result) === 1){
                       echo '<script language="Javascript">
                   alert("Email Já cadastrado!");
location.href="frmNews.php"
</script>';
           }else{ 
               $query  = "INSERT INTO newsletter (NOME_CLIENTE,EMAIL_CLIENTE,TOKEN) VALUES('$nome','$email','$token')";
               $result = mysql_query($query);
               if(!$result){
  echo '<script language="Javascript">
       alert("Desculpe ocorreu um erro!");
location.href="frmNews.php"
</script>';
           }else{
               $site = 'TheblackWolf';
               $url = 'http://theblackwolf.hol.es/'.'confirm.php?token='.$token;
               $subject ="Confirmar inscração de newsletter";
               $message = '<h2>Confirmar Cadastro</h2><p>Olá <strong>'.$nome.'</strong>, recebemos uma <strong>solicitação de cadastro</strong> sua em nosso boletim de notícias.</p><p><strong>'.$nome.'</strong>,'
                . ' por favor, clique no link abaixo para confirmar seu cadastro!'
                . '</p><hr><a href="'.$url.'" target="_blank" title="Confirmar Cadastro">Confirmar Cadastro</a><hr><p><strong>'.$nome.'</strong>, se você não realizou este pedido,'
                . ' por favor desconsidere esta mensagem.</p> Atenciosamente <strong>'.$site.'</strong> - Mensagem enviada em <strong>'.date('d:m:Y H:i').'</strong>';
               $send = mail($subject,$message,$email,$nome);
                if($send){
                       echo '<script language="Javascript">
                   alert("Cadastro de efetuado com sucesso!");
</script>';  
                }else{
                       echo '<script language="Javascript">
                   alert("Cadastro Não foi efetuado!");
</script>';  
                     }
                   }         
                 }
               }
             }
           }
function SendEmail($subject,$message,$to,$toName){
	 require_once 'phpmailer/class.phpmailer.php';
	 $email = new PHPMailer();
	 //dados 
   $host                    = 'mx1.hostinger.com.br';
   $userName                = 'tccliberte@theblackwolf.hol.es';
   $password                = 'adminemail';
         //servidor      
	 $email->isSMTP();      
	 $email->Host             = MAIL_HOST;
	 $email->SMTPAuth         = true;
	 $email->Username         = MAIL_USER;
	 $email->Password         = MAIL_PASS;
   $email->Port             = MAIL_PORT;
 	 $email->SMTPSecure       = false;
	 //Remetente 
   $email->SetFrom          = MAIL_USER;
   $email->FromName         = 'Theblackwolf ecommerce';
   //destino       
   $email->addAddress(      $to,$toName);
   //dados da mensagem      
   $email->isHTML(true      );
   $email->Chatrset         = 'utf-8';
   $email->Wordwrap         = 70;
   //mensagem      
   $email->Subject          = $subject;
   $email->Body             = $message;
   $email->AltBody          = strip_tags($message);
   return $email->Send(); 
        
}
function logar(){
if(isset($_POST['enviar'])){
if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']))) {
	header("Location:frmLogin.php"); 
        exit;
}
//conexao com o servidor
include '../conexao/conecta.inc';
$usuario = strip_tags(trim($_POST['usuario']));
$senha   = strip_tags(trim($_POST['senha']));
$whirlpol= hash('whirlpool', $senha);
// Validação do usuário/senha digitados
$sql     = "SELECT * FROM admin WHERE (EMAIL_ADMIN = '". $usuario ."') ";
$query   = mysql_query($sql);
if (mysql_num_rows($query) === 0){
	// Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
	echo '<script language="Javascript">
	alert("Usuario Não encontrado!");
location.href="frmLogin.php"
</script>';
        exit;
}else{
	// Salva os dados encontados na variável $resultado
	$resultado = mysql_fetch_array($query);
	// Se a sessão não existir, inicia uma
  $senhaAdmin  = $resultado['SENHA_ADMIN'];
if($whirlpol !== $senhaAdmin){
echo '<script language="Javascript">
  alert("Senha Incorreta!");
location.href="frmLogin.php"
</script>';
}
else{
	if (!isset($_SESSION))
  {
  session_start();
	// Salva os dados encontrados na sessão
	$_SESSION['UsuarioEmail'] = $resultado['EMAIL_ADMIN'];
	$_SESSION['UsuarioNivel'] = $resultado['NIVEL'];
  $_SESSION['email']        = $usuario;
  $_SESSION['senha']        = $whirlpol;
  $_SESSION['nomeUsuario']  = $resultado['NOME_ADMIN'];
  $_SESSION['cod_usuario']  = $resultado['ID_ADMIN'];
	// Redireciona o visitante
  echo '<script language="Javascript">
location.href="index.php"
</script>';
        exit;
}
}
}
}
}

