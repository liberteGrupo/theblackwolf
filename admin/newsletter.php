<?php
include '../includes/userAdm.inc';
include 'system/system.php';
if(isset($_GET['acao']) && $_GET['acao'] === 'ativo')
    {
 $id   =  $_GET['id'];
 $acao =  $_GET['acao'];
 $sql  = "UPDATE newsletter SET STATUS =  false WHERE ID_NEWSLETTER='$id'";
 if(mysql_query($sql)){
     
    }
        
        if(mysql_query($sql)){
         
            }
    

} elseif(isset ($_GET['acao']) && $_GET['acao'] === 'desativado') {
    $id   =  $_GET['id'];
    $sql  = "UPDATE newsletter SET STATUS =  true WHERE ID_NEWSLETTER='$id'";
    if(mysql_query($sql)){
        
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

<a id="show-panel" href="#"></a>
 <div id="carrinho"><a href="index.php"><img src="../images/administrator.png" height="25px"></a> &nbsp;
    <a href="../logout.php"><img src="../images/logout.png" height="20px"> </a>
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

<?php EnviaNewletter() ?>
<div id="sobre">
	 <img src="../images/newsletter.png" class="icons">&nbsp;<b>Dashboard</b><br>	
                 <form action="inserirNews.php" method="get">
 <?php
echo '<meta charset=UTF-8>';
echo "<link href='../style/styleAdmin.css' rel='stylesheet' type='text/css' />";
include '../conexao/conecta.inc';
$sql ="SELECT * FROM newsletter";
$result = mysql_query($sql);
if(mysql_num_rows($result)=== 0)
{
   echo '<label>Nenhuma newsletter Cadastrada.</label><br>';
}
echo '<table  class="list_users"  width="1000px"';
echo '<caption><h2><label>Newsletters</h2></label></b></caption>';
echo "<a href='inserirNews.php'><button class='botao'>Enviar News</button></a><br>";
echo '<tr>';
echo '<th>Código </th>';
echo '<th>Nome cliente </th>';
echo '<th>Email</th>';
echo '<th>status</th>';
echo '<th >Ação</th>';
echo '</tr>';
while($news = mysql_fetch_array($result)){
    echo '<tr>';
    echo '<td>'.$news['ID_NEWSLETTER'].'</td>';  
    echo '<td>'.$news['NOME_CLIENTE'].'</td>';
    echo '<td>'.$news['EMAIL_CLIENTE'].'</td>';
    if($news['STATUS'] === '1')
    {
   
    ?>  
                     <td class="texto"><a href="?id=<?php echo $news['ID_NEWSLETTER']; ?>&acao=ativo">Ativo</a></td>        
   <?php
    }else{
        ?>
            <td class="texto"><a href="?id=<?php echo $news['ID_NEWSLETTER']; ?>&acao=desativado">Desativado</a></td>  
          <?php       
    }
    echo '<td> <a href=excluirNews.php?codigo='.$news['ID_NEWSLETTER'].'> <img src="../images/delete6.png" class="icons" />  </a></td>';
    echo '</tr>';
}
echo '</table>';



?>
    
    </form>  

</table>
    </form>
</div>
    </div>

<div id="footer">

<div id="mapa1">
  CDS  <br />  
  	<a href="pop.html">Pop</a> <br />
    <a href="#">Rock</a><br />
    <a href="#">Punk</a><br />
    <a href="#">Metal</a><br />
    <a href="#">Eletronica</a><br />
</div>

<div id="mapa2">
CAMISETAS<br />
<a href="#">Feminino</a><br />
<a href="#">Masculino</a>
 </div>

<div id="pagamento">
 FORMAS DE PAGAMENTO <br />
<img src="../images/pagamento.jpg" width="142" height="131"/>
</div><div id="rodapelogo">
 <img src="../images/logo.png" width="160" height="170"/><br/>
 <font color="#FFFFFF"> The Black wolf 2014
 </div></font>

<div id="redes">
REDES SOCIAIS<br />
<a href="#"><img src="../images/insta.jpg"/></a>
<a href="#"><img src="../images/face.jpg" /></a>
<a href="#"><img src="../images/twitter.jpg" /></a>
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