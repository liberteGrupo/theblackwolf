<?php
include_once '../conexao/conecta.inc';
$cod_pedido = mysql_real_escape_string($_GET['codigo']);
$deletar = mysql_query("DELETE FROM pedido INNER JOIN itens_pedidos  WHERE pedido.ID_PEDIDO ='$cod_pedido'");
if($deletar){
   echo '<script language="Javascript">
       alert("Pedido excluído com sucesso!");
location.href="pedidos.php"
</script>';
       
}else{
    echo '<script language="Javascript">
    alert("Não foi  possivel excluir o registro!");
    location.href="pedidos.php"
            </script>';
            echo mysql_error();
}