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
    <div class="listagem_produtos">
<?php
 $selecionaCategs = mysql_query("SELECT * FROM categoria INNER JOIN subcategoria ON categoria.ID_CATEGORIA = subcategoria.ID_CATEGORIA");
 $categoria = mysql_fetch_array($selecionaCategs);
?>

<label class="txt_descricao"><b>Home<b>-><?php echo $categoria['NOME_CATEGORIA'];?></label> 
 <div id="categoria_produtos">
   <div class="text_sua_conta"><b>Categorias</b></div><br> 
<?php
$id = intval(trim($_GET['categoria']));
 $selecionaCategs = mysql_query("SELECT * FROM categoria INNER JOIN subcategoria ON categoria.ID_CATEGORIA = '$id'");
 while($lnCateg = mysql_fetch_array($selecionaCategs)){
?>
       <div >
         <a href="categoria.php?categoria=<?php echo $lnCateg['ID_SUBCATEGORIA']; ?> " >
          <?php echo $lnCateg['NOME_SUBCATEGORIA']; ?>
         </a>
         <br>
     </div>
<?php 
        }
?>
</div>
<div class="ordena_produto">
Ordenar Por:
<form action="ordena.php" method="POST">
  <select name="ordena"> 
   <option value="menor"     >Menor Preço</option>
   <option value="maior"     >Maior Preço</option>
   <option value="procurado" >Mais Procurado</option>
  </select>
<input type="submit" name="ordenar" class="botao"value="Ordenar" />
</form>
</div>



        <form method="post" action="carrinho_produtos.php">
        <table width="200" height="240" cellspacing="5" id="lista_produtos"><in>
       </div>
         <tr>   
   <?php
   if(is_numeric($id_categoria = $_GET['categoria'])):
   $result = mysql_query("SELECT * FROM categoria INNER JOIN subcategoria ON categoria.ID_CATEGORIA = subcategoria.ID_CATEGORIA WHERE categoria.ID_CATEGORIA = subcategoria.ID_SUBCATEGORIA");
   if(mysql_num_rows($result) === '0' or !is_numeric($id_categoria)){
       echo 'error Page';
   }else{
   $produtos = ("SELECT * FROM produto WHERE ID_CATEGORIA = $id_categoria ORDER BY ID_PRODUTO  ");
   $listar_produtos = mysql_query($produtos);
   $i = 2;
   $loop = 5;
   while($produto = mysql_fetch_array($listar_produtos)){
   if($i < $loop){
        ?> 
       <div class="box">
       <td><b><?php echo $produto['NOME_PRODUTO']; ?></b>
       <p><a href="detalhesProduto.php?acao=add&id=<?php echo $produto['ID_PRODUTO'] ?>"><img src="images/<?php echo $produto['PRODUTO_IMAGEM'];?>" class="efeito" width="200" height="200"></a></p>
       <p>Preço:R$ <span id="old-price-6"></span>R$<?php echo $produto['PRECO_PRODUTO']; ?></p>
       <a  href="detalhesProduto.php?acao=add&id=<?php echo $produto['ID_PRODUTO'] ?>"><img src="images/botao_comprar.png" width="175" height="46"class="efeito"></a>     
        </div>
   <?php
  }elseif($i === $loop){
        ?>
   <div class="box">
        <td><p><?php echo $produto['NOME_PRODUTO']; ?></p>
        <p><a href="detalhesProduto.php?acao=add&id=<?php echo $produto['ID_PRODUTO'] ?>"><img src="images/<?php echo $produto['PRODUTO_IMAGEM'];?>" class="efeito" width="200" height="200"></a></p>
        <p>Preço:R$ <span id="old-price-6">R$<?php echo $produto['PRECO_PRODUTO']; ?></span>49,90</p>
         <a  href="detalhesProduto.php?acao=add&id=<?php echo $produto['ID_PRODUTO'] ?>"><img src="images/botao_comprar.png" width="175" height="46"class="efeito"></a>   
   </div>    
      </tr>    
    <?php
    $i = 1;
    }
    $i++;
   }
   }
   else:     
endif;
   ?>
     </form>
     </table>   
</div>
</div>
<div id="footer">
<div id="mapa1">/
  CDS <br />  
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