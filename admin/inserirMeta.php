<?php
include '../conexao/conecta.inc';
$meta = $_POST['meta'];
if($_POST['meta'] === '' ){
  echo '<script> 
         alert ("Insira o valor da Meta");
          location.href="index.php"   
</script>';
}else{
$atingida = '0';
$data = date('Y/m/d');
$sql = ("INSERT INTO metas (VALOR_META,META_ATINGIDA,DATA_META)");
$sql.= " VALUES ('$meta','$atingida','$data')";
if(mysql_query($sql)){
   echo '<script> 
         alert ("Cadastro de Meta Sucesso");
           location.href="index.php" 
</script>';
}else{
    echo '<script> 
         alert ("Não foi possivel cadastrar a meta");
           location.href="index.php"
</script>';

}
}