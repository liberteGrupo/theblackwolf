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
   
function  validaAdm($link)
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
    $email         = isset($_SESSION['email'])?$_SESSION['email']:null;
    $senha         = isset($_SESSION['senha'])?$_SESSION['senha']:null;

   // $nomeUsuario = isset($_SESSION['nomeUsuario'])?$_SESSION['nomeUsuario']:null;
    $query         =  "SELECT * FROM  admin  WHERE EMAIL_ADMIN ='$email'";
    $acao          = mysql_query($query);
    $usuarios      = mysql_fetch_array($acao);
    $senhaUsuario  = $usuarios['SENHA_ADMIN'];
    $emailUsuarios = $usuarios['EMAIL_ADMIN'];
    if($email !== $emailUsuarios){
            session_destroy();
            echo '<script> 
            alert ("Acesso negado para o email de usuario invalido");
            location.href="'.$link.'"   
</script>'; 
       }elseif($senha != $senhaUsuario)
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
	 require '../admin/system/phpmailer/class.phpmailer.php';
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
         $email->Send();
}    
 
function verificaEmail($email){
    include_once '../conexao/conecta.inc';
    $verifica    = mysql_query("SELECT * FROM cliente WHERE EMAIL_CLIENTE =  '$email'");
    return (mysql_num_rows($verifica) == 1) ? mysql_fetch_object($verifica): false;
}
function cadastraCliente(){
    if(isset($_POST['cadastrar'])){
$nome        = mysql_real_escape_string(strip_tags(trim($_POST["nome"])));
$email       = mysql_real_escape_string(strip_tags(trim($_POST["email"])));
$tel         = mysql_real_escape_string(strip_tags(trim($_POST["telefone"])));
$cel         = mysql_real_escape_string(strip_tags(trim($_POST["celular"])));
$endereco    = mysql_real_escape_string(strip_tags(trim($_POST["endereco"])));
$cidade      = mysql_real_escape_string(strip_tags(trim($_POST["cidade"])));
$estado      = mysql_real_escape_string(strip_tags(trim($_POST["estado"])));
$bairro      = mysql_real_escape_string(strip_tags(trim($_POST["bairro"])));
$senha       = mysql_real_escape_string(strip_tags(trim($_POST["senha"])));
$whirlpool   = hash('whirlpool', $senha);
$numero      = mysql_real_escape_string(strip_tags(trim($_POST["numero"])));
$cep         = mysql_real_escape_string(strip_tags(trim($_POST["cep"])));
$cpf         = mysql_real_escape_string(strip_tags(trim($_POST["cpf"])));
$tipoCliente = 'RES';
$query = "INSERT INTO endereco (CIDADE,ESTADO,BAIRRO,ENDERECO,NUMERO,CEP,TELEFONE,CELULAR) VALUES ('$cidade','$estado','$bairro','$endereco','$numero','$cep','$tel','$cel')";
if(mysql_query($query))
{
$id       = mysql_insert_id();
$consulta = mysql_query("INSERT INTO cliente (ID_ENDERECO,NOME_CLIENTE,EMAIL_CLIENTE,SENHA_CLIENTE,TIPO_CLIENTE,CPF_CLIENTE)VALUES ('$id','$nome','$email','$whirlpool','$tipoCliente','$cpf')");
}
if($consulta){
  
  echo '<script>
  alert("Seu cadastro foi efetuado com Sucesso!")
  location.href="autentica_usuario.php"
       </script>';
  include '../funcoes/logRegistros.php';
  $mensagem = "Novo Cadastro realizado no site";
  salvaLog($mensagem);
  echo mysql_error();
}else{
    echo '<script>
   ert("Não  foi  possivel registrar seu  cadastro !")
    location.href="frmCadastro.php"
     </script>';
            echo mysql_error();
}
    }

}