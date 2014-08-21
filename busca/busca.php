<?php
include '../conexao/conecta.inc';
$pesquisa = mysql_real_escape_string($_POST['palavra']); 
$sql      = "SELECT NOME_CLIENTE FROM cliente LIKE '%$pesquisa%'  ";
$query    = mysql_query($sql) or die('Erro ao pesquisar');
if(mysql_num_rows($query) === 0 ){
echo "0";
}else{
	while ($res=mysql_fetch_assoc($query)) {
		echo $res['NOME_CLIENTE'];
	}
}
