<?php 
session_start();
include 'conexao/conecta.inc';
include 'includes/funcoesuteis.inc';
$email =isset($_SESSION['email'])?$_SESSION['email']:null;
$senha = isset($_SESSION['senha'])?$_SESSION['senha']:null;
$nomeUsuario = isset($_SESSION['nomeUsuario'])?$_SESSION['nomeUsuario']:null;
$cod_usuario = isset($_SESSION['cod_usuario'])?$_SESSION['cod_usuario']:null;

if(isset($_POST['acao']) && $_POST['acao'] =='update' ):
              $recuperEndereco =  $_POST['endereco'];
              $recuperCidade = $_POST['cidade'];
              $recuperBairro =  $_POST['bairro'];
              $recuperCep =  $_POST['cep'];
              $recuperNumero = $_POST['numero'];
              $codigo_endereco = mysql_real_escape_string($_GET['codigo']); 
           
              $update = mysql_query("UPDATE endereco SET CIDADE = '$recuperCidade',BAIRRO= '$recuperBairro',"
                      . "ENDERECO = '$recuperEndereco',NUMERO='$recuperNumero',CEP = '$recuperCep' "
                      . "WHERE ID_ENDERECO ='$codigo_endereco'");
  if($update):
    echo '<script language="Javascript">
    alert("Dados atualizados com sucesso !")
    location.href=minhaConta.php
   </script>';
   include 'funcoes/logRegistros.php';
   $mensagem = 'Usuario alterou seu endereco';
   salvaLog($mensagem);
    else:
    echo '<script>
    alert("Não  foi  possivel atualizar !")
    location.href=minhaConta.php
     </script>';
      endif;
endif;

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

<?php 
echo '<meta charset=utf-8>';

if(isset($_SESSION['cod_usuario']) && isset($_SESSION['nomeUsuario'])){
include 'includes/headerUser.php';
}else{
include 'includes/header.php';
}

?>
<!-- lightbox-panel -->
<div id="lightbox-panel">
   <center> <h2>Faça seu Login </h2><p></center>
    <hr noshade size="5" width="100%" />
    <div id="login-box-label"> </div>
    <form action="login.php" method="post">
<div class="input-div" id="input-usuario">Email: &nbsp;
	<input type="text" value=""/>
</div>
<div class="input-div" id="input-senha">Senha:&nbsp;
	<input type="password" value="Senha"/>
    
<br>
</div>

<div id="botoes">
<div id="botão"></div>
<div id="lembrar-senha"> <input type="checkbox" />
Lembrar minha senha
</div><br/>

<input type="submit" value="Enviar" class="envio">&nbsp;&nbsp;
<a id="cadast" href="cadastrar.php" font color="black" >Cadastre-se</a></font> 
</div>
 </form>   
    
    
    </p>
    <p align="center">
        <a id="close-panel" href="#">Fechar</a>
    </p>
</div>
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
  
      ?>
<a href="listaEndereco.php"> Enderecos </a><br>
<a href="meusPedidos.php"> Meus Pedidos </a><br>
<a href="cadastroNews.php"> Cadastro de Newsletter </a>
</div>
</aside>
      <?php
              $codigo_endereco = intval($_GET['codigo']);
              $sql = mysql_query("SELECT * FROM endereco WHERE ID_ENDERECO ='$codigo_endereco'");
              $result = mysql_num_rows($sql);
              if($result <= 0):
echo "Endereco não encontrado!";
exit();
              endif;  
             $enderecos = mysql_fetch_assoc($sql);
             $endereco = ($enderecos['ENDERECO']!='') ? $enderecos['ENDERECO'] :'';
             $cidade = ($enderecos['CIDADE']!='') ? $enderecos['CIDADE'] :'';
             $bairro = ($enderecos['BAIRRO']!='') ? $enderecos['BAIRRO'] :'';
             $cep = ($enderecos['CEP']!='') ? $enderecos['CEP'] :'';
             $numero = ($enderecos['NUMERO']!='') ? $enderecos['NUMERO'] :'';
             
        ?>
    <div class="conteudo_informacoes">
     <form name="atualizar" action="" method="post">
          <table width="395" height="243" >
  <tr>
    <th height="37" colspan="2" class="text_endereco" scope="row">Editar Endereço</th>
  </tr>
  <tr>
    <td width="148" height="23" scope="row">Endereço:</td>
    <td width="231"><input type="text" name="endereco" required  value="<?php echo $endereco;  ?>" ></td>
  </tr>
  <tr>
    <td height="23" class="text_endereco" scope="row">Cidade: </td>
    <td><input type="text" name="cidade" required value="<?php echo $cidade; ?>"> </td>
  </tr>
  <tr>
    <td height="23" class="text_endereco" scope="row">Bairro:</td>
    <td><input type="text" name="bairro" value="<?php echo $bairro; ?>" required></td>
  </tr>
  <tr>
    <td height="23" class="text_endereco" scope="row">Cep:</td>
    <td><input type="text" name="cep"  value="<?php echo $cep; ?>" required > </td>
  </tr>
  <tr>
    <td height="23" class="text_endereco" scope="row">Numero:</td>
    <td><input type="text" name="numero" value="<?php echo $numero; ?>" required ></td>
  </tr>
  <tr>
    <td height="23" class="text_endereco" scope="row">Cpf:</td>
    <td><input type="text" name="cep"  value="<?php echo $cep; ?>" required >
    </td>
           </table> 
             <input name="acao" type="hidden" value="update" ><br>  
             <input  type="submit"  value="Atualizar" class="botao" >&nbsp;&nbsp;&nbsp;&nbsp; <a href="minhaConta.php"><input type="button" value="voltar" class="botao" /></a>
           </form>
   </tr>
     </table>
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

