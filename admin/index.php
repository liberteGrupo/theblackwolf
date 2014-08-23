<?php
include '../includes/userAdm.inc';
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico"/>
<title>The Black Wolf</title>
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
<div class="conteudo_adm">
    <div class="caixa_admin">
    <img src="../images/home.png" class="icons">&nbsp;<b>Dashboard</b><br>
<?php
echo 'Bem vindo:'.$nomeUsuario;
$sql         ="SELECT * FROM cliente";
$result      = mysql_query($sql);
$hoje        = date('Y/m/d');
$query       ="SELECT * FROM metas WHERE DATA_META =  '$hoje' ";
$result2     = mysql_query($query);
$numMeta     = mysql_num_rows($result2);
$numClientes = mysql_num_rows($result);
$sql         ="SELECT * FROM itens_pedidos";
$result      = mysql_query($sql);
$numPedidos  = mysql_num_rows($result);
?>
<div id="estatisticas">
<h2>Estatisticas</h2>
<b>Numero de Clientes :</b><?php echo $numClientes;?> <br>
<b>Numero de Pedidos :</b><?php echo $numPedidos;  ?> 
</div>
<?php
$hoje = date('Y-m-d');
$sql ="SELECT * FROM itens_pedidos RIGHT OUTER JOIN pedido ON pedido.ID_PEDIDO =  itens_pedidos.ID_PEDIDO  ";
$result = mysql_query($sql);
if(mysql_num_rows($result)=== 0){
 echo 'Nenhum Pedido Foi realizado hoje!.<br>';
}else{
echo '<table class="list_users" width="1000px" ';
echo '<tr>';
echo '<td> <label>Código do Pedido</label></td>';
echo '<td> Data Pedido </td>';
echo '<td> Valor Pedido</td>';
echo '<td> Pagamento Pedido</td>';
echo '<td> Tipo de frete</td>';
echo '<td colspan=2>Ação</td>';
echo '</tr>';
while($pedido = mysql_fetch_array($result)){
    echo '<tr>';
    echo '<td><b>'.$pedido['ID_PEDIDO'].'</b></td>'; 
    echo '<td>'.$pedido['DATA_PEDIDO'].'</td>';
    echo '<td>'.'<b>R$</b>'.$pedido['VALOR_PEDIDO'].'</td>';
    //echo '<td>'.$pedido['QTDE_PRODUTO'].'</td>';
    if($pedido['PAGAMENTO_PEDIDO'] === '1'){
       echo '<td><img class="icons" src="../images/yes.png"></td>';     
    }
    if($pedido['PAGAMENTO_PEDIDO'] === '0'){
       echo '<td><img class="icons" src="../images/not.png"></td>';   
    }
    if($pedido['FRETE_PEDIDO'] === '0'){
        echo '<td>Frete indefinido</td>';     
    }elseif($pedido['FRETE_PEDIDO'] === '1'){
        echo '<td><img class="icons_entrega" src="../images/logo_pac.gif"></td>';   
    }elseif($pedido['FRETE_PEDIDO'] === '2'){
        echo '<td><img class="icons_entrega" src="../images/sedex.gif"></td>';   
    }
    echo '<td> <a href=frmAtualizarUsuario.php?codigo='.$pedido['ID_CLIENTE'].'> <img src="../images/edit2.png" class="icons" /> </a></td>';
    echo '<td> <a href=excluirUsuario.php?codigo='.$pedido['ID_CLIENTE'].'> <img src="../images/delete6.png" class="icons" />  </a></td>';
    echo '</tr>';
    $totalCompras = 0;
    $totalCompras += $pedido['VALOR_PEDIDO'];
}
echo '<caption><b><label>Ultimos  pedidos Relizados até o momento:</label></b></caption>';
echo "<div class='totalCompras'>Total em compras efetuadados:</label><b class='texto_error' >R$".$totalCompras."</b></div>";
}
?>
        
        <div  class='cadastraMeta' >
       
         <?php 
       if($numMeta === 0 ){
echo "Nenhuma meta cadastrada para hoje!<br><br>";   
?>
  <a href='cadastraMeta.php'><input type="submit" name="inserir" value="Cadastrar meta" class="botaoAdm"><br>
<?php 
       }else
       {
      $meta          = mysql_fetch_array($result2);
      $hoje          = date('Y-m-d');
      $sql           ="SELECT * FROM itens_pedidos RIGHT OUTER JOIN pedido ON pedido.ID_PEDIDO =  itens_pedidos.ID_PEDIDO WHERE DATA_PEDIDO >= '$hoje' ";
      $pedido        = mysql_fetch_array($result);
      $totalCompras += $pedido['VALOR_PEDIDO'];
      if($meta['VALOR_META'] > $totalCompras){
      echo "<label class='texto_error'>Valor da Meta Não atingida ainda!</label>";
      echo " Valor da meta:<b class='texto_error'>R$:".$meta['VALOR_META']."</b>";;
      }else
      {
       echo "META ATINGIDA!<br>";
       echo " Valor da meta:".$meta['VALOR_META']."</label>";
      }
       }
         ?>
         </div></a>
   
    </form>  
</table>
    </form>
</div>
</div>



</body>
</html>