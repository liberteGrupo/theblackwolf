<?php 
include '../includes/userAdm.inc';
    if(isset($_POST['acao']) && $_POST['acao'] =='update' ):
              $recuperEndereco =  $_POST['endereco'];
              $recuperCidade   = $_POST['cidade'];
              $recuperBairro   =  $_POST['bairro'];
              $recuperCep      =  $_POST['cep'];
              $recuperNumero   = $_POST['numero'];
              $codigo_endereco = mysql_real_escape_string($_GET['codigo']); 
              $update = mysql_query("UPDATE endereco SET CIDADE = '$recuperCidade',BAIRRO= '$recuperBairro',"
              . "ENDERECO = '$recuperEndereco',NUMERO='$recuperNumero',CEP = '$recuperCep' "
              . "WHERE ID_ENDERECO ='$codigo_endereco'");
  if($update):
    echo '<script language="Javascript">
    alert("Dados atualizados com sucesso !")
    location.href=minhaConta.php
   </script>';
 else:
    echo '<script>
    alert("Não  foi  possivel atualizar !")
    location.href=minhaConta.php
     </script>';
      endif;
endif;
    
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


<div id="sobre">
  <div class="dados_adm" >
      <?php
              
              $codigo_endereco = intval($_GET['codigo']);
              $sql = mysql_query("SELECT * FROM endereco WHERE ID_ENDERECO ='$codigo_endereco'");
              $result = mysql_num_rows($sql);
              if($result <= 0):
              echo "Endereco não encontrado!";
              exit();
              endif;  
             $enderecos = mysql_fetch_assoc($sql);
             $endereco = ($enderecos['ENDERECO']!='') ? $enderecos['ENDERECO'] :'';
             $cidade = ($enderecos['CIDADE']!='') ? $enderecos['CIDADE'] :'';
             $bairro = ($enderecos['BAIRRO']!='') ? $enderecos['BAIRRO'] :'';
             $cep = ($enderecos['CEP']!='') ? $enderecos['CEP'] :'';
             $numero = ($enderecos['NUMERO']!='') ? $enderecos['NUMERO'] :'';
            
             
             ?>

        
           <form name="atualizar" action="" method="post">
          <table width="395" height="243" >
  <tr>
    <th height="37" colspan="2" class="text_endereco" scope="row">Editar Endereço</th>
  </tr>
  <tr>
    <td width="148" height="23" scope="row">Endereço:</td>
    <td width="231"><input type="text" name="endereco" required  value="<?php echo $endereco;  ?>" ></td>
  </tr>
  <tr>
    <td height="23" class="text_endereco" scope="row">Cidade: </td>
    <td><input type="text" name="cidade" required value="<?php echo $cidade; ?>"> </td>
  </tr>
  <tr>
    <td height="23" class="text_endereco" scope="row">Bairro:</td>
    <td><input type="text" name="bairro" value="<?php echo $bairro; ?>" required></td>
  </tr>
  <tr>
    <td height="23" class="text_endereco" scope="row">Cep:</td>
    <td><input type="text" name="cep"  value="<?php echo $cep; ?>" required > </td>
  </tr>
  <tr>
    <td height="23" class="text_endereco" scope="row">Numero:</td>
    <td><input type="text" name="numero" value="<?php echo $numero; ?>" required ></td>
  </tr>

           </table> 
             <input name="acao" type="hidden" value="update" ><br>  
                     <input  type="submit"  value="Atualizar" class="botao" >&nbsp;&nbsp;&nbsp;&nbsp; <a href="listarUsuarios.php"><input type="button" value="voltar" class="botao" /></a>
           </form>
   </tr>

  </div>
</div>
</div>




</body>
</html>

    
  
    
   