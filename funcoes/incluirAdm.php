<?php
include '../conexao/conecta.inc';
if(isset($_POST['cadastrar'])){
  if(empty($_POST['nome']) or empty($_POST['email']) or empty($_POST['senha'])):
echo "preencha todos os campos!";
  else:
$nome         =  strip_tags(trim($_POST['nome']));
$email        =  strip_tags(trim($_POST['email']));
$senha        =  strip_tags(trim($_POST['senha']));
$whirlpool    =  hash('whirlpool', $senha); 
$nivel        =  '3';
$ativo        =  '0'; 
$tipoUser     =  'ADM';
$query        = mysql_query("INSERT INTO admin (TIPO_USUARIO,NOME_ADMIN,EMAIL_ADMIN,SENHA_ADMIN,NIVEL,ATIVO) VALUES('$tipoUser','$nome','$email','$whirlpool','$nivel','$ativo')");
if($query):
   echo '<script language="Javascript">
alert("Administrador inserido  com sucesso!");
location.href="../admin/administrador.php"
</script>';
  else:
     echo '<script language="Javascript">
alert("Não foi possivel inserir Administrador!");
location.href="../admin/administrador.php"
</script>';
mysql_error();
  endif;
    endif;
}