<?php
include '../includes/userAdm.inc';
if(isset($_POST['exclui'])){ 
       $excluir =  $_POST['excluir'];
       if(!$excluir){
       echo '<script language="Javascript">
alert(Não foi possivel excluir log!);
</script>'; 
      }else{
       foreach ($excluir as $del)
       {
       $query   = "DELETE FROM logs WHERE ID_LOG = '$del'";
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
$_BS['PorPagina'] =20; // Número de registros por página
// Conexão com o MySQL
// ========================
$_BS['MySQL']['servidor'] = 'localhost';
$_BS['MySQL']['usuario'] = 'root';
$_BS['MySQL']['senha'] = 'theblackwolf';
$_BS['MySQL']['banco'] = 'theblackwolf';
mysql_connect($_BS['MySQL']['servidor'], $_BS['MySQL']['usuario'], $_BS['MySQL']['senha']);
mysql_select_db($_BS['MySQL']['banco']);
// ====(Fim da conexão)====

// Verifica se foi feita alguma busca
// Caso contrario, redireciona o visitante
// Se houve busca, continue o script:
// Usa a função mysql_real_escape_string() para evitar erros no MySQL
// ============================================
// Monta a consulta MySQL para saber quantos registros serão encontrados
$sql = "SELECT COUNT(*) AS total FROM logs";
// Executa a consulta
$query    = mysql_query($sql);
// Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
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
$sql = "SELECT * FROM logs  INNER JOIN cliente ON logs.ID_CLIENTE = cliente.ID_CLIENTE ORDER BY ID_LOG DESC LIMIT ".$inicio.", ".$_BS['PorPagina'];
// Executa a consulta
$query = mysql_query($sql);
// Começa a exibição dos resultados
echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados </p>";
// <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>
echo '<table  class="list_users"  width="1000px" ';
echo '<caption><h2>Log Clientes</h2></b></caption>';
echo '<tr>';
echo '<th>Código do log</th>';
echo '<th>Nome cliente </th>';
echo '<th>Data </th>';
echo '<th><img src="../images/ip_adress.png" class="icons" width="20px"/> </th>';
echo '<th>Mensagem</th>';
echo '<th >Ação</th>';
echo '</tr>';
while($log = mysql_fetch_array($query)){
    echo '<tr>';
    echo '<td><input type="checkbox" name="excluir[]" value='.$log['ID_LOG'].' /></td>';
    echo '<td>'.$log['ID_LOG'].'</td>';  
    echo '<td>'.$log['NOME_CLIENTE'].'</td>';
    echo '<td>'.$log['DATA_LOGIN'].'</td>';
    echo '<td>'.$log['IP'].'</td>';
    echo '<td>'.$log['MENSAGEM'].'</td>';
    echo '<td> <a href=excluirLog.php?codigo='.$log['ID_LOG'].'> <img src="../images/delete6.png" class="icons" />  </a></td>';
    echo '</tr>';
}
echo '</table><br>';
// ============================================
// Começa a exibição dos paginadores
if ($total > 0) {
for($n = 1; $n <= $paginas; $n++) {
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