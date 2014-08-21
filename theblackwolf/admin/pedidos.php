<?php
include '../includes/userAdm.inc';
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico"/>
<script type="text/javascript" src="../slide.js"></script>
</head>
<body >
<div id="header">
<div id="dv1">

    <div id="bprocura2">
    </div>   

    <div id="carrinho"><a href="index.php"><img src="../images/administrator.png" height="25px"></a> &nbsp;
    <a href="../logout.php"><img src="../images/logout.png" height="25px"> </a>
</div>

<!-- lightbox-panel --><div id="lightbox-panel">
   <center> <h2>Faça seu Login </h2><p></center>
    <hr noshade size="5" width="100%" />
    <div id="login-box-label"> </div>
<div class="input-div" id="input-usuario">Email: &nbsp;
	<input type="text" value=""/>
</div>
<div class="input-div" id="input-senha">Senha:&nbsp;
	<input type="password" value="Senha" />
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
<img src="../images/logo.png" width="180" height="200"/>             
</div>

<nav id="menu">
<ul class="menu">
      <div style="width:900px; float:left;">
      <li><a href="index.php">Home</a></li>
                        <li><a href="listarUsuarios.php">Cliente</a>
    <ul>
                    <li> <a href="pedidos.php">Pedidos</a> </li>
                    <li> <a href="listarEndereco.php">Enderecos</a> </li>
              <li> <a href="listaContatos.php">Contatos</a> </li> 
    </ul>
                            <li><a href="produtos.php">Produtos</a>
        <ul>
            <li><a href="listarCategorias.php"> Categoria </a></li>
            <li><a href="pagamentos.php">Pagamentos </a></li>
    </ul>
        </li>
      <div style="width:-100px; margin-left:100px; float:right;">
            <li><a href="administrador.php">Administrador</a></li>
            <li><a href="listaLogs.php">Logs</a></li>
      <li><a href="newsletter.php">Newsletter</a></li>
    </ul>
</nav>
<section>	
<img src="../images/pedidos.png" class="icons">&nbsp;<b>Dashboard</b><br>
<form  method="post" action="buscarRegistro.php?a=buscar'"   >
<span class="buscar">
     Buscar: <input type="text" name="palavra" /><input type="submit" class="botao" name="ok" value="busca" /><br><br>  
    </span>
    </form>
<?php 
$final_query = "FROM pedido ORDER BY ID_PEDIDO ASC";   
$maximo = 1;   
// Declaração da pagina inicial
$pagina =  addslashes($_GET["pagina"]); 
 if($pagina == "") 
  { 
    $pagina = "1";
   }   
 // Calculando o registro inicial
  $inicio = $pagina - 1; 
  $inicio = $maximo * $inicio;   
  // Conta os resultados no total da query
   $strCount = "SELECT COUNT(*) AS 'num_registros' $final_query"; 
   $query = mysql_query($strCount); 
   $row = mysql_fetch_array($query); 
   $total = $row["num_registros"]; 
?>
  
 <?php
