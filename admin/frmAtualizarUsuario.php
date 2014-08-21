<?php 
include '../includes/atualiza.inc';
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
  <div id="form_atuallizar" >
      <?php
              
              $cod_usuario = intval($_GET['codigo']);
              $sql = mysql_query("SELECT * FROM cliente WHERE ID_CLIENTE ='$cod_usuario'");
              $result = mysql_num_rows($sql);
              if($result === 0):
echo "Usuario não encontrado!";
exit();
              endif;  
             $usuarios = mysql_fetch_assoc($sql);
             $nome = ($usuarios['NOME_CLIENTE']!='') ? $usuarios['NOME_CLIENTE'] :'';
             $email = ($usuarios['EMAIL_CLIENTE']!='') ? $usuarios['EMAIL_CLIENTE'] :'';
        ?>

                <form name="atualizar" action="" method="post">
                <h2>Atualizar Dados</h2>
  <table width="346" >
  <tr>
    <td width="132" >Nome:</td>
    <td colspan="2"><input type="text" name="nome" required  value="<?php echo $nome;  ?>"></td>
  </tr>
  <tr>
    <td scope="row">Email</td>
    <td colspan="2"><input type="email" name="email" required value="<?php echo $email; ?>"></td>
  </tr>
  <tr>
    <td height="20" scope="row">Confirme email</td>
    <td colspan="2"><input type="email" name="confirme_email" required></td>
  </tr>
  <tr>
    <td height="20" scope="row">Senha</td>
    <td colspan="2"><input type="password" name="senha" required ></td>
  </tr>
  <tr>
    <td height="35" scope="row">Confirme Senha</td>
    <td colspan="2"><input type="password" name="confirme_senha" required></td>
  </tr>
</table>
             <input name="acao" type="hidden" value="update" >
             <input  type="submit" value="Atualizar" class="botaoAdm" >&nbsp;&nbsp;&nbsp;&nbsp; <a href="listarUsuarios.php"><input type="button" value="voltar" class="botaoAdm" /></a>
           </form>
   </section>

</body>
</html>

    
  
    
   