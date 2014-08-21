<?php
include_once '../conexao/conecta.inc';
$cod_categoria = mysql_real_escape_string($_GET['codigo']);
$deletar = mysql_query("DELETE FROM categoria WHERE ID_CATEGORIA='$cod_categoria'");
if($deletar){
   echo '<script language="Javascript">
       alert("Registro excluido com sucesso!");
location.href="listarCategorias.php"
</script>';
       
}else{
    echo '<script language="Javascript">
    alert("Não  foi  possivel excluir o registro !");
    location.href="listarCategorias.php"
            </script>';
            echo mysql_error();
}