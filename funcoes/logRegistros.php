<?php

/**
* Função para salvar mensagens de LOG no MySQL
*
* @param string $mensagem - A mensagem a ser salva
*
* @return bool - Se a mensagem foi salva ou não (true/false)
*/
function salvaLog($mensagem) {
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$timestamp = time();	 
$data =  date('d/m/Y H:i:s', $timestamp); // Salva a data e hora atual (formato MySQL
   if(!isset($_SESSION['cod_usuario'])){
        
}else{
	$id_cliente = $_SESSION['cod_usuario'];
}
// Usamos o mysql_escape_string() para poder inserir a mensagem no banco
// sem ter problemas com aspas e outros caracteres
// Monta a query para inserir o log no sistema
 $sql = "INSERT INTO logs (ID_LOG,DATA_LOGIN,IP,MENSAGEM,ID_CLIENTE)";
 $sql .= "VALUES ('','".$data."' ,'".$ip."','".$mensagem."','".$id_cliente."')";
  if (mysql_query($sql))
  {
return true;
} else {
return false;
}

    

    }

