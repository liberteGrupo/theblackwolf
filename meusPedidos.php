<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script> 
<script type="text/javascript">
			$(document).ready(function(){
				$("a[rel=modal]").click( function(ev){
					ev.preventDefault();

					var id = $(this).attr("href");

					var alturaTela = $(document).height();
					var larguraTela = $(window).width();
	
					//colocando o fundo preto
					$('#mascara').css({'width':larguraTela,'height':alturaTela});
					$('#mascara').fadeIn(1000);	
					$('#mascara').fadeTo("slow",0.8);

					var left = ($(window).width() /2) - ( $(id).width() / 2 );
					var top = ($(window).height() / 2) - ( $(id).height() / 2 );
					
					$(id).css({'top':top,'left':left});
					$(id).show();	
 				});

 				$("#mascara").click( function(){
 					$(this).hide();
 					$(".window").hide();
 				});

 				$('.fechar').click(function(ev){
 					ev.preventDefault();
 					$("#mascara").hide();
 					$(".window").hide();
 				});
			});
		</script>

		<style type="text/css">

		.window{
			display:none;
			width:760px;
			height:300px;
			position:absolute;
			left:0;
			top:0;
			background:#FFF;
			z-index:9900;
			padding:10px;
			border-radius:10px;
		}

		#mascara{
			position:absolute;
  			left:0;
  			top:0;
  			z-index:9000;
  			background-color:#000;
  			display:none;
		}

		.fechar{display:block; text-align:right;}

		</style>


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




<div id="lancamento">
    <div id="sobre_pedido">
     <aside>
       
        <div class="text_sua_conta"><b>Sua Conta</b></div><br> 
      <div id="dados_conta"> 
     <a href="minhaConta.php">Painel do Usuário </a><br>
   <?php 
 $results = mysql_query("SELECT * FROM cliente INNER JOIN pedido INNER JOIN itens_pedidos ON pedido.ID_CLIENTE ='$cod_usuario'  WHERE pedido.ID_PEDIDO = itens_pedidos.ID_PEDIDO ORDER BY ID_ITEM_PEDIDO DESC");
 $usuarios = mysql_fetch_array($results) ; 
 $codigo_usuario = $usuarios['ID_CLIENTE'];
      echo '<a href="alterarSenha.php?codigo='.$usuarios['ID_CLIENTE'].'"> Informações de conta </a><br>';
      echo '<a href="listaEndereco.php?codigo='.$usuarios['ID_ENDERECO'].'"> Endereco </a><br>';
 ?>
<a href="meusPedidos.php"> Meus Pedidos </a><br>
<a href="cadastroNews.php"> Cadastro de Newsletter </a>
</aside>
</div>
  <div class="conteudo_informacoes_pedido">
        <b>Seus Pedidos </b><br> 

      <?php
echo 'Olá '.$nomeUsuario.'!<br>';
   if(mysql_num_rows($results) === 0 ){
    echo "<b>Você não possui pedidos efetuados!.<br></b>";
   }else{
?>      
                <p class="texto_conteudo">Atraves deste painel você pode ver o andamento dos seus Pedidos.
                 </p>
                 </div> 
     <div class="conteudo_informacoes_2_pedido">
              <b>Informações do ultimo pedido: </b><br><br>
          <div id="box_pedido">
              <div align="center"><b >Nº Pedido</b><br></div>  
              <div align="center"> <b class="numero_pedido_texto"><?php echo $usuarios['ID_PEDIDO'];?></b></div>
          </div>
          <div class="dados_pedido">
          <?php
          if($usuarios['PAGAMENTO_PEDIDO'] === '1' ){
               echo '<b>Situacao</b>:Pago<br>';
          }else{
          echo '<b>Situacao</b>:Pendente<br>';
          }
          echo '<b>Data do pedido</b> '.substr($usuarios['DATA_PEDIDO'],0,10).'<br>';
          echo '<b>Valor</b>: R$'.number_format($usuarios['VALOR_PEDIDO'],'2','.',',').'<br>';
          echo '<b>Forma de pagamento:</b>Pendente<br>';
          echo '<a href="#janela2" rel="modal">Acompanhe seu pedido:</a>';
          ?>
          </div>
          <br>
          <br>
          
<?php 
}
echo '<b>Nome: </b>'.$nomeUsuario.'<br>';
echo '<b>Email:</b>'.$email.'<br>';

echo '<br>';
echo '<br>';
   $endereco = mysql_query("SELECT * FROM cliente RIGHT OUTER JOIN endereco ON endereco.ID_CLIENTE = '$cod_usuario ' WHERE cliente.ID_CLIENTE  = endereco.ID_ENDERECO");
?>
     <div class="window" id="janela2">
         <a href="#" class="fechar">X Fechar</a>
<?php 
$sql    = "SELECT * FROM cliente RIGHT OUTER JOIN pedido ON cliente.ID_CLIENTE =  '$cod_usuario' WHERE cliente.ID_CLIENTE = pedido.ID_CLIENTE  ORDER BY ID_PEDIDO DESC LIMIT 0,6";
$result = mysql_query($sql);
if(mysql_num_rows($result)=== 0){
   
}else{
    
echo '<table  width="760px" class="list_users" ';
echo '<caption><label><h3>Andamento do pedido</label></h3></caption>';
echo '<tr>';
echo '<td>Código do Pedido</td>';
echo '<td>Data Pedido </td>';
echo '<td>Valor Pedido</td>';
echo '<td>Pagamento Pedido</td>';
echo '<td>Entrega pedido</td>';
echo '</tr>';
while($pedido = mysql_fetch_array($result)){
    echo '<tr>';
    echo '<td >'.$pedido['ID_PEDIDO'].'</td>';
    date_default_timezone_set("BRAZIL/EAST");
    $data = new DateTime($pedido['DATA_PEDIDO']);
    echo '<td>'.$data->format('l, jS F, Y').'</td>';
    echo '<td>'.'R$'.$pedido['VALOR_PEDIDO'].'</td>';
  if($pedido['PAGAMENTO_PEDIDO'] === '1'){
        echo '<td><img class="icons" src="images/yes.png"></td>';     
    }
    if($pedido['PAGAMENTO_PEDIDO'] === '0'){
        echo '<td><img class="icons" src="images/not.png"></td>';   
    }
    echo '<td><img class="icons" src="images/yes.fw.png"></td>'; 
    echo '</tr>';
    
}
echo '</table>';
   }
   
   ?>
      </div>
            <div id="mascara"></div> 
              </div>
  </div> </div>   
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

