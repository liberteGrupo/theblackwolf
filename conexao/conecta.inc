<?php
echo '<meta charset=utf-8>';
//pra voce conecta em sua casa vc precis
$hostName ='localhost';
$userName = 'root';
$passHost = 'theblackwolf';
$dbName =   'theblackwolf' ;
//$hostName ='mysql.hostinger.com.br';
//$userName = 'u470682020_user';
//$passHost = 'theblackwolf';
//$dbName =   'u470682020_banco';
$connection = mysql_connect($hostName,$userName,$passHost);
if($connection === FALSE){
    echo'nao foi possivel conectar com o banco de dados';
    mysql_error(); 
}else{
    $db_select = mysql_select_db($dbName,$connection);
    if(!$db_select){
    echo 'Nao foi possivel conectar com o banco de dados selecinado'.$dbName;
    mysql_error();
        
    }
    
}