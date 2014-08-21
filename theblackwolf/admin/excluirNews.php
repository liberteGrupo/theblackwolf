<?php 
include_once '../conexao/conecta.inc';
$cod_news = ($_GET['codigo']);
$deletarNews = mysql_query("DELETE FROM newsletter WHERE ID_NEWSLETTER ='$cod_news'");
if($deletarNews){
   echo '<script language="Javascript">
       alert("Newsletter excluido com sucesso!");
location.href="newsletter.php"
</script>';
       
}else{
    echo '<script language="Javascript">
    alert("Não  foi  possivel excluir a Newsletter!");
    location.href="newsletter.php"
            </script>';
            echo mysql_error();
}