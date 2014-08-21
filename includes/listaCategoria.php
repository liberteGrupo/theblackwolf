<?php
include 'conexao/conecta.inc';
$sql_categoria = "SELECT * FROM categoria INNER JOIN subcategoria ON categoria.ID_CATEGORIA = subcategoria.ID_CATEGORIA ORDER BY ASC";
$consult = mysql_query($sql_categoria);  
echo '<ul>';
$loop = 1;
$i = 2;
if($loop < $i)
{while($linha = mysql_fetch_array($consult)):
    echo '<li>'.$linha['NOME_CATEGORIA'].'</li>';
    echo '<li>'.$linha['NOME_SUBCATEGORIA'].'</li>';
endwhile;
}else{
   echo '<ul>';
  while($linha = mysql_fetch_array($consult)):
    echo '<li>'.$linha['NOME_CATEGORIA'].'</li>';
    echo '<li>'.$linha['NOME_SUBCATEGORIA'].'</li>';
endwhile;
   echo '<ul>';
   $i++;
}