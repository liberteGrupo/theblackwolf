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
include 'admin/system/system.php';
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
<img class="logo" src="images/logo.png" width="180" height="200"/>
</div>

<nav id="menu">
<?php 
include 'includes/menu.php';
?>
</nav>

<div id="banner">
<figure>
		<span class="trs next"></span>
		<span class="trs prev"></span>
		<div id="slider">
			<a href="#" class="trs"><img src="banner_img/1.jpg"/></a>
			<a href="#" class="trs"><img src="banner_img/2.jpg"/></a>
            <a href="#" class="trs"><img src="banner_img/3.jpg"/></a>
    
		</div>
   <figcaption></figcaption>
	</figure>
</div>


<div id="lancamento">
<h2> Veja nossos lançamentos </h2>
<hr noshade size="5" width="100%" />
<center>
<table border="1" width="500" class="bordasimples" cellspacing="8" bgcolor="#990000">

  <tr>
       </div>
              <tr>   
                <?php
   $produtos        = ("SELECT * FROM produto  ORDER BY ID_PRODUTO DESC LIMIT 0,4");
   $listar_produtos = mysql_query($produtos);
   $i    = 0;
   $loop = 4;
   while($produto = mysql_fetch_array($listar_produtos)){
    if($i < $loop){
        ?> 
         <td><a href="detalhesProduto.php?acao=add&id=<?php echo $produto['ID_PRODUTO'] ?>" class="efeito"><?php echo $produto['NOME_PRODUTO'];?>
                 <img src="images/<?php echo $produto['PRODUTO_IMAGEM'];?>" name="img1" width="250" height="300" id="img1">
             Preço : R$<?php echo $produto['PRECO_PRODUTO'];?></a></td> 
</div>
 <?php
  }
   }
   ?>
</table>

  <p>&nbsp;</p>
</center>
 <?php RegisterNews()  ?>
<div id="newsletter">
<form action="admin/system/news.php" method="post">
 <label>Newsletter</label><br/>
Cadastre seu email para receber informações de produtos e ofertas :<br/><br/>
 Nome:<input type="text" name="nome" id="nome" /><br>
 Email:<input type="text" name="email" id="email" /> <br><br><input type="submit" value="Enviar"  name="enviar" class="boton">
  </center> 
  </form>
</div>
</div>
</div>

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