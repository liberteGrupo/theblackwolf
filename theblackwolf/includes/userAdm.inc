<?php 
echo '<meta charset=utf-8>';
include '../conexao/conecta.inc';
include '../includes/funcoesuteis.inc';
validaAdm('ADM', 'frmLogin.php');
$email          = isset($_SESSION['email'])?$_SESSION['email']:null;
$senha          = isset($_SESSION['senha'])?$_SESSION['senha']:null;
$nomeUsuario    = isset($_SESSION['nomeUsuario'])?$_SESSION['nomeUsuario']:null;
if (!isset($_SESSION)) {
    session_start();
}
$nivel_necessario = 2;
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location:frmLogin.php"); 
        exit;
}elseif ($_SESSION['UsuarioNivel'] === 2 ) {
  header('Location:index.php');
}