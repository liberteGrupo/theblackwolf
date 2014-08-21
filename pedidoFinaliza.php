<?php 

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
<section>

    <span class="texto_finaliza_produto">Finalizar Compra</span> 
    
<h2><label>Carrinho de compra</label></h2>
<table  class="list_users" width="1000px">
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
 
                        if(count($_SESSION['carrinho']) === 0){
                        echo '<tr><td colspan="4">Não há produto no carrinho</td></tr>';
                        $total = '0';
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

    <td height="23">&nbsp;</td>
    <td>&nbsp;</td>
    <?php
    if($total === 0 or $_SESSION['carrinho']=== 0){
 
    }else{
        ?>
    <td><input type="submit" name="atualizaProduto" value="atualiza carrinho"  /></td>
 <?php
    }
 ?>
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
    <td><a href="home.php"  >&nbsp;&nbsp;&nbsp;<button class="botao" >Continuar Comprando</button></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"></td>
  </tr>
</table>
         <?php 
         date_default_timezone_set("BRAZIL/EAST");
		 
         $data_hora = date("Y/m/d H:i:s");
         $pagamento = '0';
         if(isset($_POST['enviar'])){
             if(isset($_POST['frete']) && $_POST['frete']  === 'pac'){
            $frete = '1';
              }elseif(isset($_POST['frete']) && $_POST['frete'] === 'sedex'){
            $frete = '2';     
             }
            if($total === '0' or $cod_usuario === '' or $_SESSION['carrinho'] === '' or empty($_SESSION['cod_usuario']) or empty($_SESSION['nomeUsuario']))
            {   
                echo '<script> alert("Você precisa estár logado para comprar!");
                header.href=autentica_usuario.php;
                </script>';
      
            }else{
              $inseriPedido = mysql_query("INSERT INTO pedido (ID_CLIENTE,DATA_PEDIDO,VALOR_PEDIDO,PAGAMENTO_PEDIDO,FRETE_PEDIDO) VALUES('$cod_usuario','$data_hora','$total','$pagamento','$frete')");
              $idPedido = mysql_insert_id();
            foreach ($_SESSION['carrinho'] as $ProdInsert => $qtd):
              $inseri_itens_pedido =  "INSERT INTO itens_pedidos (ID_PEDIDO,ID_PRODUTO,QUANTIDADE_PRODUTO,VALOR_PEDIDO,DATA_ITEM_PEDIDO)";
              $inseri_itens_pedido .= "VALUES('$idPedido','$ProdInsert','$qtd','$total','$data_hora')"; 
              if(mysql_query($inseri_itens_pedido))
             {
              echo '<script> alert("Compra Concluida Com sucesso!");</script>';
              unset($_SESSION['carrinho']);
              include 'funcoes/logRegistros.php';
              $mensagem  = 'Usuario comprou no site';
              salvaLog($mensagem);  
              }  
             endforeach;
            echo mysql_error();
            }
          }
       
         ?>
<?php /*
require_once 'pagseguro/PagSeguroLibrary/PagSeguroLibrary.php';
if(isset($_POST['ok'])){
    
    $query = "SELECT * FROM produto WHERE ID_PRODUTO='$id'";
    $dados = mysql_query($query);
    $dados_produto = mysql_fetch_object($dados);
    $paymentRequest = new PagSeguroPaymentRequest();
    
    $paymentRequest->addItem($dados_produto->ID_PRODUTO, $dados_produto->NOME_PRODUTO,  1,$dados_produto->PRECO_PRODUTO); 
    
    $paymentRequest->setSender(  
    $_POST['nome'],   
     $_POST['email'],   
     $_POST['ddd'],   
    $_POST['telefone'] 
);
    $paymentRequest->setShippingAddress(  
    $_POST['cep'],   
    $_POST['endereco'],       
     $_POST['numero'],             
     $_POST['cidade'],      
    $_POST['estado'],   
    'BRA'        
);
    $paymentRequest->setCurrency("BRL");
    $paymentRequest->setShippingType(1);  
    $paymentRequest->setReference($dados_produto->ID_PRODUTO);  
    // Informando as credenciais
    $credentials = new PagSeguroAccountCredentials(  
    'suporte@lojamodelo.com.br',   
    '95112EE828D94278BD394E91C4388F20'  
);  
// fazendo a requisição a API do PagSeguro pra obter a URL de pagamento  
$url = $paymentRequest->register($credentials);  
}
*/ 
        
?>
<form method="post" enctype="multipart/formdata" action="<?php $_SERVER['PHP_SELF'] ?>">
<div  class="finalizar_pedido_2">
<input type="submit" class="botao" name="enviar" value="Finalizar " />
</div>
    <?php
    if(!(isset($_SESSION['cod_usuario']))){
        
    }else{
    ?>
    <div class="endereco_entrega_finaliza_pedido">
  <label>Endereco de onde será entregue o produto</label>
             <?php 
             $results = mysql_query("SELECT * FROM cliente RIGHT OUTER JOIN endereco ON cliente.ID_CLIENTE = '$cod_usuario' WHERE cliente.ID_CLIENTE = endereco.ID_ENDERECO ");
             $usuarios = mysql_fetch_array($results) ; 
             $consulta = mysql_num_rows($results);
      if($consulta === 0){
      echo 'Voce não esta logado';
      }else{
     echo '<b>Nome :</b>'.$nomeUsuario.'<br>';
     echo '<b>CPF :</b>'.$usuarios['CPF_CLIENTE'].'<br>';    
     echo '<b>Bairro :</b>'.$usuarios['BAIRRO'].'<br>';   
     echo '<b>Endereco :</b>'.$usuarios['ENDERECO'].'<br>'; 
     echo '<b>Numero :</b>'.$usuarios['NUMERO'].'<br>'; 
    
        }
    }
        ?>        
           </div>  
    
      <div class="formaDeEnvio"> 
      <label>Escolha a forma de envio :</label><br>
      <input type="radio" name="frete" value="sedex">Encomenda normal(PAC)<br>
      <input type="radio" name="frete" value="pac">SEDEX<br>
   </div>
</form>

</section>

</body>
</html>