<?php
 if(isset($_POST['acao']) && $_POST['acao'] =='update' ):
              $recuperNome =  mysql_real_escape_string($_POST['categoria']);
              $codigo_categoria = mysql_real_escape_string($_GET['codigo']);   
$update = mysql_query(" UPDATE categoria SET  NOME_CATEGORIA = '$recuperNome' WHERE ID_CATEGORIA ='$codigo_categoria'");
$id_categoria = mysql_insert_id();
$updateSubcategoria = mysql_query(" UPDATE subcategoria SET  ID_CATEGORIA='$id_categoria',NOME_SUBCATEGORIA = '$recuperNome' WHERE ID_SUBCATEGORIA ='$codigo_categoria'");
if($update && $updateSubcategoria):
    include 'funcoes/logRegistros.php';
              $mensagem  = 'Adm Atualizou categoria';
              salvaLog($mensagem);  
    echo '<script language="Javascript">
    alert("Dados atualizados com sucesso !")
    location.href=listarUsuarios.php
   </script>';
    else:
    echo '<script>
    alert("Não  foi  possivel atualizar !")
    location.href=listarUsuarios.php
     </script>';
      endif;
endif;

   