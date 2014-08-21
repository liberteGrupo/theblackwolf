<?php
echo '<meta charset=utf-8>';
include_once 'conexao/conecta.inc';
include 'includes/funcoesuteis.inc';
session_start();
if(isset($_POST['email']) and isset($_POST['senha']))
    {
    $email = $_POST['email'] ;
    $senha = $_POST['senha'] ;
    
 //echo $email,$senha;
$query = "SELECT * FROM cliente  WHERE EMAIL_CLIENTE = '$email' ";
//$query_type = "SELECT * FROM tipo_usuario WHERE TIPO_USUARIO ='$tipoUsuario'"
$result= mysql_query($query);
$totalUsuario = mysql_num_rows($result);
if($totalUsuario === 0){
    echo '<script language="Javascript">
location.href="userError.php"
</script>';
}  else {
$array = mysql_fetch_array($result);
$senhaUsuario = $array['SENHA_CLIENTE'];
$tipoUsuario = $array['TIPO_CLIENTE'];/*EU ALTEREI O CAMPO TIPO USUARIO*/
$whirlpool = hash('whirlpool', $senha);
if($whirlpool !== $senhaUsuario){
 echo '<script language="Javascript">
location.href="userPass.php"
</script>';
}else{
    //aqui esta tudo certo tanto no email quanto a senha 
    $_SESSION['email']  = $email;
    $_SESSION['senha'] =  $whirlpool;
    $_SESSION['nomeUsuario']= $array['NOME_CLIENTE'];
    $_SESSION['cod_usuario'] = $array['ID_CLIENTE'];
     $cod_usuario = $array['ID_CLIENTE'];
    mysql_close();
    if($tipoUsuario === 'RES'){
    echo '<script language="Javascript">
location.href="home.php"
</script>';
      }elseif($tipoUsuario === 'ADM'){
          echo '<script language="Javascript">
location.href="admin/index.php"
</script>';
          gravarDados("../funcoes/sucessoLogin.txt");
          return true;
      }else{
          session_destroy();
           echo '<script language="Javascript">
location.href="userError.php"
</script>';
           }
         }
       }
}else{
  echo '<script language="Javascript">
location.href="autentica_usuario.php"
</script>';
   
}

