<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico"/>
<script type="text/javascript" src="slide.js"></script>
<title>The Black Wolf</title>
</head>

<body >

<?php 
echo '<meta charset=utf-8>';
require_once 'conexao/conecta.inc';
include 'includes/funcoesuteis.inc';
session_start();
$email       = isset($_SESSION['email'])?$_SESSION['email']:null;
$senha       = isset($_SESSION['senha'])?$_SESSION['senha']:null;
$nomeUsuario = isset($_SESSION['nomeUsuario'])?$_SESSION['nomeUsuario']:null;
$cod_usuario = isset($_SESSION['cod_usuario'])?$_SESSION['cod_usuario']:null;
if(isset($_SESSION['cod_usuario']) && isset($_SESSION['nomeUsuario'])){
include 'includes/headerUser.php';
}else{
include 'includes/header.php';
}

?>
<!-- lightbox -->
 
</div>
<div class="wrap">
<div id="logo">
<img src="images/logo.png" width="180" height="200"/>             
</div>

<nav id="menu">
<?php 
include 'includes/menu.php';
?>
</nav>


<div id="contato">
<h1>Fale Conosco</h1>

<form method="post" action="admin/system/enviaContato.php">
<label>Nome</label>
<input id="contact" name="nome" placeholder="Seu Nome">
<label>Email</label>
<input id="contact" name="email" type="email" placeholder="Seu email">
<label>Mensagem</label>
<textarea name="texto" placeholder="Pois não?"></textarea>
<input id="enviar" name="submit" type="submit" class="botao" value="Enviar">
</form>

</div>

<div id="contato2">

<h2 align="center" id="contato_texto"><label>Contato</label></h2>


<img src="images/contato.png" width="400"/>
<p id="fale">Nos mande um E-mail: contato@blackwolf.com.br
<br>
Ou ligue para tirar suas duvidas: 11 - 7044-6834
</p>


</div>
</div>


<div id="footer">

<div id="mapa1">
  CDS  <br />  
  	<a href="pop.html">Pop</a> <br />
    <a href="#">Rock</a><br />
    <a href="#">Punk</a><br />
    <a href="#">Metal</a><br />
    <a href="#">Eletronica</a><br />
</div>

<div id="mapa2">
CAMISETAS<br />
<a href="#">Feminino</a><br />
<a href="#">Masculino</a>
 </div>


<div id="pagamento">
 FORMAS DE PAGAMENTO <br />
<img src="images/pagamento.jpg" width="142" height="131"/>
</div><div id="rodapelogo">
 <img src="images/logo.png" width="160" height="170"/><br/>
 <font color="#FFFFFF"> The Black wolf 2014
 </div></font>

<div id="redes">
REDES SOCIAIS<br />
<a href="#"><img src="images/insta.jpg"/></a>
<a href="#"><img src="images/face.jpg" /></a>
<a href="#"><img src="images/twitter.jpg" /></a>
</div>

<script type="text/javascript">
	// Load jQuery
	google.load("jquery", "1.3");

	google.setOnLoadCallback(function() {
		// Seu código aqui
	});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("a#show-panel").click(function() {
            $("#lightbox, #lightbox-panel").fadeIn(300);
        })
        $("a#close-panel").click(function() {
            $("#lightbox, #lightbox-panel").fadeOut(300);
        })
    })
</script>

</body>
</html>