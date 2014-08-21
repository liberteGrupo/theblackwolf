<?php
include '../includes/userAdm.inc';
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico"/>
<script type="text/javascript" src="../js/jquery.js"></script>
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
    <div class="faixa_adm"><img src="../images/casa.png" class="icons"></div>
 <h2>Busca de Enderecos</h2>
<form method="GET" action="busca.php" id="pesquisa">
<label for="consulta">Buscar:</label>
<input type="text" id="consulta" name="consulta" maxlength="255" />
<input type="submit" value="OK"  class="botaoAdm"/>
</form>
<div id="resultado">
 <?php
 echo '<table  class="list_users" width="1000px"';
echo '<tr>';
echo '<th>Código</th>';
echo '<th>Cidade</th>';
echo '<th>Endereco</th>';
echo '<th>Bairro</th>';
echo '<th>Numero</th>';
echo '<th>CEP</th>';
echo '<th>Telefone</th>';
echo '<th>Celular</th>';
echo '</tr>';
$sql ="SELECT * FROM cliente INNER JOIN endereco ON cliente.ID_ENDERECO = endereco.ID_ENDERECO WHERE cliente.ID_ENDERECO = endereco.ID_ENDERECO";
      $result = mysql_query($sql);
while($usuarios = mysql_fetch_array($result)){
    echo '<td>'.$usuarios['ID_ENDERECO']. '</td>';  
    echo '<td>'.$usuarios['CIDADE']. '</td>';  
    echo '<td>'.$usuarios['ENDERECO']. '</td>';  
    echo '<td>'.$usuarios['BAIRRO']. '</td>';
    echo '<td>'.$usuarios['NUMERO']. '</td>';
    echo '<td>'.$usuarios['CEP']. '</td>';
    echo '<td>'.$usuarios['TELEFONE']. '</td>';
    echo '<td>'.$usuarios['CELULAR']. '</td>';
   /* echo '<td> <a href=frmAtualizarUsuario.php?codigo='.$usuarios['ID_ENDERECO'].'> <img src="../images/config.png" class="icons" /> </a></td>';
    echo '<td> <a href=excluirUsuario.php?codigo='.$usuarios['ID_ENDERECO'].'> <img src="../images/delete.png" class="icons" />  </a></td>';
    */echo '</tr>';
}
echo '</table>';

?>
</div>
</div>
</section>
<div id="footer">

</div>
</body>
</html>



 