<?php
include '../includes/userAdm.inc';
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico"/>
<script type="text/javascript" src="../slide.js"></script>
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
	<input type="password" value"Senha"/>
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
    <img src="../images/contato.jpg" class="icons">&nbsp;<b>Dashboard</b><br>

   <?php 
   include '../conexao/conecta.inc';
$sql ="SELECT * FROM contato";
$result = mysql_query($sql);
if(mysql_num_rows($result) === 0)
    {
    echo '<label>Nenhum Contato Enviado! </label>';
    }else{
echo '<table  class="list_users" width="1000px"  ';
echo '<caption><label><h2><b>Contatos Recebidos</h2></b></label></caption>';
echo '<tr>';
echo '<th>Código do Contato</th>';
echo '<th>Nome</th>';
echo '<th>Email</th>';
echo '<th>Mensagem</th>';
echo '<th colspan=3s>Ação</th>';
echo '</tr>';
while($contato = mysql_fetch_array($result)){
    echo '<tr>';
    echo '<td>'.$contato['ID_CONTATO']. '</td>';  
    echo '<td>'.$contato['NOME_CLIENTE']. '</td>'; 
    echo '<td>'.$contato['EMAIL_CLIENTE']. '</td>';
    echo '<td>'.substr($contato['MENSAGEM_CLIENTE'],0,20). '...</td>';
    echo '<td> <a href=excluirContato.php?codigo='.$contato['ID_CONTATO'].' class="texto_error"> Responder Contato</a></td>';
    echo '<td> <a href=excluirContato.php?codigo='.$contato['ID_CONTATO'].'> <img src="../images/delete6.png" class="icons" />  </a></td>';
    echo '</tr>';
    
}
echo '</table>';
} 
       ?>


</div>
</section>



</div>



</body>
</html>

