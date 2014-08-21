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
<div id="carrinho"><a href="paginaCarrinho.html">Meu Carrinho</a> <img src="images/carrinho2.png" height="20px"></div>

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
<ul class="menu">
            <div style="width:900px; float:left;">
            <li><a href="index.php">Home</a></li>
            <li><a href="produtos.php">CDs</a>
        <ul>
            <li> <a href="pop.php">Pop</a> </li>
            <li> <a href="heavymetal.php">Heavy Metal</a> </li>
            <li> <a href="alternativo.php">Alternativo</a> </li>
            <li> <a href="punk.php">Punk</a> </li>

        </ul>
            <li><a href="camisetas.php">Camisetas</a>
        <ul>
            <li><a href="masculino.php">Masculinas</a></li>
            <li><a href="feminino.php">Femininas</a></li>
        </ul>
        </li>
            <div   style="width:-100px; margin-left:100px; float:right;">
            <li><a href="contato.php">Contato</a></li>
            <li><a href="sobrenos.php">Sobre</a></li>
            <li><a href="index.php">Interatividade</a></li>
        </ul>
</nav>


<div id="sobre">

  <table width="1200" height="240" border="0">
       <tr>
         <th height="40" colspan="5" scope="col"><div align="left">FAÇA O LOGIN OU CRIE UMA CONTA.</div></th>
       </tr>
       <tr>
         <td height="47" colspan="3"> <a href="frmCadastro.php"> 
         <a href="frmCadastro.php"> Crie sua conta cliclando aqui !</a>
       </td>
         <td colspan="2" class="texto">Já tem Cadastro</td>
       </tr>
       <tr>
         <td width="227">&nbsp;</td>
         <td width="227">&nbsp;</td>
         <td width="231" height="33"></td>
         <td colspan="2"><strong>Se possui faça o seu login.</strong></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td height="33">&nbsp;</td>
         <td width="130" >Email:</td>
         <td width="394">

         <form action="login.php" method="post"> 
         <input type="text" name="email"  />
         </td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td height="21">&nbsp;</td>
         <td>Senha:</td>
         <td>
         <input type="password" name="senha" /></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td></td>
         <td height="28">
           <p>&nbsp;</p>
           <p>
          </p>
         </td>
         <td></td>
         <td>
      <input name="enviar" type="submit" class="botao" value="enviar"  />
      </form>
    </td>
       </tr>
       <tr>
         <td height="21" colspan="5">&nbsp;</td>
       </tr>
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