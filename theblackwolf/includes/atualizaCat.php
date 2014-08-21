<?php
include '../conexao/conecta.inc';
if(isset($_POST['atualiza'])){
   $categoria   =  $_POST['categoria'];
   $idCategoria =  $_POST['acao'];
   $sql         = mysql_query("UPDATE categoria SET NOME_CATEGORIA = '$categoria'  WHERE ID_CATEGORIA = '$idCategoria'");
   if($sql){
       echo 'Categoria Atualizada com sucesso';
   }else{
       echo 'Não foi possivel atualizar a categoria';
   }
   
}