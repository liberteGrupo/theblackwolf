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
             if(empty($_POST['prod'])){

}else{
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
<?php 
echo '<meta charset=utf-8>';
require_once 'conexao/conecta.inc';
include 'includes/funcoesuteis.inc';
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
<div class="produtos"> 
<div align="left"><h2><img src="images/cart.png" width="40px" />&nbsp;&nbsp;Carrinho de compra</h2></div>
<table class="list_users" width="1000px" height="200px" >
  <tr>
    <th width="107" scope="col">Nome</th>
    <th width="133" height="23" scope="col">Imagem</th>
    <th width="83" scope="col">Qtde</th>
    <th width="83" scope="col">Preço</th>
    <th width="108" scope="col">Subtotal</th>
    <th width="121" scope="col">Remover</th>
    </tr>
 <form action="?acao=up" method="post">
 <?php
                     if(count($_SESSION['carrinho']) == 0){
                      echo '<tr><td colspan="6">Não há produto no carrinho</td></tr>'; 
                     }else{
                      include("conexao/conecta.inc");
                      $total = 0;
                      foreach($_SESSION['carrinho'] as $id => $qtd){
                              $sql   = "SELECT *  FROM produto WHERE ID_PRODUTO= '$id'";
                              $qr    = mysql_query($sql) or die(mysql_error());
                              $ln    = mysql_fetch_assoc($qr);
                              if($qtd >= 100){
                                 $qtd = 99;
                              }
                              if ($qtd <= 0) {
                                $qtd = 0;
                              }
                              $nome  = $ln['NOME_PRODUTO'];
                              $preco = number_format($ln['PRECO_PRODUTO'], 2, ',', '.');
                              $sub   = number_format($ln['PRECO_PRODUTO'] * $qtd, 2, ',', '.');
                              $total += $ln['PRECO_PRODUTO'] * $qtd;
                              $qtde =  $ln['QTDE_PRODUTO'];
     
                        ?>
       
              <tr>
              <td><?php echo $nome;?></td>
              <td><img src="images/<?php echo $ln['PRODUTO_IMAGEM']; ?>"  class="cart_img"/></td>
              <?php echo '<td> <input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>'; ?> 
              <td><?php echo $preco; ?> </td>
              <td><?php echo $sub; ?> </td>
              <?php echo '<td><a href="?acao=del&id='.$id.'"><img src="images/delete.png" alt="excluir_carrinho" class="cart_icon"></a></td>'; ?>                      
                      <?php     
                              
                        }
                           $total = number_format($total, 2, ',', '.');
                           echo '<tr>
                                    <td rowspan="2" colspan="1"><b>Total :</b></td>
                                    <td rowspan="2">R$ '.$total.'</td>
                              </tr>';
                     }
                  ?>
</tr>
    <td height="23">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="atualizaProduto" value="atualiza carrinho" class="botaoAdm" /></td>
    
    </form>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="23"></td>
    <td></td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="home.php" class="botao" ><button class="botao" >Continuar Comprando</button></a></td>
    <td>&nbsp; </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right" class="finalizar_pedido"><a href="pedidoFinaliza.php"> <button class="botao" > Finalizar Pedido</button></td>
  </tr>
  
</table>
    <div class="calcula_frete">
     <caption><b> Calcula Frete</b> </caption><br><br>
      Digite seu cep abaixo<br>
      CEP:<input type="text" name="cep" /><br><br>
      <input type="submit" name="acao" value="Calcular" class="botao">
    </div>
  </div>  </div>

