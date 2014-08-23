<?php 
include '../includes/atualizaCat.php';
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

    <div >
           <?php
              $cod_categoria = intval($_GET['codigo']);
              $sql = mysql_query("SELECT * FROM categoria RIGHT OUTER JOIN subcategoria ON categoria.ID_CATEGORIA  ='$cod_categoria'");
              $result = mysql_num_rows($sql);
              if($result === 0):
echo "Categoria não encontrada!";
exit();
          endif;  
             $categoria = mysql_fetch_assoc($sql);
             $nome = ($categoria['NOME_CATEGORIA']!='') ? $categoria['NOME_CATEGORIA'] :'';
             $nomeSubCategoria = ($categoria['NOME_SUBCATEGORIA']!='') ? $categoria['NOME_SUBCATEGORIA'] :'';
            if($cod_categoria != $categoria['ID_CATEGORIA'])
            {
              echo "listaCategorias.php";
            }
        ?>
         <h1>Atualizar Registros</h1>
         <form id="meu_form" action="" method="post" name="atualizar" >
		<!--Login:<br />-->
                <label>Nome Categoria</label><br>
                <input type="text" name="categoria" value="<?php echo $nome; ?>" />
		<br/>
                <label>Nome Subcategoria</label><br>
                <input type="text" name="subcategoria" value="<?php echo $nomeSubCategoria; ?>" /><br/><br/>
                <input name="acao" type="hidden" value="<?php echo $categoria['ID_CATEGORIA']; ?>" >
                <input type="submit" class="botao" name="atualiza" value="Atualizar" />&nbsp;&nbsp;
                <a href="listarCategorias.php"> <input type="button"  class="botao" value="Voltar"  /></a>
         </form>  
       <br>

</div>
</div>

</body>
</html>

    
  