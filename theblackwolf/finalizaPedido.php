<?php 
include 'conexao/conecta.inc';
include 'includes/funcoesuteis.inc';
validaAutenticacao('RES', 'autentica_usuario.php');
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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
<title>The Black Wolf</title>
<script src="js/jquery.js"></script>
</head>
<body>
<nav>
  <div id="faixa">
<div id="carrinho"><a href="carrinho.php"><img src="images/carrinho2.png" height="20px"></a> 
        &nbsp;&nbsp;&nbsp;<a href="minhaConta.php"><img src="images/adm.png" height="20px"></a>&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="images/logout3.png" height="20px"></a>
</div>

<div id="logo">
 
<img src="images/logo.png" width="180" height="200"/>             
</div>

  
<nav id="menu">
<?php 
include 'includes/menu.php';
?>
</nav>
                      
<ul class="menu2">

	        <li><a href="index.php">Interatividade</a></li>
              <li><a href="index.php">Sobre</a></li>
              
  
    
      </li>                                 
</ul>
 </li>
  	
 </ul>
	 </div>
     </nav>




            
  



<section>
<div id="banner">
    <span class="texto_finaliza_produto">Finalizar Compra</span> 
     <div class="carrinho_produtos_finaliza_pedido">
        <table width="800" height="70" >
            <head>
          <tr>
              <th> Produto</th>
            <th >Imagem</th>
            <th >Quantidade</th>
            <th >Pre&ccedil;o</th>
            <th >SubTotal</th>
            <th >Remover</th>
          </tr>
    </head>
            <form action="?acao=up" method="post">
<foot>
           
</foot>

        <?php
        echo '<meta charset=UTF-8>';            
        if(count($_SESSION['carrinho']) == 0){
                        echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                     }else{
                        include("conexao/conecta.inc");
                         $total = 0;
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                              $sql   = "SELECT *  FROM produto WHERE ID_PRODUTO= '$id'";
                              $qr    = mysql_query($sql);
                              $ln    = mysql_fetch_assoc($qr);
                               
                              $nome  = $ln['NOME_PRODUTO'];
                              $preco = number_format($ln['PRECO_PRODUTO'], 2, ',', '.');
                              $sub   = number_format($ln['PRECO_PRODUTO'] * $qtd, 2, ',', '.');
                              $total += $ln['PRECO_PRODUTO'] * $qtd;
                              
                        ?>
        <tr>
              <td align="center"><?php echo $nome;?></td>
          <td align="center"><img src="images/<?php echo $ln['PRODUTO_IMAGEM']; ?>"  class="cart_img"/></td>
              <?php echo '<td align="center"> <input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>'; ?> 
              <td align="center"><?php echo $preco; ?> </td>
              <td align="center"><?php echo $sub; ?> </td>
              <?php echo '<td align="center" ><a href="?acao=del&id='.$id.'"><img src="images/delete.png" alt="excluir_carrinho" class="cart_icon"></a></td>'; ?>                      
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
               <td colspan="2" ><input type="submit" value="Atualizar Carrinho" class="botao" /></td>                          
            <tr>
         </tbody>
        </form>
         </table> 
         <?php 
         $data_hora = date("Y-m-d H:i:s");
         $pagamento = '0';
         $frete = '1';
         if(isset($_POST['enviar'])){
            $inseriPedido = mysql_query("INSERT INTO pedido (ID_CLIENTE,DATA_PEDIDO,VALOR_PEDIDO,PAGAMENTO_PEDIDO,FRETE_PEDIDO) VALUES('$cod_usuario','$data_hora','$total','$pagamento','$frete')");
            $idPedido = mysql_insert_id();
            foreach ($_SESSION['carrinho'] as $ProdInsert => $qtd):
              $inseri_itens_pedido =  "INSERT INTO itens_pedidos (ID_PEDIDO,ID_PRODUTO,QUANTIDADE_PRODUTO,VALOR_PEDIDO,DATA_ITEM,PEDIDO)";
              $inseri_itens_pedido .= "VALUES('$idPedido','$ProdInsert','$qtd','$total','$data_hora')"; 
              if(mysql_query($inseri_itens_pedido))
             {
              $ln = $ln - 1;  
              }   
            endforeach;
            echo '<script> alert("Compra Concluida Com sucesso!");</script>';
            echo mysql_error();
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
*/ ?><form method="post" enctype="multipart/formdata" action="<?php $_SERVER['PHP_SELF'] ?>">
<div align="right" class="finalizar_pedido_2">
<input type="submit" class="botao" name="enviar" value="enviar" />
<input type="hidden"  name="id" value="<?php echo $dados->ID_PRODUTO;?>" />
</div>
</div>
    </div>
    
    <div class="endereco_entrega_finaliza_pedido"
        <b><span>Endereco de onde será entregue o produto</span></b><br> <br>
             <?php 
             $results = mysql_query("SELECT * FROM cliente INNER JOIN endereco ON cliente.ID_ENDERECO = '.$cod_usuario.'");
             $usuarios = mysql_fetch_array($results) ; 
             $consulta = mysql_num_rows($results);
   if($consulta === 0){
echo 'Voce nao possui enderecos Cadastrados Deseja Cadastrar <a href="inserirEndereco.php" class="banco">Inserir Endereco</a>';
   }else{
    echo '<b>Nome :</b>'.$nomeUsuario.'<br>';
    echo '<b>CPF :</b>'.$usuarios['CPF_CLIENTE'].'<br>';    
    echo '<b>Bairro :</b>'.$usuarios['BAIRRO'].'<br>';   
    echo '<b>Endereco :</b>'.$usuarios['ENDERECO'].'<br>'; 
    echo '<b>Numero :</b>'.$usuarios['NUMERO'].'<br>'; 
    echo '<a href="editarEndereco.php?codigo='.$usuarios['ID_ENDERECO'].'" class="botao">Editar Endereco </a> <br> <br>';         
   }
     ?>        
           </div>  
        </div>      
  <div class="formaDeEnvio"> 
      <span>Escolha a forma de envio </span><br><br>
      <input type="radio" name="1">Encomenda normal (PAC)<br>
      <input type="radio" name="2">SEDEX<br>
      <input type="radio" name="3">Tipo de frete não especificado<br>
   </div>
</form>
 <div id="lancamento">
  </div>
</section>
<footer>
<div id="mapa1">
  CDS  <br />  
  <a href="pop.html" class="texto">Pop</a> <br />
  <a href="" class="texto">Rock</a><br />
  <a href="#" class="texto">Punk</a><br />
    <a href="#" class="texto">Metal</a><br />
    <a href="#"  class="texto">Eletronica</a><br />
 </div>
<div id="mapa2">
CAMISETAS<br />
<a href="#">Feminino</a><br />
<a href="#">Masculino</a>
 </div>
<div id="pagamento">
 FORMAS DE PAGAMENTO <br />   
    <img src="images/pagamento.jpg" width="142" height="131"/>
</div>
<div id="redes">
REDES SOCIAIS<br />
<a href="#"><img src="images/insta.jpg"/></a>
<a href="#"><img src="images/face.jpg" /></a>
<a href="#"><img src="images/twitter.jpg" /></a>
</div>
</footer>
</body>
</html>