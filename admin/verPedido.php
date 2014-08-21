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
                    <li> <a href="pedidoss.php">pedidoss</a> </li>
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
<img src="../images/pedidoss.png" class="icons">&nbsp;<b>Dashboard</b><br>
 <ul class="tabs-ex">
    <li>
      <input type="radio" name="content" id="content-1">
      <label for="content-1">pedidos</label>
      <article>
            <?php
include '../conexao/conecta.inc';
echo '<meta charset=UTF-8>';
$id  = $_GET['codigo']; 
echo "<link href='../style/styleAdmin.css' rel='stylesheet' type='text/css' />";
include '../conexao/conecta.inc';
$sql ="SELECT * FROM  pedidos INNER JOIN itens_pedidoss ON pedidos.ID_pedidos = itens_pedidoss.ID_pedidos WHERE itens_pedidoss.ID_pedidos = '$id'";
$result = mysql_query($sql);
if(mysql_num_rows($result)=== 0){
    echo 'Nenhum pedidos Foi realizado!';
}
echo '<table  ';
echo '<tr>';
echo '<th>Código do pedidos</th>';
echo '<th>Código do Produto</th>';
echo '<th>Data pedidos </th>';
echo '<th>Valor pedidos</th>';
echo '<th>Quantidade pedidos</th>';
echo '<th>Pagamento pedidos</th>';
echo '</tr>';
while($pedidos = mysql_fetch_array($result)){
    echo '<tr>';
    echo '<td><b>'.$pedidos['ID_pedidos'].'</b></td>';  
    echo '<td><b>'.$pedidos['ID_PRODUTO'].'</b></td>';  
    echo '<td>'.$pedidos['DATA_pedidos'].'</td>';
    echo '<td>'.'R$'.substr($pedidos['VALOR_pedidos'],0,6).'</td>';
    echo '<td>'.$pedidos['QUANTIDADE_PRODUTO'].'</td>';
     if($pedidos['PAGAMENTO_pedidos'] === '1'){
          echo '<td><img class="icons" src="../images/yes.png"></td>';     
          ?>
<img class="icons" src="../images/yes.png">
          <?php
    }
    if($pedidos['PAGAMENTO_pedidos'] === '0'){
          echo '<td></td>';   
          ?>
<img class="icons" src="../images/not.png">< /a>        
 <?php
    }
    echo '</tr>';
}
    echo '</table>';
?>    

      </article>  
    </li>

    <li>
      <input type="radio" name="content" id="content-2">
      <label for="content-2">Cliente</label>
      <article>

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
</div>
</div>
</section>
</div>
</body>
</html>
