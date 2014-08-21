<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="styles/style.css" rel="stylesheet" type="text/css" />
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
<!-- lightbox-panel -->

<!-- lightbox -->
<div id="lightbox"> </div>  
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


<section>
		
<h2>Sobre a The Black Wolf</h2>
Um ambiente intimista que mistura vintage e moderno, com uma atmosfera criativa e originalmente clássica. A Fock surge em 2003 com desenvolvimento e produção de acessórios em couro feitos a mão na Galeria Ouro Fino e no Mercado Mundo Mix. Depois de produzir coleções para diversas lojas, as criações da marca hoje se destacam em um mercado sem criatividade e cheio de mesmices.</p>
Pouco depois Priscila Andrade e Bruno D’Errico ampliam a marca para um rock n roll lifestyle completo com roupas masculinas e femininas de alta qualidade e objetos de design. Com um leque amplo de produtos a Fock defende um estilo de vida para quem quer se vestir bem, sem abrir mão de referências inteligentes, qualidade e preço.
Não se surpreenda com as constantes mudanças nas lojas, que recebem novidades e inspirações do mundo inteiro para manter um público inteligente e bem informado satisfeito. Sempre com a preocupação de manter o melhor custo benefício para amigos e clientes e com um atendimento atencioso e familiar. Mais que uma loja, um lifestyle...<br>
<br>
</section>
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