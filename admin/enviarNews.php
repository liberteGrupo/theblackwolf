<?php

?>
<?php
echo '<meta charset=utf-8>';
//session_start();
include  '../includes/userAdm.inc';
$email          = isset($_SESSION['email'])?$_SESSION['email']:null;
$senha          = isset($_SESSION['senha'])?$_SESSION['senha']:null;
$nomeUsuario    = isset($_SESSION['nomeUsuario'])?$_SESSION['nomeUsuario']:null;
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico"/>

<title>The Black Wolf</title>
</head>

<body >

<div id="header">
<div id="dv1">

    <div id="bprocura2">
    </div>   
    <div id="carrinho"><a href="index.php"><img src="../images/administrator.png" height="25px"></a> &nbsp;
    <a href="../logout.php"><img src="../images/logout.png" height="25px"> </a>
</div>

<!-- lightbox-panel --><div id="lightbox-panel">
   <center> <h2>Faça seu Login </h2><p></center>
    <hr noshade size="5" width="100%" />
    <div id="login-box-label"> </div>
<div class="input-div" id="input-usuario">Email: &nbsp;
	<input type="text" value=""/>
</div>
<div class="input-div" id="input-senha">Senha:&nbsp;
	<input type="password" value="Senha" />
<br>
</div>
<div id="botoes">
<div id="botão"></div>
<div id="lembrar-senha"> <input type="checkbox" />
Lembrar minha senha
</div><br/>
<input type="submit" value="Enviar" class="envio">&nbsp;&nbsp;
<a id="cadast" href="cadastrar.php" font color="black" >Cadastre-se</a></font> 
</div>
    </p>
    <p align="center">
        <a id="close-panel" href="#">Fechar</a>
    </p>
</div>
<!-- lightbox-panel -->

<!-- lightbox -->
<div id="lightbox"> </div>  
<!-- lightbox -->
 
</div>
<div class="wrap">
<div id="logo">
<img src="../images/logo.png" width="180" height="200"/>             
</div>

<nav id="menu">
<ul class="menu">
			<div style="width:900px; float:left;">
			<li><a href="index.php">Home</a></li>
                        <li><a href="listarUsuarios.php">Cliente</a>
		<ul>
                    <li> <a href="pedidos.php">Pedidos</a> </li>
                    <li> <a href="listarEndereco.php">Enderecos</a> </li>
			        <li> <a href="listaContatos.php">Contatos</a> </li> 
		</ul>
                            <li><a href="produtos.php">Produtos</a>
        <ul>
            <li><a href="listarCategorias.php"> Categoria </a></li>
            <li><a href="pagamentos.php">Pagamentos </a></li>
		</ul>
        </li>
			<div style="width:-100px; margin-left:100px; float:right;">
            <li><a href="administrador.php">Administrador</a></li>
            <li><a href="listaLogs.php">Logs</a></li>
			<li><a href="newsletter.php">Newsletter</a></li>
		</ul>
</nav>
<div class="conteudo_adm">
		<div class="caixa_admin">
    <img src="../images/email.png" class="icons">&nbsp;<b>Dashboard</b><br>
<?php
echo '<label >Bem vindo:'.$nomeUsuario.'</label>';
?>
	<h2>
		Enviar NewsLetter |
		<label><a href="newsletter.php" title="Gerenciar Inscritos" >Gerenciar Inscritos</a></label>
	</h2>
	<hr>
<?php
require  '../includes/funcoesuteis.inc';

?>
            <form action="" method="post">
		<label>Assunto</label><br>
		<input type="text" name="conteudo" id="contact"><br>
		<label>Mensagem</label><br>
		<textarea name="mensagem" cols="50" rows="15"></textarea><br><br>
		<input type="submit" name="enviar" value="Enviar News" class="botaoAdm">
	</form>
</div>
</div>
</body>
</html>


