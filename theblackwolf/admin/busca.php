<?php
include '../includes/userAdm.inc';
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico"/>
<script type="text/javascript" src="../slide.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

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
 <h2>Busca de Enderecos</h2>
<form name="frmBusca" method="GET" action="<?php $_SERVER['PHP_SELF'] ?>?a=buscar">
 <input type="text" id="consulta" name="consulta" maxlength="255" />
 <input type="submit" value="Buscar"  class="botaoAdm"/>
</form>
<div id="resultado">
 <?php
// Configuração do script
// ========================
$_BS['PorPagina'] = 10; // Número de registros por página
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

// Salva o que foi buscado em uma variável
$busca = $_GET['consulta'];
// Usa a função mysql_real_escape_string() para evitar erros no MySQL
$busca = mysql_real_escape_string($busca);

// ============================================

// Monta a consulta MySQL para saber quantos registros serão encontrados
$sql = "SELECT COUNT(*) AS total FROM endereco WHERE ((`ENDERECO` LIKE '%".$busca."%') OR ('%".$busca."%'))";
// Executa a consulta
$query = mysql_query($sql);
// Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
$total = mysql_result($query, 0, 'total');
// Calcula o máximo de paginas
$paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);

// Sistema simples de paginação, verifica se há algum argumento 'pagina' na URL
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
$sql = "SELECT * FROM `endereco` WHERE  ((`ENDERECO` LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY ID_ENDERECO DESC LIMIT ".$inicio.", ".$_BS['PorPagina'];
// Executa a consulta
$query = mysql_query($sql);
// Começa a exibição dos resultados
echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados encontrados para '".$_GET['consulta']."'</p>";
// <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>
echo '<table  class="list_users" width="1000px"';
echo '<tr>';
echo '<th>Código</th>';
echo '<th>Cidade</th>';
echo '<th>Endereco</th>';
echo '<th>Bairro</th>';
echo '<th>Numero</th>';
echo '<th>CEP</th>';
echo '<th>Telefone</th>';
echo '<th>Celular</th>';
echo '<th colspan=5>Ação</th>';
echo '</tr>';
while($usuarios = mysql_fetch_array($query)){
    echo '<td>'.$usuarios['ID_ENDERECO']. '</td>';  
    echo '<td>'.$usuarios['CIDADE']. '</td>';  
    echo '<td>'.$usuarios['ENDERECO']. '</td>';  
    echo '<td>'.$usuarios['BAIRRO']. '</td>';
    echo '<td>'.$usuarios['NUMERO']. '</td>';
    echo '<td>'.$usuarios['CEP']. '</td>';
    echo '<td>'.$usuarios['TELEFONE']. '</td>';
    echo '<td>'.$usuarios['CELULAR']. '</td>';
    echo '<td> <a href=frmAtualizarUsuario.php?codigo='.$usuarios['ID_ENDERECO'].'> <img src="../images/config.png" class="icons" /> </a></td>';
    echo '<td> <a href=excluirUsuario.php?codigo='.$usuarios['ID_ENDERECO'].'> <img src="../images/delete.png" class="icons" />  </a></td>';
    echo '</tr>';
}
echo '</table><br>';
// ============================================
// Começa a exibição dos paginadores
if ($total > 0) {
for($n = 1; $n <= $paginas; $n++) {
echo '<div class="caixa_busca"><a href="?consulta='.$_GET['consulta'].'&pagina='.$n.'">'.$n.'</div></a>&nbsp;&nbsp;';
}
}

?>

 </div>  
</div>
<div id="footer">

</div>
</body>
</html>



 