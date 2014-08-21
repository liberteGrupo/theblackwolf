<!DOCTYPE html>
<html>
<head>
	<title>Theblackwolf</title>
</head>
<body>
<div id="header">
<div id="dv1">
<input id="bprocura" type="text" name="busca" value="O que você procura?" onfocus="if(this.value == 'Oque você procura?') {this.value='';}" onblur="if(this.value == '') {this.value='Oque você procura?';}">
 <input type="image" src="images/busca.png" value="enviar" alt="buscar!">
<a id="show-panel" href="">Login</a>
<div id="carrinho"><a href="login.php">Meu Carrinho<img src="images/carrinho2.png" height="20px"></a> </div>
<!-- lightbox-panel -->
<div id="lightbox-panel">
   <center> <h2>Faça seu Login </h2><p></center>
    <noshade size="5" width="100%" />hr 
    <div id="login-box-label"> </div>
    <form action="login.php" method="post">
<div class="input-div" >Email: &nbsp;
    <input type="text" name="email" />
</div>
<div class="input-div" id="input-senha">Senha:&nbsp;
    <input type="password" name="senha"  />
<br>
</div>
<div id="botoes">
<div id="botão"></div>
<div id="lembrar-senha"> <input type="checkbox" />
Lembrar minha senha
</div><br/>
<input type="submit" value="Enviar" class="envio">&nbsp;&nbsp;
<a id="cadast" href="frmCadastro.php" font color="black" >Cadastre-se</a></font> 
</div>
 </form>    
    </p>
    <p align="center">
    <a id="close-panel" href="#">Fechar</a>
    </p>
</div>
</body>
</html>