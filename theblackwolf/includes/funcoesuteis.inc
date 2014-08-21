<?php
echo '<meta charset=utf-8>';
function gravaDados($arquivo){
  if($arquivo ===  'funcoes/sucessoLogin.txt'):
    date_default_timezone_set("BRAZIL/EAST");
    $ip = $_SERVER['REMOTE_ADDR'];
    $data = date('d:m:y h:i:s');
    $str = 'O administrador logou com sucesso como IP :!'.$ip.'na data'.$data;
else:
    $ip = $_SERVER['REMOTE_ADDR'];
    $data = date('d:m:y h:i:s');
    $str = 'O administrador logou com sucesso como IP :!'.$ip.'na data'.$data;
    endif;
  if (file_exists($arquivo)):
    $file = fopen($arquivo,'a');
    if ($file):
    fputs($file,$str);
    endif;
endif;
}
function  validaAutenticacao($tipoUser,$link)
{
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['senha']))
    {
     session_destroy();
    echo '<script> 
         alert ("Voce não efetuou o login");
         location.href="'.$link.'"   
</script>';
     
}  else {
/* fazer validadacao para que usuarios x nao entre em  ambiente de usuario y */
    if($tipoUser == 'RES'){
        include_once 'conexao/conecta.inc';
    }else{
        include_once '../conexao/conecta.inc';
    }
    $email =isset($_SESSION['email'])?$_SESSION['email']:null;
    $senha = isset($_SESSION['senha'])?$_SESSION['senha']:null;
   // $nomeUsuario = isset($_SESSION['nomeUsuario'])?$_SESSION['nomeUsuario']:null;
    $query =  "SELECT * FROM  cliente WHERE EMAIL_CLIENTE='$email'";
    $acao = mysql_query($query);
    $usuarios = mysql_fetch_array($acao);
    $senhaUsuario =  $usuarios['SENHA_CLIENTE'];
    $emailUsuarios =  $usuarios['EMAIL_CLIENTE'];
    $tipoUsuario   =  $usuarios['TIPO_CLIENTE'];
   if($tipoUsuario  !== $tipoUser){
       session_destroy();
          echo '<script> 
          alert("Acesso negado para o seu tipo de usuario");
          location.href="'.$link.'"   
</script>';
      /// echo "<a href=$link> Acesso Negado para seu tipo de usuario </a>";  
        }elseif($email !== $emailUsuarios){
            session_destroy();
              echo '<script> 
         alert ("Acesso negado para o email de usuario invalido");
         location.href="'.$link.'"   
</script>'; 
        }elseif($senha !== $senhaUsuario)
            {
            session_destroy();
                  echo '<script> 
         alert ("Acesso negado senha incorreta!");
         location.href="'.$link.'"   
</script>';
           
           }
        }
   }
   
function  validaAdm($tipoUser,$link)
{
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['senha']))
    {
     session_destroy();
    echo '<script> 
         alert ("Voce não efetuou o login");
         location.href="'.$link.'"   
</script>';
     
}  else {
/* fazer validadacao para que usuarios x nao entre em  ambiente de usuario y */
    include_once '../conexao/conecta.inc';
    $email         =  isset($_SESSION['email'])?$_SESSION['email']:null;
    $senha         = isset($_SESSION['senha'])?$_SESSION['senha']:null;
   // $nomeUsuario = isset($_SESSION['nomeUsuario'])?$_SESSION['nomeUsuario']:null;
    $query         =  "SELECT * FROM  admin  WHERE EMAIL_ADMIN ='$email'";
    $acao          = mysql_query($query);
    $usuarios      = mysql_fetch_array($acao);
    $senhaUsuario  = $usuarios['SENHA_ADMIN'];
    $emailUsuarios = $usuarios['EMAIL_ADMIN'];
    $tipoUsuario   = $usuarios['TIPO_USUARIO'];
    if($email !== $emailUsuarios){
            session_destroy();
            echo '<script> 
            alert ("Acesso negado para o email de usuario invalido");
            location.href="'.$link.'"   
</script>'; 
       }elseif($senha !== $senhaUsuario)
           {
            session_destroy();
                  echo '<script> 
         alert ("Acesso negado senha incorreta!");
         location.href="'.$link.'"   
</script>';
           
           }
        }
   }
     
 function enviaEmail($email,$id){
	 require_once '../admin/system/phpmailer/class.phpmailer.php';
	 $email = new PHPMailer();
	 //dados 
         $host              = 'smtp.gmail.com';
         $email->CharSet    = "UTF-8";
         $email->SMTPSecure = 'ssl';
         $email->isSMTP();
         //servidor
         $email->Host       = $host;
	 $email->SMTPAuth   = true;
	 $email->Username   = 'igorribeirosobral@gmail.com';
	 $email->Password   = 'Nokialumia';
	 $email->Port       = 465;
	 //Remetente 
         $email->SetFrom    = 'tccliberte@theblackwolf.hol.es';
         $email->From       = 'tccliberte@theblackwolf.hol.es';
         $email->FromName   = 'Theblackwolf ecommerce';
         //destino 
         $email->AddAddress($email);
         //dados da mensagem
         $email->isHTML(true);
         $email->Wordwrap   = 70;
         //mensagem
         $email->Subject    = 'Recupera Senhar';
         $email->Body       = 'Você pediu para recuperar a senha do site theblackwolf.hol.es';
         $email->Body      .= 'Clique no link a abaixo para redefi-la';
         $email->Body      .= '<a href="htttp://localhost/theblackwolf/redefine.php?id='.$id.'">Redefinir Senha</a>';
         
         if($email->Send()){
             return true;
         }else
         {
             return false;
         }
         
}    
     
function verificaEmail($email){
    $verifica    = mysql_query("SELECT * FROM cliente WHERE EMAIL_CLIENTE =  '$email'");
    return (mysql_num_rows($verifica) == 1) ? mysql_fetch_object($verifica): false;
}