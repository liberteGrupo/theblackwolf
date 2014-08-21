<?php

?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="styles/style.css" rel="stylesheet" type="text/css" />
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
document.cadastro.email.focus();
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
function MascaraCep(cep){
		if(mascaraInteiro(cep)==false){
		event.returnValue = false;
	}	
	return formataCampo(cep, '00.000-000', event);
}

function MascaraTelefone(tel){	
	if(mascaraInteiro(tel)==false){
		event.returnValue = false;
	}	
	return formataCampo(tel, '(00) 0000-0000', event);
}
//adiciona mascara ao CPF
function MascaraCPF(cpf){
	if(mascaraInteiro(cpf)==false){
		event.returnValue = false;
	}	
	return formataCampo(cpf, '000.000.000-00', event);
}
//valida telefone
function ValidaTelefone(tel){
	exp = /\(\d{2}\)\ \d{4}\-\d{4}/
	if(!exp.test(tel.value))
		alert('Numero de Telefone Invalido!');
}

//valida data
function ValidaData(data){
	exp = /\d{2}\/\d{2}\/\d{4}/
	if(!exp.test(data.value))
		alert('Data Invalida!');			
}
//valida o CPF digitado
function ValidarCPF(Objcpf){
	var cpf = Objcpf.value;
	exp = /\.|\-/g
	cpf = cpf.toString().replace( exp, "" ); 
	var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
	var soma1=0, soma2=0;
	var vlr =11;
	
	for(i=0;i<9;i++){
		soma1+=eval(cpf.charAt(i)*(vlr-1));
		soma2+=eval(cpf.charAt(i)*vlr);
		vlr--;
	}	
	soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
	soma2=(((soma2+(2*soma1))*10)%11);
	
	var digitoGerado=(soma1*10)+soma2;
	if(digitoGerado!=digitoDigitado)	
		alert('CPF Invalido!');		
}

//valida numero inteiro com mascara
function mascaraInteiro(){
	if (event.keyCode < 48 || event.keyCode > 57){
		event.returnValue = false;
		return false;
	}
	return true;
}
function formataCampo(campo, Mascara, evento) { 
	var boleanoMascara; 
	
	var Digitato = evento.keyCode;
	exp = /\-|\.|\/|\(|\)| /g
	campoSoNumeros = campo.value.toString().replace( exp, "" ); 
   
	var posicaoCampo = 0;	 
	var NovoValorCampo="";
	var TamanhoMascara = campoSoNumeros.length;; 
	
	if (Digitato != 8) { // backspace 
		for(i=0; i<= TamanhoMascara; i++) { 
			boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
								|| (Mascara.charAt(i) == "/")) 
			boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
								|| (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
			if (boleanoMascara) { 
				NovoValorCampo += Mascara.charAt(i); 
				  TamanhoMascara++;
			}else { 
				NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
				posicaoCampo++; 
			  }	   	 
		  }	 
		campo.value = NovoValorCampo;
		  return true; 
	}else { 
		return true; 
	}
}

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
<?php 
include 'includes/menu.php';
?>
</nav>

  <section>
    <div id="frmCadastro" >
       <form id="form_cadastro" name="cadastro" method="post" action="funcoes/incluir.php" onsubmit="return validaCampo(); return false;"><b>
  <table width="625" border="0">
      <h2 class="text_frm"><h2 class="texto_error">Cadastro do Cliente:</h2>
    <tr>
      <td width="69"><label>Nome:</label></td>
      <td width="546"><input  name="nome" type="text" id="contact" size="70" maxlength="60" /><br>
      </td>
    </tr>
    <tr>
      <td><label>Email:</label></td>
      <td><input name="email" type="text" id="contact" size="70" maxlength="60"  />
    </td>
    </tr>
    <tr>
      <td><label>DDD:</label></td>
      <td><input name="ddd" type="text" id="ddd" size="4" maxlength="2" />
      <label>Telefone:</label>
<input type="text" name="tel" id="ddd" onKeyPress="MascaraTelefone(form_cadastro.tel);" 
maxlength="14"  onBlur="ValidaTelefone(form_cadastro.tel);">
        </td>
    </tr>
    <tr>
      <td><label>DDD:</label></td>
      <td><input name="tel" type="tel" id="tel" size="4" maxlength="2" />
       <label> Celular:</label> 
<input type="tel" name="tel" id="tel" onKeyPress="MascaraTelefone(form_cadastro.tel);" 
maxlength="14"  onBlur="ValidaTelefone(form_cadastro.tel);">
       </td>
    </tr>
    <tr>
      <td><label>Endereço:</label></td>
      <td><input name="endereco" type="text" id="contact" size="70" maxlength="70" />
        </td>
    </tr>
    <tr>
      <td><label>Número:</label></td>
      <td><input name="numero" type="text" id="contact" size="10" maxlength="10" />
      </td>
    </tr>
    <tr>
      <td><label>Cidade:</label></td>
      <td><input name="cidade" type="text" id="contact" maxlength="20" />
      </td>
    </tr>
    <tr>
      <td><label>Estado:</label></td>
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
      </td>
    </tr>
    <tr>
      <td><label>Bairro:</label></td>
      <td><input name="bairro" type="text" id="contact" maxlength="20" />
        </td>
    </tr>
    <tr>
      <td><label>Cep:</label></td>
      <td>
<input type="text" name="cep" id="contact" onKeyPress="MascaraCep(form_cadastro.cep);"
 maxlength="10" onBlur="ValidaCep(form_cadastro.cep)">
        </td>
    </tr>
    <tr>
      <td><label>CPF:</label></td>
      <td><input type="text" name="cpf" onBlur="ValidarCPF(form_cadastro.cpf);" 
                 onKeyPress="MascaraCPF(form_cadastro.cpf);" maxlength="14" id="contact"> 
      </td>
    </tr>
    <tr>
      <td><label>Senha:</label></td>
      <td><input name="senha" type="password" id="contact" maxlength="12" />
        </td>
    </tr>
      <tr><br>
      <td colspan="2"><input name="news" type="checkbox" id="news" value="ATIVO"  />
<label>Assino os termons de uso do site</label> </td>
    </tr>
    <tr>
      <td colspan="2"><p><br>
              <input name="cadastrar" type="submit" class="botaoAdm" value="Cadastrar" />&nbsp;&nbsp;
        <input name="limpar" type="reset"  class="botaoAdm" value="Limpar"  />
        </p>
      <p>  </p></td>
    </tr>
  </table>
</form>

    </div>
 </div>
   </section>
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