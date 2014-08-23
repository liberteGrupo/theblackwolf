<?php
include '../includes/userAdm.inc';
if(isset($_POST['exclui'])){ 
       $excluir =  $_POST['excluir'];
       foreach ($excluir as $del)
       {
       $query   = "DELETE FROM metas WHERE ID_META = '$del'";
       if(mysql_query($query)){
       echo '<script language="Javascript">
alert(Log selecionados foram excluidos com sucesso!);
</script>';
       }else{
        echo '<script language="Javascript">
alert(Deu merda mesmo!);
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
<title>The Black Wolf</title>
</head>

<body >

<div id="header">
<div id="dv1">

    <div id="bprocura2">
    </div>   

<a id="show-panel" href="#"></a>
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
    <section>
        <div ><img src="../images/logs.png" class="icons"></div>
        <form action="" method="post" >
<div id="resultado">
 <?php
  
// Configuração do script
// ========================
$_BS['PorPagina'] =20; 
include '../conexao/conecta.inc';
$sql = "SELECT COUNT(*) AS total FROM logs";
$query    = mysql_query($sql);
$total    = mysql_result($query, 0, 'total');
$paginas  =(($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);
if(isset($_GET['pagina']) and $_GET['pagina'] === ''){
echo "Digite Algo!";
}
if (isset($_GET['pagina'])) {
$pagina = (int)$_GET['pagina'];
} else {
$pagina = 1;
}
$pagina = max(min($paginas, $pagina), 1);
$inicio = ($pagina - 1) * $_BS['PorPagina'];
// Monta outra consulta MySQL, agora a que fará a busca com paginação
$sql = "SELECT * FROM METAS ORDER BY ID_META DESC LIMIT ".$inicio.", ".$_BS['PorPagina'];
// Executa a consulta
$query = mysql_query($sql);
// Começa a exibição dos resultados
echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados </p>";
// <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>
echo '<table  class="list_users"  width="600px" ';
echo '<caption><h2>Metas Cadastradas</h2></b></caption>';
echo '<tr>';
echo '<th></th>';
echo '<th>Cód meta</th>';
echo '<th>Valor meta </th>';
echo '<th>Atinginda ?</th>';
echo '<th>Data Cadastro </th>';
echo '<th >Ação</th>';
echo '</tr>';
while($log = mysql_fetch_array($query)){
    echo '<tr>';
    echo '<td><input type="checkbox" name="excluir[]" value='.$log['ID_META'].' /></td>';
    echo '<td>'.$log['ID_META'].'</td>';  
    echo '<td>R$'.$log['VALOR_META'].'</td>';
    $meta = $log['META_ATINGIDA'];
     if($meta === '0'){
        echo '<td><img width="20px" src="../images/not.png"></td>';     
    }elseif($meta === '1'){
        echo '<td><img width="20px" src="../images/yes.png"></td>';   
    };
    echo '<td>'.$log['DATA_META'].'</td>';
    echo '<td> <a href=excluirMeta.php?codigo='.$log['ID_META'].'> <img src="../images/delete6.png" class="icons" />  </a></td>';
    echo '</tr>';
}
echo '</table><br>';
// ============================================
// Começa a exibição dos paginadores
if ($total > 0) {
for($n = 1; $n <= $paginas; $n++){
echo '<div class="caixa_busca"><a href="?pagina='.$n.'">'.$n.'</div></a>&nbsp;&nbsp;';
}
}
?>
<br><br>&nbsp; &nbsp; <input type="submit" name="exclui" value="Excluir Selecionados" class="botaoAcao"><br>
 </div>  
    </form>  

</table>
    </form>
</div>
  </section>

<div id="footer">

</div>
</body>
</html>