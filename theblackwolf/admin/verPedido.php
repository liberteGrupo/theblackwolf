<?php
include '../includes/userAdm.inc';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../styles/style.css" rel="stylesheet" type="text/css" />
       
    </head>
    <body>
  <ul class="tabs-ex">
    <li>
      <input type="radio" name="content" id="content-1">
      <label for="content-1">Pedido</label>
      <article>
        <h2>Conteudo 1</h2>
        
        <p>Conteúdo 1</p>

      </article>  
    </li>

    <li>
      <input type="radio" name="content" id="content-2">
      <label for="content-2">Cliente</label>
      <article>
        <?php
include '../conexao/conecta.inc';
echo '<meta charset=UTF-8>';
$id  = $_GET['codigo']; 
echo "<link href='../style/styleAdmin.css' rel='stylesheet' type='text/css' />";
include '../conexao/conecta.inc';
$sql ="SELECT * FROM  pedido INNER JOIN itens_pedidos ON pedido.ID_PEDIDO = itens_pedidos.ID_PEDIDO WHERE itens_pedidos.ID_PEDIDO = '$id'";
$result = mysql_query($sql);
if(mysql_num_rows($result)=== 0){
    echo 'Nenhum Pedido Foi realizado!';
}
echo '<table  ';
echo '<tr>';
echo '<th>Código do Pedido</th>';
echo '<th>Código do Produto</th>';
echo '<th>Data Pedido </th>';
echo '<th>Valor Pedido</th>';
echo '<th>Quantidade Pedido</th>';
echo '<th>Pagamento Pedido</th>';
echo '</tr>';
while($pedido = mysql_fetch_array($result)){
    echo '<tr>';
    echo '<td><b>'.$pedido['ID_PEDIDO'].'</b></td>';  
    echo '<td><b>'.$pedido['ID_PRODUTO'].'</b></td>';  
    echo '<td>'.$pedido['DATA_PEDIDO'].'</td>';
    echo '<td>'.'R$'.substr($pedido['VALOR_PEDIDO'],0,6).'</td>';
    echo '<td>'.$pedido['QUANTIDADE_PRODUTO'].'</td>';
     if($pedido['PAGAMENTO_PEDIDO'] === '1'){
          echo '<td><img class="icons" src="../images/yes.png"></td>';     
          ?>
<a href="confirm.php?acao=1&&pagamento="<?php $pedido['ID_PEDIDO']?>><img class="icons" src="../images/yes.png"></a>
          <?php
    }
    if($pedido['PAGAMENTO_PEDIDO'] === '0'){
          echo '<td></td>';   
          ?>
<a href="confirm.php?acao=2&&pagamento="<?php $pedido['ID_PEDIDO']?>><img class="icons" src="../images/not.png"></a>         
 <?php
    }
    echo '</tr>';
}
    echo '</table>';
?>
      </article>  
    </li>
    <li>
      <input type="radio" name="content" id="content-3">
      <label for="content-3">Histórico</label>
      <article>
        <h2>Conteudo 3</h2>
        
        <p>Conteúdo 3</p>

      </article>  
    </li>
</ul>
    </body>
</html>