echo '<meta charset=UTF-8>';
echo "<link href='../style/styleAdmin.css' rel='stylesheet' type='text/css' />";
include '../conexao/conecta.inc';
$sql ="SELECT * FROM  pedido INNER JOIN itens_pedidos "
. "INNER JOIN cliente ON pedido.ID_PEDIDO = itens_pedidos.ID_PEDIDO AND pedido.ID_CLIENTE = cliente.ID_CLIENTE ";
$result = mysql_query($sql);
if(mysql_num_rows($result)=== 0){
    echo 'Nenhum Pedido Foi realizado!';
}
echo '<table  class="list_users" width="1000px"';
echo '<caption><h2>Pedidos efetuados</h2></caption>';
echo '<tr>';
echo '<th>Cód do Pedido</th>';
echo '<th>Cód do Produto</th>';
echo '<th>Nome cliente</th>';
echo '<th>Data Pedido </th>';
echo '<th>Valor Pedido</th>';
echo '<th>Quantidade Pedido</th>';
echo '<th>Pagamento Pedido</th>';
echo '<th>Frete Pedido</th>';
echo '<th colspan=2>Ação</th>';
echo '</tr>';
while($pedido = mysql_fetch_array($result)){
    echo '<tr>';
    echo '<td><b>'.$pedido['ID_PEDIDO'].'</b></td>';  
    echo '<td><b>'.$pedido['ID_PRODUTO'].'</b></td>'; 
    echo '<td><b>'.$pedido['NOME_CLIENTE'].'</b></td>';
    date_default_timezone_set("BRAZIL/EAST");
    $data = new DateTime($pedido['DATA_PEDIDO']);
    echo '<td>'.$data->format('l, jS F, Y').'</td>';
    echo '<td>'.'R$'.substr($pedido['VALOR_PEDIDO'],0,6).'</td>';
    echo '<td>'.$pedido['QUANTIDADE_PRODUTO'].'</td>';
    if($pedido['PAGAMENTO_PEDIDO'] === '1')
    {
    ?>
   <?php echo '<td><a href="confirm.php?acao=2&pedido='.$pedido['ID_PEDIDO'].'"><img src="../images/yes.png" alt="confirmar pedido" class="icons"></a></td>'; ?>  
    <?php  
    }
    if($pedido['PAGAMENTO_PEDIDO'] === '0')
    {
      echo '<td><a href="confirm.php?acao=1&pedido='.$pedido['ID_PEDIDO'].'"><img src="../images/not.png" alt="confirmar pedido" class="icons"></a></td>';  

    }
    if($pedido['FRETE_PEDIDO'] === '0'){
        echo '<td>Frete indefinido</td>';     
    }elseif($pedido['FRETE_PEDIDO'] === '1'){
        echo '<td><img class="icons_entrega" src="../images/logo_pac.gif"></td>';   
    }elseif($pedido['FRETE_PEDIDO'] === '2'){
        echo '<td><img class="icons_entrega" src="../images/sedex.gif"></td>';   
    }
    echo '<td> <a href=verPedido.php?codigo='.$pedido['ID_PEDIDO'].'> <img src="../images/download.png" class="icons" />  </a></td>';
    echo '<td> <a href=deletaPedido.php?codigo='.$pedido['ID_PEDIDO'].'> <img src="../images/delete6.png" class="icons" />  </a></td>';
    echo '</tr>';
    }
    $sql           = "SELECT * FROM  pedido WHERE PAGAMENTO_PEDIDO = true";
    $result        =  mysql_query($sql);
    $pedidos       = mysql_fetch_array($result);
    $totalCompras  = 0;
    $totalCompras += $pedidos['VALOR_PEDIDO'];
    $numPedidos    =  mysql_num_rows($result);
    $sql           = "SELECT * FROM  pedido WHERE PAGAMENTO_PEDIDO = false";
    $result        =  mysql_query($sql);
    $numPendente   =  mysql_num_rows($result);
    echo  'Quantidade de pedidos pagos:'.$numPedidos.'<br>';
    echo  'Quantidade de pedidos pendentes:'.$numPendente.'<br>';
    echo 'Valor Total em Compras:<label class="numero_pedido_texto">R$:'.$totalCompras.'</label>';
    echo '</table>';
// FIM DO CONTEUDO  
$menos = $pagina - 1; $mais = $pagina + 1;   $pgs = ceil($total / $maximo);   if($pgs > 1 ) {   echo "<br />";  
 // Mostragem de pagina 
 if($menos > 0) 
  { 
    echo "<a href=".$_SERVER['PHP_SELF']."?pagina=$menos>anterior</a>&nbsp; ";
     }  
  // Listando as paginas 
 for($i=1;$i <= $pgs;$i++)
  { 
    if($i != $pagina) 
      { echo "  <a  href=".$_SERVER['PHP_SELF']."?pagina=".($i).">$i</a> | ";
       } else 
       { echo "<strong clas>".$i."</strong> | "; 
     } 
   }   if($mais <= $pgs) 
   { echo " <a  href=".$_SERVER['PHP_SELF']."?pagina=$mais>próxima</a>"; 
 } 
} 
?>

    </form>
</div>
</div>
</section>
</div>
</body>
</html>


