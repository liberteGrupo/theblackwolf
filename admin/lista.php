<div id="resultado">
 <?php
  if(isset($_POST['exclui'])){ 
       $excluir =  $_POST['excluir'];
       if(!$excluir){
       echo '<script language="Javascript">
alert(Não foi possivel excluir log!);
</script>'; 
      }else{
       foreach ($excluir as $del)
       {
       $query   = "DELETE FROM log WHERE ID_LOG = '$del'";
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
$sql = "SELECT COUNT(*) AS total FROM logs";
// Executa a consulta
$query = mysql_query($sql);
// Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
$total = mysql_result($query, 0, 'total');
$paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);

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
echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados encontrados para '".$_GET['consulta']."'</p>";
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
    echo '<td><input type="checkbox" name="excluir[]" value='.$log['ID_CLIENTE'].' /></td>';
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
echo '<div class="caixa_busca"><a href="?consulta='.$_GET['consulta'].'&pagina='.$n.'">'.$n.'</div></a>&nbsp;&nbsp;';
}
}

?>
<br>&nbsp; &nbsp; <input type="submit" name="exclui" value="Excluir Selecionados" class="botaoAcao"><br>
 </div>  