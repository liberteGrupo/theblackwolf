<?php
require 'system/system.php';
require 'system/config.php';
?>
<!DOCTYPE HTM>
<html lang="pt_BR">
<head>
	<meta charset="UTF-8">
	<title>NewsLetter Painel</title>
</head>

<body>

	<!-- GERENCIAR INSCRITOS -->
	<h2>
		Gerenciar Inscritos |
		<a href="#" title="Enviar NewsLetter">Enviar NewsLetter</a>
	</h2>
	<hr>

	<h2>Estatisticas</h2>
	<h3>5 Inscritos | 3 Ativos | 2 Inativos</h3>
	<hr>

	<ol>
		<li>
			<strong>Lucas Pires</strong><br>
			[contato@coderweb.com.br] --
			<a href="#" title="Desativar">Desativar</a> |
			<a href="#" title="Deletar">Deletar</a>
			<hr>
		</li>

		<li>
			<strong>Lucas Pires</strong><br>
			[contato@coderweb.com.br] --
			<a href="#" title="Desativar">Desativar</a> |
			<a href="#" title="Deletar">Deletar</a>
			<hr>
		</li>

		<li>
			<strong>Lucas Pires</strong><br>
			[contato@coderweb.com.br] --
			<a href="#" title="Desativar">Desativar</a> |
			<a href="#" title="Deletar">Deletar</a>
			<hr>
		</li>
	</ol>
	<!-- /GERENCIAR INSCRITOS -->

	<!-- ENVIAR NEWSLETTER -->
	<h2>
		Enviar NewsLetter |
		<a href="#" title="Gerenciar Inscritos">Gerenciar Inscritos</a>
	</h2>
	<hr>
<?php 
EnviaNewletter();
?>
	<form action="" method="post">
		<label>Assunto</label><br>
		<input type="text" name="conteudo"><br>

		<label>Mensagem</label><br>
		<textarea name="mensagem" cols="50" rows="15"></textarea><br>

		<input type="submit" name="enviar" value="Enviar NewsLetter">
	</form>
	<!-- /ENVIAR NEWSLETTER -->
</body>
</html>