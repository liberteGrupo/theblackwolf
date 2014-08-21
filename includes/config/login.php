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
$query = "SELECT * FROM admin WHERE EMAIL_CLIENTE = '$email' ";
//$query_type = "SELECT * FROM tipo_usuario WHERE TIPO_USUARIO ='$tipoUsuario'"
$result= mysql_query($query);
$numAdm = mysql_num_rows($result);
if($numAdm === 0){
    echo '<script language="Javascript">
location.href="userError.php"
</script>';
}else {
$adm = mysql_fetch_array($result);
$senhaUsuario = $adm['SENHA_USUARIO'];
$tipoUsuario = $adm['TIPO_USUARIO'];
if($senha !== $senhaUsuario){
 echo '<script language="Javascript">
location.href="userPass.php"
</script>';
}else{
    //aqui esta tudo certo tanto no email quanto a senha 
    $_SESSION['email']  = $email;
    $_SESSION['senha'] =  $senha;
    $_SESSION['nomeUsuario']= $adm['NOME_ADMIN'];
    $_SESSION['cod_usuario'] = $adm['ID_ADMIN'];
    $cod_usuario = $adm['ID_ADMIN'];
    mysql_close();
    if($tipoUsuario === 'ADM'){
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

