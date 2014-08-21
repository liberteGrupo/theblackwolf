<?php
include '../includes/userAdm.inc';
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico"/>
<script type="text/javascript" src="../slide.js"></script>
<script src=" http://www.google.com/jsapi"></script>
<script  type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../js/tyni.js"></script>
<title>The Black Wolf</title>
</head>

<body >

<div id="header">
<div id="dv1">

    <div id="bprocura2">
    </div>   

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
      <div style="width:105%; float:left;">
      <li><a href="index.php">Home</a></li>
                        <li><a href="listarUsuarios.php">Cliente</a>
    <ul>
                    <li> <a href="pedidos.php">Pedidos</a> </li>
      
    </ul>
                            <li><a href="produtos.php">Produtos</a>
        <ul>
            <li><a href="listarCategorias.php"> Categoria </a></li>
            <li><a href="Pagamentos.php">Pagamentos </a></li>
    </ul>
        </li>
      <div style="width:-10%; margin-left:100px; float:right;">
            <li><a href="adminstrador.php">Administrador</a></li>
            <li><a href="listaLogs.php">Logs</a></li>
      <li><a href="newsletter.php">Newsletter</a></li>
    </ul>
</nav>

    <div id="frmIncluirProduto">
      <div id="frmCadastro" >
      <?php include '../funcoes/uploadImage.php' ?>
     <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="upload" class="inserir_produtos">
     <caption><b>Inserir Camisa</b> </caption><br>
Nome Produto:<br>
<input type="text" name="nome"  /> <br><b>
Descricao Produto:<br>
    <textarea  id="textareaAdm" name="descricao"  > </textarea><br><br>
Preco do Produto:<br>
<input type="text" name="preco"  /><br /><br />
Categoria Do produto:<br>
<select name="categoria"> 
 <?php
   include '../conexao/conecta.inc';
   $selecionaCategs = mysql_query("SELECT * FROM categoria");
   while($lnCateg = mysql_fetch_array($selecionaCategs)){
   ?>
<option value="<?php echo $lnCateg['ID_CATEGORIA'].' '; ?>"><?php echo $lnCateg['NOME_CATEGORIA']; ?></option>
                   <?php                
   }
                   ?>
</select><br /><br />
Tamanho do Produto:<br />
<select name="tamanho" >
<option value="0"> </option>
<option value="PP">PP </option>
<option value="P">P </option>
<option value="M">M </option>
<option value="G">G  </option>
</select><br /><br />
Artista do Produto:<br />
<input type="text" name="artista" /><br /><br />
Quantidade de Produto:<br />
<input type="number" name="qtde_produto"  /><br /><br />
Peso do Produto(em gramas):<br />
<input type="text" name="peso"  /><br /><br />
Fotos do produto :<br /><br />
<input name="foto" type="file" id="foto1" size="50" /><br /><br />
<br />
<input type="submit"  name="cadastrar" class="botaoAdm" value="cadastrar" />&nbsp;&nbsp;
<input type="reset"  class="botaoAdm" value="limpar"/>
</form>
 </div>

    </div>
</div>
</div>
</div>
<script type="text/javascript">
  // Load jQuery
  google.load("jquery", "1.3");

  google.setOnLoadCallback(function() {
    // Seu código aqui
  });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("a#show-panel").click(function() {
      ../;
        })
        $("a#close-panel").click(function() {
            $("#lightbox, #lightbox-panel").fadeOut(300);
        })
    })
</script>

</body>
</html>

    
  