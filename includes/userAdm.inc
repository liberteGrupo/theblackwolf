<?php 
echo '<meta charset=utf-8>';
include '../conexao/conecta.inc';
include '../includes/funcoesuteis.inc';
validaAdm('frmLogin.php');
$email          = isset($_SESSION['UsuarioEmail'])?$_SESSION['UsuarioEmail']:null;
$senha          = isset($_SESSION['senha'])?$_SESSION['senha']:null;
$nomeUsuario    = isset($_SESSION['nomeUsuario'])?$_SESSION['nomeUsuario']:null;
$cod_usuario    = isset($_SESSION['cod_usuario'])?$_SESSION['cod_usuario']:null;
$usuarioNivel   = isset($_SESSION['UsuarioNivel'])?$_SESSION['UsuarioNivel']:null;
if (!isset($_SESSION)) 

	session_start();

$nivel_necessario = 2;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($cod_usuario) OR ($usuarioNivel < $nivel_necessario)) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	 echo '<script language="Javascript">
    location.href="index.php"
    </script>';
	exit;
}

/*
if (!isset($_SESSION)) {
    session_start();
}else{
$nivel_necessario = 2;
// Verifica se não há a variável da sessão que identifica o usuário
if (!(isset($cod_usuario)) OR !(($usuarioNivel < $nivel_necessario))) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
echo "ta errada a senha ae o";
        exit;
}elseif ($_SESSION['UsuarioNivel'] === 2 ) {
 
}
}
*/