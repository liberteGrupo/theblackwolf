<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login Administrador</title>
    <link href="../styles/style.css" rel="stylesheet" type="text/css">
    </head>
<style type="text/css">
body{}
#login-box-interno{
	width:400px;
	height:280px;
	background-color: #FFF;
	position:absolute;
	margin:10px;
	border-radius:2px;
	box-shadow:0px 0px 40px black;
	overflow:hidden;
	margin:150px auto 0px;
	margin-left:500px;
	}
	#login-box-label{
		height:45px;
		text-align:center;
		font:bold 14px/45px  T, Geneva, sans-serif;
		border-top-left-radiuns:2px;
		border-top-right-radius:2px;
		background-color: #900;
		border-bottom:1px sold #bfc3c5;
		box-shadow:1px 0px 1px black;
		color:#FFF;
		text-shadow:1ox 0px 1px white;
		}
		.input-div{
		margin:20px;
		padding:5px;
		background-color:#f2f5f2;
	}
		
</style>    
    <body>  
    
     <form action="system/system.php" method="post">
<div id="login-box-interno">
<div id="login-box-label">Login Administrador </div>
 <table width="346" align="center" >
  <tr>
    <td width="132" ><label>Email:</label></td>
    <td colspan="2"><input type="email" name="usuario"  required ></td>
  </tr>
  <tr>
    <td scope="row"></label>Senha:</label></td>
    <td colspan="2"><input type="password" name="senha" required ></td>
  </tr>
<br><br>
  </table><br><br>
 <div align="center"> <input type="submit" name="enviar"  class="botaoAdm"/><br>
 </div>
</form>









</div>
      
    </body>
</html>
