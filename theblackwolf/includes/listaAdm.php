<?php 
 if(isset($_POST['exclui'])){ 
       $excluir =  $_POST['excluir'];
       if(!$excluir){
       echo '<script language="Javascript">
alert(Deu merda mesmo!);
</script>'; 
      }else{
       foreach ($excluir as $del)
       {
       $query   = "DELETE FROM admin WHERE ID_ADMIN = '$del'";
       if(mysql_query($query)){
       echo '<script language="Javascript">
alert(Administradores selecionados foram excluidos com sucesso!);
</script>';
       }else{
        echo '<script language="Javascript">
alert(Não foi possivel excluir administradores!);
</script>';
          } 
       }  
   }
 }

 ?>
<div id="resultado">
<?php

$_BS['PorPagina'] = 10; // Número de registros por página
$sql = "SELECT COUNT(*) AS total FROM admin";
$query = mysql_query($sql);
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
$sql = "SELECT * FROM admin  ORDER BY ID_ADMIN LIMIT ".$inicio.", ".$_BS['PorPagina'];
// Executa a consulta
$query = mysql_query($sql);
// Começa a exibição dos resultados
echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." administradores encontrados";
// <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>
echo '<table   width="1000px" ';
echo '<caption><h2>Administradores Cadastrados</h2></b></caption>';
echo '<tr>';
echo '<th></th>';
echo '<th>Cód ADM</th>';
echo '<th>Nome ADM</th>';
echo '<th>Email ADM </th>';
echo '<th>Senha ADM </th>';
echo '<th>Ativo </th>';
echo '</tr>';
while($adm = mysql_fetch_array($query)){
    echo '<tr>';
    echo '<td><input type="checkbox" name="excluir[]" value='.$adm['ID_ADMIN'].' /></td>';
    echo '<td>'.$adm['ID_ADMIN'].'</td>';  
    echo '<td>'.$adm['NOME_ADMIN'].'</td>';
    echo '<td>'.$adm['EMAIL_ADMIN'].'</td>';
    echo '<td>'.$adm['SENHA_ADMIN'].'</td>';
    if($adm['ATIVO'] === '1')
    {
    echo '<td>Sim</td>';
    }elseif($adm['ATIVO'] === '0')
    {
      echo '<td>Desativado</td>';
    }
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