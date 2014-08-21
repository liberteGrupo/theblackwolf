<?php
include 'conexao/conecta.inc';
include 'includes/funcoesuteis.inc';
validaAutenticacao('RES','autentica_usuario.php');
$email =isset($_SESSION['email'])?$_SESSION['email']:null;
$senha = isset($_SESSION['senha'])?$_SESSION['senha']:null;
$nomeUsuario = isset($_SESSION['nomeUsuario'])?$_SESSION['nomeUsuario']:null;
$cod_usuario = isset($_SESSION['cod_usuario'])?$_SESSION['cod_usuario']:null;
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico"/>
<script type="text/javascript" src="slide.js"></script>
<title>The Black Wolf</title>
</head>
<body>
<div id="header">
<div id="dv1">
<input id="bprocura" type="text" name="busca" value="O que você procura?" onfocus="if(this.value == 'Oque você procura?') {this.value='';}" onblur="if(this.value == '') {this.value='Oque você procura?';}">
<input type="image" src="images/busca.png" value="enviar" alt="buscar!">
<a id="show-panel" href=""></a>
<div id="carrinho"><a href="carrinho.php"><img src="images/carrinho2.png" height="20px"></a> 
        &nbsp;&nbsp;&nbsp;<a href="minhaConta.php"><img src="images/adm.png" height="20px"></a>&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="images/logout3.png" height="20px"></a>
</div>

<!-- lightbox-panel -->
<div id="lightbox-panel">
   <center> <h2>Faça seu Login </h2><p></center>
    <hr noshade size="5" width="100%" />
    <div id="login-box-label"> </div>
    <form action="login.php" method="post">
<div class="input-div" id="input-usuario">Email: &nbsp;
	<input type="text" value=""/>
</div>
<div class="input-div" id="input-senha">Senha:&nbsp;
	<input type="password" value="Senha"/>
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





    <section>
  
    <aside>
        <div class="text_sua_conta"><b>Sua Conta</b></div><br> 
            <div id="dados_conta">
      <a href="minhaConta.php"> Painel do Usuário </a><br>
   <?php 
 $results = mysql_query("SELECT * FROM cliente RIGHT OUTER JOIN endereco ON cliente.ID_CLIENTE ='$cod_usuario' WHERE cliente.ID_ENDERECO =  endereco.ID_ENDERECO");
 $usuarios = mysql_fetch_array($results) ; 
      echo '<a href="alterarSenha.php?codigo='.$usuarios['ID_CLIENTE'].'"> Informações de conta </a><br>';
  
      ?>
<a href="listaEndereco.php"> Enderecos </a><br>
<a href="meusPedidos.php"> Meus Pedidos </a><br>
<a href="cadastroNews.php"> Cadastro de Newsletter </a>
</div>
</aside>
    
    <div class="conteudo_informacoes">
   <b>Seu painel</b><br> 

      <?php
echo 'Olá '.$nomeUsuario.'!';
?>       
         <p class="texto_conteudo">Voce não possui Newsletter Cadastrado Dejesa Cadastrar ?
         </p>
         </div> 

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

