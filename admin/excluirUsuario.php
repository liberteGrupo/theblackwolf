<?php
include_once '../conexao/conecta.inc';
$cod_usuario = intval(($_GET['codigo']));
$deletar =mysql_query("DELETE FROM cliente WHERE ID_CLIENTE='$cod_usuario'");
if($deletar){
   echo '<script language="Javascript">
       alert("Registro excluido com sucesso!");
location.href="listarUsuarios.php"
</script>';
       
}else{
    echo '<script language="Javascript">
    alert("Não  foi  possivel excluir o registro !");
    location.href="listarUsuarios.php"
            </script>';
            echo mysql_error();
}