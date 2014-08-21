<?php 
include_once '../conexao/conecta.inc';
$cod_contato = ($_GET['codigo']);
$deletarContato =mysql_query("DELETE FROM contato WHERE ID_CONTATO='$cod_contato'");
if($deletarContato){
   echo '<script language="Javascript">
       alert("Contato excluído com sucesso!");
location.href="listaContatos.php"
</script>';
       
}else{
    echo '<script language="Javascript">
    alert("Não  foi  possivel excluir o contato !");
    location.href="listaContatos.php"
            </script>';
            echo mysql_error();
}