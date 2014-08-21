<?php
include 'conexao/conecta.inc'; 
if(filter_var(isset($_GET['token']), FILTER_VALIDATE_INT)){
$token   = $_GET['token'];
if($_GET['token'] === ''){
header('Location:index.php');
}else{
$sql     = "SELECT * FROM newsletter WHERE TOKEN = '$token'";
$result  = mysql_query($sql);
if(mysql_num_rows($result)){
   $sql  = "UPDATE newsletter SET STATUS =  true";
   if(mysql_query($sql)){
   	echo "Seu cadastro foi efetuado com sucesso!";
   }else
   {
   	echo "Não foi possivel completar seu cadastro!";
   }
}

}
}