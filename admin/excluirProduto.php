<?php 
include_once '../conexao/conecta.inc';
$cod_produto = ($_GET['codigo']);
$deletarProduto =mysql_query("DELETE FROM produto WHERE ID_PRODUTO='$cod_produto'");
if($deletarProduto){
   echo '<script language="Javascript">
       alert("Produto excluido com sucesso!");
location.href="produtos.php"
</script>';
       
}else{
    echo '<script language="Javascript">
    alert("Não  foi  possivel excluir o Produto !");
    location.href="produtos.php"
            </script>';
            echo mysql_error();
}