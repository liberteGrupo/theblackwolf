<?php

?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico"/>
<script type="text/javascript" src="slide.js"></script>
<title>The Black Wolf</title>
<script type="text/javascript">
function validaCampo()
{
if(document.cadastro.nome.value=="")
{
alert("O Campo nome é obrigatório!");
return false;
}
else
if(document.cadastro.email.value=="" || document.cadastro.email.value.indexOf('@')==-1 || document.cadastro.email.value.indexOf('.')==-1 )
{
alert( "Preencha campo E-MAIL corretamente!" );
document.dados.email.focus();
return false;
}
else
if(document.cadastro.endereco.value=="")
{
alert("O Campo endereço é obrigatório!");
return false;
}
else
if(document.cadastro.cidade.value=="")
{
alert("O Campo Cidade é obrigatório!");
return false;
}
else
if(document.cadastro.estado.value=="")
{
alert("O Campo Estado é obrigatório!");
return false;
}
else
if(document.cadastro.bairro.value=="")
{
alert("O Campo Bairro é obrigatório!");
return false;
}
else
if(document.cadastro.pais.value=="")
{
alert("O Campo país é obrigatório!");
return false;
}
else
if(document.cadastro.login.value=="")
{
alert("O Campo Login é obrigatório!");
return false;
}
else
if(document.cadastro.senha.value=="")
{
alert("Digite uma senha!");
return false;
}
else
return true;
}
<!-- Fim do JavaScript que validará os campos obrigatórios! -->
</script>
</head>

<body >

<div id="header">
<div id="dv1">

<input id="bprocura" type="text" name="busca" value="O que você procura?" onfocus="if(this.value == 'Oque você procura?') {this.value='';}" onblur="if(this.value == '') {this.value='Oque você procura?';}">
 <input type="image" src="images/busca.png" value="enviar" alt="buscar!">

<a id="show-panel" href="login.php">Login</a>
<div id="carrinho"><a href="login.php">Meu Carrinho</a> <img src="images/carrinho2.png" height="20px"></div>
<!-- lightbox-panel -->
<div id="lightbox-panel">
    <center> <h2>Faça seu Login </h2><p></center>
    <hr noshade size="5" width="100%" />
    <div id="login-box-label"> </div>
    <form action="login.php" method="post">
    <div class="input-div" id="input-usuario">Email: &nbsp;
    <input type="text" name="login" value=""/>
</div>
<div class="input-div" id="input-senha">Senha:&nbsp;
    <input type="password"  name="senha"  value=""/>
    
<br>
</div>

<div id="botoes">
<div id="botão"></div>
<div id="lembrar-senha"> <input type="checkbox" />
Lembrar minha senha
</div><br/>

<input type="submit" value="Enviar" class="envio">&nbsp;&nbsp;
    <a id="cadastro" href="frmCadastro.php" font-color="black" >Cadastre-se</a></font> 
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
<ul class="menu">
            <div style="width:900px; float:left;">
            <li><a href="index.php">Home</a></li>
            <li><a href="produtos.php">CDs</a>
        <ul>
            <li> <a href="pop.php">Pop</a> </li>
            <li> <a href="heavymetal.php">Heavy Metal</a> </li>
            <li> <a href="alternativo.php">Alternativo</a> </li>
            <li> <a href="punk.php">Punk</a> </li>

        </ul>
            <li><a href="camisetas.php">Camisetas</a>
        <ul>
            <li><a href="masculino.php">Masculinas</a></li>
            <li><a href="feminino.php">Femininas</a></li>
        </ul>
        </li>
            <div   style="width:-100px; margin-left:100px; float:right;">
            <li><a href="contato.php">Contato</a></li>
            <li><a href="sobrenos.php">Sobre</a></li>
            <li><a href="index.php">Interatividade</a></li>
        </ul>
</nav>

  <div id="lancamento" >
    <div id="frmCadastro" >
       <form id="form_cadastro" name="cadastro" method="post" action="inserirCliente.php" onsubmit="return validaCampo(); return false;"><b>
  <table width="625" border="0">
      <h2 class="text_frm"><label>Cadastro do Cliente:</label></h2>
    <tr>
      <td width="69"><label>Nome:</label></td>
      <td width="546"><input  name="nome" type="text" id="contact" size="70" maxlength="60" /><br>
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input name="email" type="text" id="contact" size="70" maxlength="60"  />
      <span class="style1">*</span></td>
    </tr>
    <tr>
   <td>Sexo:</td>
      <td><input name="sexo" type="radio" value="Masculino" checked="checked" />
        Masculino
        <input name="sexo" type="radio" value="Feminino" />
        Feminino <span class="style1">*</span> </td>
    </tr>
    <tr>
      <td>DDD:</td>
      <td><input name="ddd" type="text" id="ddd" size="4" maxlength="2" />
      Telefone:
        <input name="telefone" type="text" id="ddd" />
        <span class="style3">Apenas números</span> </td>
    </tr>
    <tr>
      <td>Endereço:</td>
      <td><input name="endereco" type="text" id="contact" size="70" maxlength="70" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Número:</td>
      <td><input name="numero" type="text" id="contact" size="10" maxlength="10" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Cidade:</td>
      <td><input name="cidade" type="text" id="contact" maxlength="20" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Estado:</td>
      <td><select name="estado" >
        <option value="AC">AC</option>
        <option value="AL">AL</option>
        <option value="AP">AP</option>
        <option value="AM">AM</option>
        <option value="BA">BA</option>
        <option value="CE">CE</option>
        <option value="ES">ES</option>
        <option value="DF">DF</option>
        <option value="MA">MA</option>
        <option value="MT">MT</option>
        <option value="MS">MS</option>
        <option value="MG">MG</option>
        <option value="PA">PA</option>
        <option value="PB">PB</option>
        <option value="PR">PR</option>
        <option value="PE">PE</option>
        <option value="PI">PI</option>
        <option value="RJ">RJ</option>
        <option value="RN">RN</option>
        <option value="RS">RS</option>
        <option value="RO">RO</option>
        <option value="RR">RR</option>
        <option value="SC">SC</option>
        <option value="SP">SP</option>
        <option value="SE">SE</option>
        <option value="TO">TO</option>
          </select>
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Bairro:</td>
      <td><input name="bairro" type="text" id="contact" maxlength="20" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Cep:</td>
      <td><input name="cep" type="text" id="contact" pattern="\d{5}-?\d{3}" />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>CPF:</td>
      <td><input name="cpf" type="text" id="contact" maxlength="12"  />
        <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Senha:</td>
      <td><input name="senha" type="password" id="contact" maxlength="12" />
          <span class="style1">*</span></td>
    </tr>
      <tr><br>
      <td colspan="2"><input name="news" type="checkbox" id="news" value="ATIVO"  />
Assino os termons de uso do site </td>
    </tr>
    <tr>
      <td colspan="2"><p><br>
              <input name="cadastrar" type="submit" class="botaoAdm" value="Cadastrar" />&nbsp;&nbsp;
        <input name="limpar" type="reset"  class="botaoAdm" value="Limpar"  />
        <span class="style1">* Campos com * são obrigatórios!          </span></p>
      <p>  </p></td>
    </tr>
  </table>
</form>

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