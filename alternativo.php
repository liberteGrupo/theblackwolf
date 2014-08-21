<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico"/>
<script type="text/javascript" src="slide.js"></script>
<script src="http://www.google.com/jsapi"></script>

<title>The Black Wolf</title>
</head>

<body >

<div id="header">
<div id="dv1">

<input id="bprocura" type="text" name="busca" value="O que você procura?" onfocus="if(this.value == 'Oque você procura?') {this.value='';}" onblur="if(this.value == '') {this.value='Oque você procura?';}">
 <input type="image" src="images/busca.png" value="enviar" alt="buscar!">

<a id="show-panel" href="#">Login</a>
<div id="carrinho"><a href="#">Meu Carrinho</a> <img src="images/carrinho2.png" height="20px"></div>

<!-- lightbox-panel --><div id="lightbox-panel">
   <center> <h2>Faça seu Login </h2><p></center>
    <hr noshade size="5" width="100%" />
    <div id="login-box-label"> </div>
<div class="input-div" id="input-usuario">Email: &nbsp;
	<input type="text" value=""/>
</div>
<div class="input-div" id="input-senha">Senha:&nbsp;
	<input type="password" value"Senha"/>
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
<img src="images/logo.png" width="180" height="200"/>             
</div>

<nav id="menu">
<?php 
include 'includes/menu.php';
?>
</nav>


<div id="paginapop">
  <p>
  <font color="">&nbsp;   Inicio > CDS Punk </br>
 <center> 
 

 <table width="200" border="1"cellspacing="8">
    <tr>
      <td><p>CD Muse Absolution</p>
        <p><img src="POP E ALTERNATIVO/POP E ALTERNATIVO/ALTERNATIVO/muse_absolution_capa.jpg" width="200" height="200"></p>
        <p>Preço:R$ <span id="old-price-4">R$79,00</span>49,90</p>
        <p><img src="images/botao_comprar.png" width="175" height="46"></p></td>
      <td><p>CD Pixies Doolitle</p>
        <p><img src="POP E ALTERNATIVO/POP E ALTERNATIVO/ALTERNATIVO/pixies_doolitle_capa.jpg" width="200" height="200"></p>
        <p>Preço:R$ <span id="old-price-">R$79,00</span>49,90</p>
        <p><img src="images/botao_comprar.png" width="175" height="46"></p></td>
      <td><p>Radiohead OKcompute</p>
        <p><img src="POP E ALTERNATIVO/POP E ALTERNATIVO/ALTERNATIVO/radiohead_OKcomputer_capa.jpg" width="200" height="200"></p>
        <p>Preço:R$ <span id="old-price-2">R$79,00</span>49,90</p>
        <p><img src="images/botao_comprar.png" width="175" height="46"></p></td>
      <td><p> Esqueci de pegar o nome</p>
        <p><img src="POP E ALTERNATIVO/POP E ALTERNATIVO/ALTERNATIVO/sonicyouth_dirty_capa.jpg" width="200" height="200"></p>
        <p>Preço:R$ <span id="old-price-3">R$79,00</span>49,90</p>
        <p><img src="images/botao_comprar.png" width="175" height="46"></p></td>
    </tr>
    </center>
  </table>
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