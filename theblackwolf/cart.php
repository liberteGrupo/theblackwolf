<?php
 session_start();
       
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

<a id="show-panel" href=""></a>
<div id="carrinho"><a href="meuCarrinho.php">Meu Carrinho</a> <img src="images/carrinho2.png" height="20px">
        &nbsp;&nbsp;&nbsp;<a href="minhaConta.php">Minha Conta</a>&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a>
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
<div id="lancamento">

<div class="produtos"> 
<table class="list_users" width="100%" height="100%">
  <tr>
    <th width="107" scope="col">Nome</th>
    <th width="133" height="23" scope="col">Iimagem</th>
    <th width="83" scope="col">Qtde</th>
    <th width="108" scope="col">Subtotal</th>
    <th width="121" scope="col">Remover</th>
  </tr>
 <?php
                     if(count($_SESSION['carrinho']) == 0){
                        echo '<tr><td colspan="4">Não há produto no carrinho</td></tr>';
                        
                        
                        
                     }else{
                        include("conexao/conecta.inc");
                         $total = 0;
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                              $sql   = "SELECT *  FROM produto WHERE ID_PRODUTO= '$id'";
                              $qr    = mysql_query($sql) or die(mysql_error());
                              $ln    = mysql_fetch_assoc($qr);
                               
                              $nome  = $ln['NOME_PRODUTO'];
                              $preco = number_format($ln['PRECO_PRODUTO'], 2, ',', '.');
                              $sub   = number_format($ln['PRECO_PRODUTO'] * $qtd, 2, ',', '.');
                              $total += $ln['PRECO_PRODUTO'] * $qtd;
                              
                        ?>
        <tr>
            <td><?php echo $nome;?></td>
          <td><img src="images/<?php echo $ln['PRODUTO_IMAGEM']; ?>"  class="cart_img"/></td>
              <?php echo '<td> <input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>'; ?> 
              <td><?php echo $preco; ?> </td>
              <td><?php echo $sub; ?> </td>
              <?php echo '<td><a href="?acao=del&id='.$id.'"><img src="images/delete.png" alt="excluir_carrinho" class="cart_icon"></a></td>'; ?>                      
        </tr>
                      <?php     
                              
                        }
                           $total = number_format($total, 2, ',', '.');
                           echo '<tr>
                                    <td colspan="5">Total :</td>
                                    <td>R$ '.$total.'</td>
                              </tr>';
                     }
              ?>
  <tr>
    <td height="23">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td height="23">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Total:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><button class="botao" ><a href="home.php" class="botao" >Continuar Comprando</button></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right" class="finalizar_pedido"><a href="finalizaPedido.php"> <button class="botao" > Finalizar Pedido</button></td>
  </tr>
</table>
   <div align="left" class="continuar_comprando"> 
      </td>
  
     </div></div>
 </div>
    <div align="center" class="calcula_frete">
     <caption><b> Calcula Frete</b> </caption><br><br>
      Digite seu cep abaixo<br>
      CEP:<input type="text" name="cep" />
      <input type="submit" name="acao" value="Calcular" class="botao">
    </div>
  </div>  </div>

