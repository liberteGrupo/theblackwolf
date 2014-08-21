<?php 
session_start();
include 'conexao/conecta.inc';
include 'includes/funcoesuteis.inc';
$email =isset($_SESSION['email'])?$_SESSION['email']:null;
$senha = isset($_SESSION['senha'])?$_SESSION['senha']:null;
$nomeUsuario = isset($_SESSION['nomeUsuario'])?$_SESSION['nomeUsuario']:null;
$cod_usuario = isset($_SESSION['cod_usuario'])?$_SESSION['cod_usuario']:null;
      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }
       
      //adiciona produto
       
      if(isset($_GET['acao'])){
          
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }else{
               $_SESSION['carrinho'][$id] += 1;
            }
         }
          
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
         }
          
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho'][$id] = $qtd;
                  }else{
                     unset($_SESSION['carrinho'][$id]);
                  }
               }
            }
         }
       
      }
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="images/favicon.ico"/>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
  <style>
    /* styles unrelated to zoom */
    * { border:0; margin:0; padding:0; }
    p { position:absolute; top:3px; right:28px; color:#555; font:bold 13px/1 sans-serif;}

    /* these styles are for the demo, but are not required for the plugin */
    .zoom {
      display:inline-block;
      margin-left: -500px;
      -webkit-box-shadow: 3px 4px 11px 0px rgba(50, 50, 50, 0.75);
     -moz-box-shadow: 3px 4px 11px 0px rgba(50, 50, 50, 0.75);
      box-shadow: 3px 4px 11px 0px rgba(50, 50, 50, 0.75);
    }
    
    /* magnifying glass icon */
    .zoom:after {
      content:'';
      display:block; 
      top:0;
      right:0;
      background:url(icon.png);
      margin-left: -200px;
    }

    .zoom img {
      display: block;
    }

    .zoom img::selection { background-color: transparent; }

    #ex2 img:hover { cursor: url(grab.cur), default; }
    #ex2 img:active { cursor: url(grabbed.cur), default; }
  </style>
<script src='js/jquery.js'></script>
<script src='js/jquery.zoom.js'></script>
<script>
    $(document).ready(function(){
      $('#ex1').zoom();
    });
  </script>
   <title>The Black Wolf</title>
</head>

<body >


<?php
   $produtos = ("SELECT *  FROM produto WHERE ID_PRODUTO= '$id'");
   $query_produtos =  mysql_query("SELECT QTDE_PRODUTO FROM produto WHERE ID_PRODUTO = '$id'");
   $qtde_produtos = mysql_num_rows($query_produtos);
  
   $listar_produtos = mysql_query($produtos);
   $produto =  mysql_fetch_assoc($listar_produtos)
   
   ?>
<?php 
echo '<meta charset=utf-8>';

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

 
<div id="produtosCarrinho">
 <div id="categoria_produtos_detalhes">
   <div class="text_sua_conta"><b>Categorias</b></div><br> 
<?php
  $selecionaCategs = mysql_query("SELECT * FROM categoria INNER JOIN subcategoria ON categoria.ID_CATEGORIA = subcategoria.ID_SUBCATEGORIA");

   while($lnCateg = mysql_fetch_array($selecionaCategs)){
?>
       <div >
         <a href="categoria.php?id=<?php echo $lnCateg['ID_SUBCATEGORIA']; ?> " >
        
          <?php echo $lnCateg['NOME_SUBCATEGORIA']; ?>
         </a>
         <br>
     </div>
<?php 
        }

?>
</div>
<h6 class="titulo_produtos"><?php echo $produto['NOME_PRODUTO'];?> </h6>
	<div id="produto_img" ><br/> <center> 
  &nbsp;&nbsp;&nbsp;<a >
  <div class='zoom' id='ex1' > 
<div ><img  title="Imagem"  src="images/<?php echo $produto['PRODUTO_IMAGEM']; ?>" width='330' height='330'  /> </center></a><div>
</div>
  <br/> <center> 
  &nbsp;&nbsp;&nbsp;<a > <img  title="Imagem" class="thumb_produto_detalhes"  src="images/<?php echo $produto['PRODUTO_IMAGEM']  ?>" /></center></a>
    </div>
	  
	<div id="descricaoprdt">
	
	<p> <h5 class="precoprdt"> Por:<b> <?php echo 'R$'.strtoupper($produto['PRECO_PRODUTO']); ?></b> </h5> </p>
     <div class="precoprdt"><?php  $parcela  = $produto['PRECO_PRODUTO']/5; echo '5x  de R$'.$parcela.' <b>sem juros! </b>'; ?></div> 
	<a href="#"></img> </a>
        <form action="carrinho.php?acao=add&id=<?php echo $produto['ID_PRODUTO'] ?>" >
        <div class="precoprdt"><button type="submit" name="addProduto" value="Comprar" class="botaoComprar" /><img src="images/carrinho2.png" class="icons" /> </button></div> 
    </form>
	<br/>
        <?php 
       if($produto['QTDE_PRODUTO'] > 0 )
       {
   echo '<b>Disponibidade</b>:Disponivel';
   
   }else
   { 
    echo '<b>Disponibidade</b>:<label class="preco">Indisponivel </label>';
 }
 ?>
        <img src="produtos/entrega.png" height="50px" width="50px" align="left"/> <br/>
	&nbsp;Consulte o prazo de entrega: <br/><br/>
        Digite seu CEP: <input type="text" id="cep" maxlength="9" > <input name="" type="button" class="botaoAdm" onClick="" value="Calcular frete"><br/><br/>
                <b>Forma  de pagamento:</b> <br/><br/>
	<img src="images/pagamento.jpg" width="160px" height="100px" />
	
	</div>
	<div id="tracklist">
            <label>Detalhes :</label><br>
                <div class="detalhes"> <?php echo '<p class="texto_descricao">'.$produto['DESCRICAO_PRODUTO'].'</label><br>'; ?></div><br>
        <br/>
    </div> 
	<?php
if(isset($_POST['enviar']))
{
  if(empty($_POST['comentario'])){
    echo '<script language="Javascript">
    alert("Favor preencher todos os campos!");
          </script>';
  }else{
include     'conexao/conecta.inc';
$comentario = mysql_real_escape_string(trim(strip_tags($_POST['comentario'])));
$id         = $_GET['id'];
$sql        = "INSERT INTO comentario (ID_PRODUTO,ID_CLIENTE,COMENTARIO) VALUES ('$id','$cod_usuario','$comentario')";
$result     = mysql_query($sql);
if(!$result){
echo "Comentário não postado";
}else{
echo "Comentário comentado Com Sucesso!<br>";
echo '<script language="Javascript">
location.href="pop.php"
</script>';
  }
}
}
?>
   <div id="detalhes_produto">
 <label>Comentarios:</label>
<?php
$sql            = mysql_query("SELECT * FROM comentario WHERE ID_PRODUTO = '$id'");
$result         = mysql_num_rows($sql);
    if($result <= 0){
echo "<label >Nenhum Comentario Realizado Seja o primeiro!</label>";
?>
    <form action="" class="form_comentario" method="post">
    <label>Comentário</label><br>
    <textarea name="comentario"  class="textarea_comentario"></textarea><br><br>
    <input type="submit" name="enviar" value="Enviar" class="botaoAdm">
  </form>
<?php
     }else{
$query                 = "SELECT * FROM comentario INNER JOIN cliente INNER JOIN produto ON comentario.ID_CLIENTE =  cliente.ID_CLIENTE AND comentario.ID_PRODUTO = produto.ID_PRODUTO WHERE produto.ID_PRODUTO = '$id'";
$result                = mysql_query($query);
while ($lnComentario   = mysql_fetch_assoc($result)) {
  echo '<label class="pedido_texto"><b>Nome:'.$lnComentario['NOME_CLIENTE'].'</b></label>';
  echo '<label class="texto_comentario">'.$lnComentario['COMENTARIO'].'</label>';
}

?>
  <form action="<?php $_SERVER['PHP_SELF'];?>" class="form_comentario" method="post">
    <label>Comentar:</label><br>
    <textarea name="comentario"  class="textarea_comentario"></textarea><br><br>
    <input type="submit" name="enviar" value="Enviar" class="botaoAdm">
  </form>
<?php
}
?>
         </div></a>
    </form>
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
<img src="images/pagamento.jpg" width="180" height="131"/>
</div>
<div id="rodapelogo">
 <img src="images/logo.png" width="160" height="170"/><br/>
 <font color="#FFFFFF"> The Black wolf 2014
 </div></font>

<div id="redes">
REDES SOCIAIS<br />
<a href="#"><img src="images/insta.jpg"/></a>
<a href="#"><img src="images/face.jpg" /></a>
<a href="#"><img src="images/twitter.jpg" /></a>
</div>
</body>
</html>