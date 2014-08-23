<?php
include 'conexao/conecta.inc'; 
if(isset($_GET['token']))
{
$token   = $_GET['token'];
if($_GET['token'] === ''){
header('Location:index.php');
}else{
$sql     = "SELECT * FROM newsletter WHERE TOKEN = '$token'";
$result  = mysql_query($sql);
if(mysql_num_rows($result)){
   $sql  = "UPDATE newsletter SET STATUS =  false";
   if(mysql_query($sql)){
   	echo '<script language="Javascript">
    alert("Agora voce nao receberá mais notificações quanto a promocoes e ofertas do site Theblackwolf");
</script>';
   }else
   {
  	echo '<script language="Javascript">
    alert("Não foi possivel cancelar o seu cadastro de newsletter");
</script>';
   }
}

}
}else{
echo '<script language="Javascript">
location.href="index.php"
</script>';
}