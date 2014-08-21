<?php
session_start();
include 'conexao/conecta.inc';
?>
<!doctype html>
<html class="label" xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico"/>
<script type="text/javascript" src="slide.js"></script>
<title>The Black Wolf</title>
</head>
<body >
<div id="header">
<div id="dv1">
<input id="bprocura" type="text" name="busca" value="O que você procura?" onfocus="if(this.value == 'Oque você procura?') {this.value='';}" onblur="if(this.value == '') {this.value='Oque você procura?';}">
<input type="image" src="images/busca.png" value="enviar" alt="buscar!">
<a id="show-panel" href="#">Login</a>
<div id="carrinho"><a href="login.php">Meu Carrinho</a> <img src="images/carrinho2.png" height="20px"></div>
<!-- lightbox-panel -->
<div id="lightbox-panel">
   <center> <h2>Faça seu Login </h2><p></center>
    <hr noshade size="5" width="100%" />
    <div id="login-box-label"> </div>
    <form action="login.php" method="post">
<div class="input-div" >Email: &nbsp;
    <input type="text" name="email" />
</div>
<div class="input-div" id="input-senha">Senha:&nbsp;
	<input type="password" name="senha"  />
    
<br>
</div>

<div id="botoes">
<div id="botão"></div>
<div id="lembrar-senha"> <input type="checkbox" />
Lembrar minha senha
</div><br/>

<input type="submit" value="Enviar" class="envio">&nbsp;&nbsp;
<a id="cadast" href="frmCadastro.php" font color="black" >Cadastre-se</a></font> 
</div>
 </form>   
    
    
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
<img class="logo" src="images/logo.png" width="180" height="200"/>             
</div>

<nav id="menu">
<?php 
include 'includes/menu.php';
?>
</nav>
<section class="autentica_usuario">

<div id="autentica_usuario">
  <table width="1000" height="194" >
  <tr>
    <th width="316" height="25" scope="col">Faça login ou crie uma conta</th>
    <th width="101" scope="col"> </th>
    <th width="92" scope="col">&nbsp;</th>
    <th width="147" scope="col"> Já tem Cadastro&nbsp;</th>
    <th width="310" scope="col"><strong>
   
    </strong></th>
  </tr>
  <tr>
    <td height="34"><a href="frmCadastro.php"> Crie sua conta cliclando aqui !</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Faça o login:</td>
    <td></td>
  </tr>
  <tr>
    <td height="28"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Email:</td>
 <form action="login.php" method="post">
 <td> <input type="text" name="email"   /></td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Senha:</td>
    <td><input type="password" name="senha"  /></td>
  </tr>
  <tr>
    <td height="85"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;<input type="submit" value="Entrar"  name="enviar"  class="botao" /></td>
  </tr>
  </form>
   
</table>
    <div class="forgotPass" ><label><a href="user/recuperaSenha.php">Esqueci minha senha</a></label></div>
</div>
</section>
<div id="footer">

<div id="mapa1">/
  CDS  <br />  
  	<a href="sobrenos.php">Pop</a> <br />
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
<img src="images/pagamento.png" width="142" height="131"/>

</div>
 <div id="rodapelogo">
 <img src="images/logo.png" width="160" height="170"/><br/>
 <font color="#FFFFFF"> The Black wolf 2014
 </div></font>



<div id="redes">
REDES SOCIAIS<br />
<a href="#"><img src="images/insta.jpg" width="45" height="35"     /></a>
<a href="#"><img src="images/face.jpg" width="40" height="34"    /></a>
<a href="#"><img src="images/twitter.jpg" width="40" height="35"    /></a>
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

            
  

