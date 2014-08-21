<?php
include 'conexao/conecta.inc'; 
if(isset($_GET['token'])){
$token   = $_GET['token'];
if($_GET['token'] === ''){
header('Location:index.php');
}else{
$sql     = "SELECT * FROM newsletter WHERE TOKEN = '$token'";
$result  = mysql_query($sql);
if(mysql_num_rows($result)){
   $sql  = "UPDATE newsletter SET STATUS =  false";
   if(mysql_query($sql)){
   	echo "Agora vc não recebera nossas notificaoes sobre promocoes entre outros..";
   }else
   {
   	echo "Não foi possivel cancelar seu cadastro de newsletter!";
   }
}

}
}