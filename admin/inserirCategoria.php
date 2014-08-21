<?php
include '../conexao/conecta.inc';
$categoria = $_POST['categoria'];
if($_POST['categoria'] === '' ){
  echo '<script> 
         alert ("Insira o nome da categoria");
         location.href="listarCategorias.php"   
</script>';
}else{
$sql = ("INSERT INTO categoria (NOME_CATEGORIA)");
$sql.= " VALUES ('$categoria')";
if(mysql_query($sql)){
   echo '<script> 
         alert ("Cadastro de Categoria efetuado com Sucesso");
         location.href="listarCategorias.php"   
</script>';
}else{
    echo '<script> 
         alert ("Não foi possivel cadastrar a Categoria");
         location.href="listarCategorias.php"   
</script>';

}
}



