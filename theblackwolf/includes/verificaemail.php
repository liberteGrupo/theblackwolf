<?php
// recebendo o email do formulário
$email = $_GET['email'];
/*$server ='mysql.hostinger.com.br';
$user = 'u470682020_user';
$password = 'theblackwolf';
$database =   'u470682020_banco' ;
*/
$server ='localhost';
$user = 'root';
$password = 'theblackwolf';
$database =   'theblackwolf' ;
// Conexão com o Mysql
$connection = mysql_connect($server, $user, $password);
mysql_select_db($database,$connection);
// Criando uma matriz para guardar todos emails já cadastrados no banSco
$emailsCadastrados = array();
// Montando a query de consulta e executando a query
$query = "SELECT EMAIL_CLIENTE FROM cliente WHERE EMAIL_CLIENTE = '$email'";
$result = mysql_query($query);
// Buscando os emails cadastrados e montando a matriz emailsCadastrados
while ($usuarios = mysql_fetch_assoc($result))
{
    $emailsCadastrados[] = $usuarios['EMAIL_CLIENTE'];
}
// A função in_array(), é responsável em "buscar" em referido elemento dentro de uma matriz.
// A função recebe dois parâmetros: "o elemento a ser pesquisado" e a "matriz de elementos"
// Veja:
if(in_array($email, $emailsCadastrados))
{
    echo 'false';
}else{
    echo'true';
}
exit();