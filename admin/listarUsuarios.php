<?php
include '../includes/userAdm.inc';
if(isset($_POST['exclui'])){ 
       $excluir =  $_POST['excluir'];
       foreach ($excluir as $del)
       {
       $query   = "DELETE FROM cliente WHERE ID_CLIENTE = '$del' ";
       if(mysql_query($query)){
       echo '<script language="Javascript">
alert(Clientes selecionados foram excluidos com sucesso!);
</script>';
       }else{
        echo '<script language="Javascript">
alert(Nao foi possivel excluir selecionados!);
</script>';
          } 
       
  }
 }

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
<div id="sobre">  
    <div ><img src="../images/edit4.png" class="icons"></div>
<?php 
$final_query = "FROM cliente ORDER BY ID_CLIENTE ASC";   
$maximo = 10;   
// Declaração da pagina inicial
$pagina =  trim(($_GET["pagina"])); 
 if($pagina == "") 
  { 
    $pagina = "1";
   }   
 // Calculando o registro inicial
  $inicio = $pagina - 1; 
  $inicio = $maximo * $inicio;   
  // Conta os resultados no total da query
   $strCount = "SELECT COUNT(*) AS 'num_registros' $final_query"; 
   $query = mysql_query($strCount); 
   $row = mysql_fetch_array($query); 
   $total = $row["num_registros"]; 
  
?>
    <form action="" method="post" >
    <?php
echo '<meta charset=UTF-8>';
echo "<link href='../style/styleAdmin.css' rel='stylesheet' type='text/css' />";
include '../conexao/conecta.inc';
echo '<table  class="list_users"  width="1000px" ';
echo '<caption><h2>Clietes Cadastrados</h2></caption>';
echo '<tr>';
echo '<th></th>';
echo '<th><label>Cód Cliente</label></th>';
echo '<th><label>Nome</label></th>';
echo '<th><label>Email</label></th>';
echo '<th><label>Senha</label></th>';
echo '<th><label>Cpf</label></th>';
echo '<th><label>Telefone</label></th>';
echo '<th><label>Celular</label></th>';
echo '<th colspan=4><label>Ação</label></label></th>';
echo '</tr>';
      $sql ="SELECT * FROM cliente INNER JOIN endereco ON cliente.ID_ENDERECO = endereco.ID_ENDERECO WHERE cliente.ID_ENDERECO = endereco.ID_ENDERECO LIMIT $inicio,$maximo";
      $result = mysql_query($sql);
      while($usuarios = mysql_fetch_array($result)){  
    echo '<tr>';
    echo '<td><input type="checkbox" name="excluir[]" value='.$usuarios['ID_CLIENTE'].' /></td>';  
    echo '<td><b>'.$usuarios['ID_CLIENTE']. '</b></td>';  
    echo '<td>'.$usuarios['NOME_CLIENTE']. '</td>';  
    echo '<td>'.$usuarios['EMAIL_CLIENTE']. '</td>';  
    echo '<td>'.substr($usuarios['SENHA_CLIENTE'],0,2). '..</td>';
    echo '<td>'.$usuarios['CPF_CLIENTE']. '</td>';
    echo '<td>'.$usuarios['TELEFONE']. '..</td>';
    echo '<td>'.$usuarios['CELULAR']. '..</td>';
    echo '<td></td>';
    echo '<td> <a href=frmAtualizaEndereco.php?codigo='.$usuarios['ID_ENDERECO'].'> <img src="../images/home.png" class="icons" /> </a></td>';
    echo '<td> <a href=frmAtualizarUsuario.php?codigo='.$usuarios['ID_CLIENTE'].'> <img src="../images/edit2.png" class="icons" /> </a></td>';
    echo '<td> <a href=excluirUsuario.php?codigo='.$usuarios['ID_CLIENTE'].'> <img src="../images/delete6.png" class="icons" />  </a></td>';
  }
echo '</table>';

// FIM DO CONTEUDO
$menos = $pagina - 1; $mais = $pagina + 1;   $pgs = ceil($total / $maximo);   if($pgs > 1 ) {   echo "<br />";  
 // Mostragem de pagina 
 if($menos > 0) 
  { 
    echo "<a href=".$_SERVER['PHP_SELF']."?pagina=$menos>anterior</a>&nbsp; ";
     }  
  // Listando as paginas 
 for($i=1;$i <= $pgs;$i++)
  { 
    if($i != $pagina) 
      { echo "  <a  href=".$_SERVER['PHP_SELF']."?pagina=".($i).">$i</a> | ";
       } else 
       { echo "<strong >".$i."</strong> | "; 
     } 
   }   if($mais <= $pgs) 
   { echo " <a  href=".$_SERVER['PHP_SELF']."?pagina=$mais>próxima</a>"; 
 } 
} 
?>
          <br> <input type="submit" name="exclui" value="Excluir Selecionados" class="botaoAcao"><br>
</form>

</div>
</div>


<div id="footer">

</div>
</body>
</html>


