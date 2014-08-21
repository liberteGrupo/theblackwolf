<?php
if(isset($_POST['enviar'])){
if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']))) {
	header("Location: ../frmLogin.php"); 
        exit;
}
//conexao com o servidor
include '../../conexao/conecta.inc';
$usuario = strip_tags(trim($_POST['usuario']));
$senha   = strip_tags(trim($_POST['senha']));
$hash    = md5($senha);
// Validação do usuário/senha digitados
$sql     = "SELECT * FROM admin WHERE (EMAIL_ADMIN = '". $usuario ."')";
$query   = mysql_query($sql);
if (mysql_num_rows($query) === 0){
	// Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
	echo '<script language="Javascript">
	alert("Login Invalido!");
location.href="../frmLogin.php"
</script>';
        exit;
}else{

	// Salva os dados encontados na variável $resultado
	$resultado = mysql_fetch_array($query);
	// Se a sessão não existir, inicia uma
  $senhaAdmin  = $resultado['SENHA_ADMIN'];
if($hash != $senhaAdmin){
echo '<script language="Javascript">
  alert("Login Invalido!");
location.href="../frmLogin.php"
</script>';
}
else{
	if (!isset($_SESSION)) session_start();
	// Salva os dados encontrados na sessão
	$_SESSION['UsuarioID']    = $resultado['ID_ADMIN'];
	$_SESSION['UsuarioNome']  = $resultado['EMAIL_ADMIN'];
	$_SESSION['UsuarioNivel'] = $resultado['NIVEL'];
        $_SESSION['email']        = $usuario;
        $_SESSION['senha']        = $hash;
        $_SESSION['nomeUsuario']  = $array['NOME_ADMIN'];
        $_SESSION['cod_usuario']  = $array['ID_ADMIN'];
	// Redireciona o visitante
	header("Location:../index.php"); 
        exit;
}
}
}