   <?php 
session_start();
require_once 'conexao/conecta.inc';
require_once 'funcoes/bcrypt.php';
$email =isset($_SESSION['email'])?$_SESSION['email']:null;
$senha = isset($_SESSION['senha'])?$_SESSION['senha']:null;
$nomeUsuario = isset($_SESSION['nomeUsuario'])?$_SESSION['nomeUsuario']:null;
$cod_usuario = isset($_SESSION['cod_usuario'])?$_SESSION['cod_usuario']:null;
if(empty($_POST['acao']))  
    {
    echo '<script language="Javascript">
    location.href=index.php
   </script>';
    }else{
if(isset($_POST['acao']) && $_POST['acao'] =='update' ):
              $recuperNome =  $_POST['nome'];
              $recuperSenha = $_POST['senha'];
              $recuperEmail =  $_POST['email'];
              $recuperCpf =  $_POST['cpf'];
              $codigo_cliente = mysql_real_escape_string(trim($_GET['codigo'])); 
              $update = mysql_query("UPDATE cliente SET NOME_CLIENTE = '$recuperNome',EMAIL_CLIENTE= '$recuperEmail',"
              . "SENHA_CLIENTE = '$recuperSenha',TIPO_CLIENTE = 'RES',CPF_CLIENTE = '$recuperCpf'"
              . "WHERE ID_ENDERECO ='$codigo_cliente'");
  if($update):
    echo '<script language="Javascript">
    alert("Dados atualizados com sucesso !")
    location.href=minhaConta.php
   </script>';
   include 'funcoes/logRegistros.php';
   $mensagem = 'Usuario alterou seus dados';
   salvaLog($mensagem);
    else:
    echo '<script>
    alert("Não  foi  possivel atualizar !")
    location.href=minhaConta.php
     </script>';
      endif;
endif;
    }
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico"/>
<script type="text/javascript" src="slide.js"></script>
<title>The Black Wolf</title>
</head>

<body >

<div id="header">
<?php 
include 'includes/menu.php';
?>

<!-- lightbox-panel -->

<!-- lightbox -->
<div id="lightbox"> </div>  
<!-- lightbox -->
 
</div>
<div class="wrap">
<div id="logo">
<img class="logo" src="images/logo.png" width="180" height="200"/>             
</div>

<nav id="menu">
<?php 
include 'includes/menu.php';
?>
</nav>




<div id="lancamento">
    <div id="sobre">
     <aside>
   <div class="text_sua_conta"><b>Sua Conta</b></div><br> 
            <div id="dados_conta">
      <a href="minhaConta.php"> Painel do Usuário </a><br>
   <?php 
 $results = mysql_query("SELECT * FROM cliente RIGHT OUTER JOIN endereco ON cliente.ID_CLIENTE ='$cod_usuario' WHERE cliente.ID_ENDERECO =  endereco.ID_ENDERECO");
 $usuarios = mysql_fetch_array($results) ; 
      echo '<a href="alterarSenha.php?codigo='.$usuarios['ID_CLIENTE'].'"> Informações de conta </a><br>';
      echo '<a href="listaEndereco.php?codigo='.$usuarios['ID_ENDERECO'].'"> Endereco </a><br>';
?>
<a href="meusPedidos.php"> Meus Pedidos </a><br>
<a href="cadastroNews.php"> Cadastro de Newsletter </a>
</div>
</aside>
        <div class="conteudo_altera_senha">
        <h2><b><label>Seu painel</label></b></h2></label>
        <div id="form_atualizar" >
         <?php
              $codigo_usuario  = intval($_GET['codigo']);
              if($codigo_usuario != $cod_usuario){
                 echo '<script language="Javascript">
                 location.href="index.php"
                 </script>';
              }
              if(!is_numeric($codigo_usuario) or empty($codigo_usuario)){
                 echo '<script language="Javascript">
                 location.href="index.php"
                 </script>';  
              }else{
              $sql = mysql_query("SELECT * FROM cliente WHERE ID_CLIENTE ='$codigo_usuario'");
              $result = mysql_num_rows($sql);
              if($result <= 0):
echo "Usuario não encontrado!";
exit();
              endif;  
              $usuarios = mysql_fetch_assoc($sql);
              $nome = ($usuarios['NOME_CLIENTE']!='') ? $usuarios['NOME_CLIENTE'] :'';
              $email = ($usuarios['EMAIL_CLIENTE']!='') ? $usuarios['EMAIL_CLIENTE'] :'';
              if($_SESSION['cod_usuario'] != $_SESSION['cod_usuario'])
                 {
                echo '<script language="Javascript">
               location.href="minhaConta.php"
               </script>';
                 
                 }
              }
        ?>
        <form name="atualizar" action="" method="post">
  <table width="346" >
      
    <tr>
    <td width="132" >Nome:</td>
    <td colspan="2"><input type="text" name="nome" required  value="<?php echo $nome;  ?>"></td>
  </tr>
  <tr>
    <td scope="row">Email</td>
    <td colspan="2"><input type="email" name="email" required value="<?php echo $email; ?>"></td>
  </tr>
  <tr>
    <td height="20" scope="row">Confirme email</td>
    <td colspan="2"><input type="email" name="confirme_email" required></td>
  </tr>
  <tr>
    <td height="20" scope="row">Senha</td>
    <td colspan="2"><input type="password" name="senha" required ></td>
  </tr>
  <tr>
    <td height="35" scope="row">Confirme Senha</td>
    <td colspan="2"><input type="password" name="confirme_senha" required></td>
  </tr>
        <tr>
    <td height="35" scope="row">CPF:</td>
    <td colspan="2"><input type="text" name="cpf" required></td>
  </tr>
</table>
             <input name="acao" type="hidden" value="update" >
             <input  type="submit" value="Atualizar" class="botao" >&nbsp;&nbsp;&nbsp;&nbsp; <a href="minhaConta.php"><input type="button" value="voltar" class="botao" /></a>
           </form>
     </table>  
       </div>
                
     </div>
              </div>
              
    
  </div>


</div>
<div id="footer">

<div id="mapa1">/
  CDS  <br />  
  	<a href="sobrenos.php">Pop</a> <br />
    <a href="#">Rock</a><br />
    <a href="#">Punk</a><br />
    <a href="#">Metal</a><br />
    <a href="#">Eletronica</a><br />
</div>

<div id="mapa2">
CAMISETAS<br />
<a href="#">Feminino</a><br />
<a href="#">Masculino</a>
 </div>

<div id="pagamento">
 FORMAS DE PAGAMENTO <br />
<img src="images/pagamento.png" width="142" height="131"/>

</div>
 <div id="rodapelogo">
 <img src="images/logo.png" width="160" height="170"/><br/>
 <font color="#FFFFFF"> The Black wolf 2014
 </div></font>



<div id="redes">
REDES SOCIAIS<br />
<a href="#"><img src="images/insta.jpg" width="45" height="35"     /></a>
<a href="#"><img src="images/face.jpg" width="40" height="34"    /></a>
<a href="#"><img src="images/twitter.jpg" width="40" height="35"    /></a>
</div>





<script type="text/javascript">
	// Load jQuery
	google.load("jquery", "1.3");

	google.setOnLoadCallback(function() {
		// Seu código aqui
	});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("a#show-panel").click(function() {
            $("#lightbox, #lightbox-panel").fadeIn(300);
        })
        $("a#close-panel").click(function() {
            $("#lightbox, #lightbox-panel").fadeOut(300);
        })
    })
</script>

</body>
</html>




