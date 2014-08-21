<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div id="header">

<div id="dv1">
<input id="bprocura" type="text" name="consulta" value="O que você procura?" >
<input type="image" src="images/busca.png" value="OK" alt="buscar!">
</form>
<a id="show-panel" href=""></a>
<div id="carrinho"><a href="carrinho.php"><img src="images/carrinho2.png" height="20px"></a> &nbsp;&nbsp;&nbsp;<a href="minhaConta.php"><img src="images/adm.png" height="20px"></a>&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="images/logout.png" height="20px"></a>
</div>
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
</body>
</html>


