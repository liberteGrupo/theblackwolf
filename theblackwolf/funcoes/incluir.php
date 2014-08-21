<?php
include '../conexao/conecta.inc';
include '../funcoes/bcrypt.php';
$nome        = mysql_real_escape_string(strip_tags(trim($_POST["nome"])));
$email       = mysql_real_escape_string(strip_tags(trim($_POST["email"])));
$tel         = mysql_real_escape_string(strip_tags(trim($_POST["telefone"])));
$cel         = mysql_real_escape_string(strip_tags(trim($_POST["celular"])));
$endereco    = mysql_real_escape_string(strip_tags(trim($_POST["endereco"])));
$cidade      = mysql_real_escape_string(strip_tags(trim($_POST["cidade"])));
$estado      = mysql_real_escape_string(strip_tags(trim($_POST["estado"])));
$bairro      = mysql_real_escape_string(strip_tags(trim($_POST["bairro"])));
$senha       = mysql_real_escape_string(strip_tags(trim($_POST["senha"])));
$numero      = mysql_real_escape_string(strip_tags(trim($_POST["numero"])));
$cep         = mysql_real_escape_string(strip_tags(trim($_POST["cep"])));
$cpf         = mysql_real_escape_string(strip_tags(trim($_POST["cpf"])));
$tipoCliente = 'RES';
$query = "INSERT INTO endereco (CIDADE,ESTADO,BAIRRO,ENDERECO,NUMERO,CEP,TELEFONE,CELULAR) VALUES ('$cidade','$estado','$bairro','$endereco','$numero','$cep','$tel','$cel')";
if(mysql_query($query))
{
$id = mysql_insert_id();
$consulta =mysql_query("INSERT INTO cliente (ID_ENDERECO,NOME_CLIENTE,EMAIL_CLIENTE,SENHA_CLIENTE,TIPO_CLIENTE,CPF_CLIENTE)VALUES ('$id','$nome','$email','$senha','$tipoCliente','$cpf')");
}
if($consulta){
  
  echo '<script>
  alert("Seu cadastro foi efetuado com Sucesso!")
  location.href="../autentica_usuario.php"
       </script>';
  include '../funcoes/logRegistros.php';
  $mensagem = "Novo Cadastro realizado no site";
  salvaLog($mensagem);
  echo mysql_error();
}else{
    echo '<script>
   ert("Não  foi  possivel registrar seu  cadastro !")
    location.href="../frmCadastro.php"
     </script>';
            echo mysql_error();
}

