<?php
include 'config.php';
//executa query
function MySQLEscapeString($str){
  $link   = MySQLConnect();
  $str    = mysql_real_escape_string($str);
   MySQLClose($link);
   return $str;
}
function MySQLQuery($query){
  $link   =  MySQLConnect();
  $result =  mysql_query($query) or die(mysql_errno($link));

  MySQLClose($link);
  return $result;
}
//fecha conexao mysql
function MySQLClose($link){
mysql_close($link) or die(mysql_error($link)); 
}
//abrir uma conexao
function MySQLConnect(){
  $link = mysql_connect('localhost','root','theblackwolf') or die(mysql_error($link));
  $db   = mysql_select_db('theblackwolf') or die(mysql_error($link));
  return $link;
}

