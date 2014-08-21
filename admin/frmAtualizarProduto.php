<?php 
include '../includes/userAdm.inc';
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico"/>
<script type="text/javascript" src="../slide.js"></script>
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

    <div id="admAtualiza">
         <div id="produtos" >
              <?php
              include '../includes/atualizaProd.inc';
// Conexão com o banco de dados
     echo '<meta charset="UTF-8">';
   
              $codigo_produto = intval($_GET['codigo']);
              $sql = "SELECT * FROM produto WHERE ID_PRODUTO ='$codigo_produto'";
              $consulta = mysql_query($sql);
              $result = mysql_num_rows($consulta);
              if($result === 0):
echo "Produto não encontrado!";
exit();
          endif;  
            $produto = mysql_fetch_assoc($consulta);
            $nome = ($produto['NOME_PRODUTO']!='') ? $produto['NOME_PRODUTO'] :'';
            $descricao = ($produto['DESCRICAO_PRODUTO']!='') ? $produto['DESCRICAO_PRODUTO'] :'';
            $artista = ($produto['ARTISTA_PRODUTO']!='') ? $produto['ARTISTA_PRODUTO'] :'';
            $preco = ($produto['PRECO_PRODUTO']!='') ? $produto['PRECO_PRODUTO'] :'';
            $qtde = ($produto['QTDE_PRODUTO']!='') ? $produto['QTDE_PRODUTO'] :'';
            $tamanho = ($produto['TAMANHO_PRODUTO']!='') ? $produto['TAMANHO_PRODUTO'] :'';
            $imagem = ($produto['PRODUTO_IMAGEM']!='') ? $produto['PRODUTO_IMAGEM'] :'';
          
?>
     <form action="" method="post" enctype="multipart/form-data" name="upload" class="inserir_produtos">
     <caption><b> <label>Inserir Camisa</label></b> </caption><br>
<label>Nome Produto:</label><br>
<input type="text" name="nome" value="<?php echo $nome; ?>" /> <br>
<label>Descricao Produto:</label><br>
    <textarea  class="textareaAdm" name="descricao"  ><?php echo $descricao; ?> </textarea><br><br>
<label>Preco do Produto:</label><br>
<input type="text" name="preco"  value="<?php  echo $preco ;?>" /><br /><br />
<label>Categoria Do produto:</label><br>
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
           </select>
           <br /><br />
<label>Tamanho do Produto:</label><br />
<select name="tamanho" >
<option value=""> </option>
<option value="PP">PP </option>
<option value="P">P </option>
<option value="M">M </option>
<option value="G">G  </option>
</select><br /><br />
<label>Artista do Produto:</label><br />
<input type="text" name="artista" value="<?php echo $artista; ?>" /><br /><br />
<label>Quantidade de Produto:</label><br />
<input type="number" name="qtde_produto" value="<?php echo $qtde; ?>"  /><br /><br />
<label>Peso do Produto:</label><br />
<input type="text" name="peso"  /><br /><br />
<label>Fotos do produto :</label><br /><br />
<input name="foto" type="file" id="foto1" size="50"   />
<br />
<input name="acao" type="hidden" value="update" ><br>
<input type="submit" class="botaoAdm" value="Atualizar" />&nbsp;&nbsp;
<input type="reset"  class="botaoAdm" value="limpar"/>

</form>
  <div class="loader" style="display: none;"> <img src="images/loader.gif" alt="Carregando" /></div>
 </div>
    </div>
    
</div>

<div id="footer">

</div>
</body>
</html>

    
  