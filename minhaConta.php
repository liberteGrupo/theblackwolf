<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico"/>
<script type="text/javascript" src="slide.js"></script>
<title>The Black Wolf</title>
</head>
<body>
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




    <div id="sobre">
  
    <aside>
        <div class="text_sua_conta"><b>Sua Conta</b></div><br> 
            <div id="dados_conta">
      <a href="minhaConta.php"> Painel do Usuário </a><br>
   <?php 
 $results = mysql_query("SELECT * FROM cliente RIGHT OUTER JOIN endereco ON cliente.ID_CLIENTE ='$cod_usuario' WHERE cliente.ID_ENDERECO =  endereco.ID_ENDERECO");
 $usuarios = mysql_fetch_array($results) ; 
      echo '<a href="alterarSenha.php?codigo='.$usuarios['ID_CLIENTE'].'"> Informações de conta </a><br>';
      echo '<a href="listaEndereco.php?codigo='.$usuarios['ID_ENDERECO'].'"> Enderecos </a><br>';
?>
<a href="meusPedidos.php"> Meus Pedidos </a><br>
<a href="cadastroNews.php"> Cadastro de Newsletter </a>
</div>
</aside>
    
    <div class="conteudo_informacoes">
   <b>Seu painel</b><br> 

      <?php
echo 'Olá '.$nomeUsuario.'!';
   
    
?>      
                <p class="texto_conteudo">Através do Painel de Sua Conta você pode visualizar suas atividades recentes e
   atualizar suas informações. 
   Selecione um link abaixo para visualizar ou editar suas informações.
                 </p>
                 </div> 
     <div class="conteudo_informacoes_2"><br>
              <b>Informações da conta</b><br>
          Dados do Usuario <br>
<?php 
echo $nomeUsuario.'<br>';
echo $email.'<br>';
echo '<b><a href=alterarSenha.php?codigo='.$usuarios['ID_CLIENTE'].'   > Alterar Senha </a></b>';
echo '<br>';
?>
    </div>
           <div class="conteudo_informacoes_3">
        <b>Endereco de Entrega</b><br> <br>
             <?php   
      $consulta = mysql_num_rows($results);
   if($consulta === 0){
echo 'Voce nao possui enderecos Cadastrados Deseja Cadastrar <a href="inserirEndereco.php" class="banco"><b>Inserir Endereco</b></a>';
   }else{
    echo 'Nome :'.$nomeUsuario.'<br>';
    echo 'Estado :'.$usuarios['ESTADO'].'<br>';    
    echo 'Bairro :'.$usuarios['BAIRRO'].'<br>';   
    echo 'Endereco :'.$usuarios['ENDERECO'].'<br>'; 
    echo 'Numero :'.$usuarios['NUMERO'].'<br>'; 
    echo '<b><a href="editarEndereco.php?codigo='.$usuarios['ID_ENDERECO'].'" >Editar Endereco </a> </b><br> <br>';         
    echo '<div id="endereco_cobranca">';
    echo '<b>Endereco de Cobrança</b><br><br> ';
          
    echo 'Nome :'.$nomeUsuario.'<br>';
    echo 'Estado :'.$usuarios['ESTADO'].'<br>';    
    echo 'Bairro :'.$usuarios['BAIRRO'].'<br>';   
    echo 'Endereco :'.$usuarios['ENDERECO'].'<br>'; 
    echo 'Numero :'.$usuarios['NUMERO'].'<br>'; 
    echo '<b><a href="editarEndereco.php?codigo='.$usuarios['ID_ENDERECO'].'" >Editar Endereco </a></b><br><br>';         
   }
     ?>
          
                     </div>
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

