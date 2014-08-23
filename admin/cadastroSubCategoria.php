<?php
include '../includes/atualizaEndereco.inc';
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico"/>
<script type="text/javascript" src="../slide.js"></script>
<title>The Black Wolf</title>
</head>
<body>
<div id="header">
<div id="dv1">
    <div id="bprocura2">
    </div>   
<a id="show-panel" href="#"></a>
<div id="carrinho"><a href="index.php"><?php echo "Bem vindo :"; ?><img src="../images/administrator.png" height="25px"></a> 
<a href="../logout.php"> Logout </a>
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
</div>
<section><br><br>
<form action="inserirSubCategoria.php" method="post" >
        <h1>Cadastro de Subcategoria</h1>         
     <br /><br />
           <label>Nome SubCategoria</label><br>
           <input type="text" name="subcategoria"  />
		       <br/><br/>  
                <label>Nome Categoria</label><br>
  <select name="categoria">    
   <?php
   include '../conexao/conecta.inc';
   $selecionaCategs = mysql_query("SELECT * FROM categoria");
   $ln              = mysql_fetch_assoc($selecionaCategs);
   while ($lnCateg  = mysql_fetch_array($selecionaCategs)){
   ?>

  <option value="<?php echo $lnCateg['ID_CATEGORIA']; ?>"><label><?php echo $lnCateg['NOME_CATEGORIA']; ?></a><br></label>
   
 <?php 
   }
  ?></option>
</select>
<br><br>
       <input type="submit" value="Enviar" class="botao" />&nbsp;&nbsp;
   <input type="reset" value="Limpar" class="botao" />

	</form>
  
 
</section>
</body>
</html>

   


