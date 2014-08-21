<?php
require 'system/system.php';
?>
<!DOCTYPE HTM>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>NewsLetter</title>
</head>
<body>
	<h2>Inscrever-se</h2>
	<hr>
        <?php RegisterNews()  ?>
	<form action="" method="post">
		<label>Nome</label><br>
		<input type="text" name="nome"><br>
		<label>E-mail</label><br>
		<input type="text" name="email"><br>
		<input type="submit" name="cadastrar" value="Inscrever-se">
	</form>
	
</body>
</html>