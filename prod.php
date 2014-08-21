 <h2>Busca de Enderecos</h2>
<form method="GET" action="" id="pesquisa">
<label for="consulta">Buscar:</label>
<input type="text" id="consulta" name="consulta" maxlength="255" />
<input type="submit" value="OK"  class="botaoAdm"/>
</form>
 <?php
// Configuração do script
// ========================
$_BS['PorPagina'] = 4; // Número de registros por página
// Conexão com o MySQL
// ========================
$_BS['MySQL']['servidor'] = 'localhost';
$_BS['MySQL']['usuario']  = 'root';
$_BS['MySQL']['senha']    = 'theblackwolf';
$_BS['MySQL']['banco']    = 'theblackwolf';
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
// Monta a consulta MySQL para saber quantos registros serão encontrados
$sql = "SELECT COUNT(*) AS total FROM produto WHERE ((NOME_PRODUTO LIKE '%".$busca."%') OR ('%".$busca."%'))";
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
$sql = "SELECT * FROM produto WHERE  ((NOME_PRODUTO LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY ID_PRODUTO DESC LIMIT ".$inicio.", ".$_BS['PorPagina'];
// Executa a consulta
$query = mysql_query($sql);
// Começa a exibição dos resultados
echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados encontrados para '".$_GET['consulta']."'</p>";
?>
 <form method="post" action="carrinho_produtos.php">
        <table width="200" height="240" cellspacing="5" id="lista_produtos"><in>
       </div>
              <tr>   
                <?php
   $produtos = ("SELECT * FROM produto  ORDER BY ID_PRODUTO DESC");
   $listar_produtos = mysql_query($produtos);
   $i = 2;
   $loop = 5;
   while($produto = mysql_fetch_array($listar_produtos)){
    if($i < $loop){
        ?> 
             <div class="box">
      <td>
          <p><a href="detalhesProduto.php?acao=add&id=<?php echo $produto['ID_PRODUTO'] ?>"><img src="images/<?php echo $produto['PRODUTO_IMAGEM'];?>" class="efeito" width="200" height="200"></a></p>
         <div class="produtoEdita">
          <label><?php echo $produto['NOME_PRODUTO']; ?></label>
          <p class="preco"> <span id="old-price-6"></span>R$<?php echo $produto['PRECO_PRODUTO']; ?></p>
       <a  href="detalhesProduto.php?acao=add&id=<?php echo $produto['ID_PRODUTO'] ?>"></a>     
     
</div>
 <?php
  }elseif($i === $loop){
        ?>
               <div class="box">
      <td>
          <p><a href="detalhesProduto.php?acao=add&id=<?php echo $produto['ID_PRODUTO'] ?>"><img src="images/<?php echo $produto['PRODUTO_IMAGEM'];?>" class="efeito" width="200" height="200"></a></p>
         <div class="produtoEdita">
          <label><?php echo $produto['NOME_PRODUTO']; ?></label>
          <p class="preco"> <span id="old-price-6"></span>R$<?php echo $produto['PRECO_PRODUTO']; ?></p>
       <a  href="detalhesProduto.php?acao=add&id=<?php echo $produto['ID_PRODUTO'] ?>"></a>  
        </div>  
            

            </tr>    
 <?php
        $i = 1;
    }
    $i++;
   }
   ?>
 
      
       </form>
 
 
 <?php
// Começa a exibição dos paginadores
if ($total > 0) {
for($n = 1; $n <= $paginas; $n++) {
echo '<div class="caixa_busca"><a href="?consulta='.$_GET['consulta'].'&pagina='.$n.'">'.$n.'</div></a>&nbsp;&nbsp;';
}
}

?>

