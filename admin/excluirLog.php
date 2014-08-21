<?php 
include_once '../conexao/conecta.inc';
$cod_log = ($_GET['codigo']);
$deletarLog =mysql_query("DELETE FROM logs WHERE ID_LOG='$cod_log'");
if($deletarLog){
   echo '<script language="Javascript">
       alert("Log excluído!");
location.href="listaLogs.php"
</script>';
       
}else{
    echo '<script language="Javascript">
    alert("Log exlcuído!");
    location.href="listaLogs.php"
            </script>';
            echo mysql_error();
}