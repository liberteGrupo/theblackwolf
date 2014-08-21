<?php
require_once 'includes/funcoesuteis.inc';
   include_once 'conexao/conecta.inc';
 if(isset($_POST['enviar'])){
 $email   = $_POST['email'];
 $dados   = verificaEmail($email);
    if($dados){
   enviaEmail($email,$dados->ID_CLIENTE);
   echo 'deu certo';
     }else{
         echo 'deu merda';
     }
 }
 
?>
<!doctype html>
<html class="label" xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico"/>
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
<a id="cadast" href="../frmCadastro.php" font color="black" >Cadastre-se</a></font> 
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
    <tr>
        <h1>Recupera Senha</h1>
        <label>Digite o seu email para enviarmos uma mensagem para alterar a sua senha.</label>
    </tr><br>
        <form action="" method="post" >
        <tr>
        <td scope="row"><b>Email:</b></td>
    <td colspan="2"><input type="email" name="email" required id="contact"></td>
  </tr><br><br>
        <tr>
            <input type="submit" name="enviar" class="botao"> 
        </tr>
          </form>
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


