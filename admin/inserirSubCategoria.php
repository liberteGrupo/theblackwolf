 <?php
include '../conexao/conecta.inc';

if($_POST['subcategoria'] === '' ){
  echo '<script> 
         alert ("Insira o nome da subcategoria");
         location.href="listarCategorias.php"   
</script>';
}else{
$subcategoria = $_POST['subcategoria'];
$id_categoria = $_POST['categoria'];
$sql          = ("INSERT INTO subcategoria (ID_CATEGORIA,NOME_SUBCATEGORIA)");
$sql         .= " VALUES ('$id_categoria','$subcategoria')";
if(mysql_query($sql)){
   echo '<script> 
         alert ("Cadastro de subcategoria efetuado com Sucesso");
         location.href="listarCategorias.php"   
</script>';
}else{
   echo '<script> 
         alert ("Não foi possivel cadastrar a subcategoria");
         location.href="listarCategorias.php"   
</script>';

}
}