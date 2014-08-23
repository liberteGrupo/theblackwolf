<?php
        include 'conexao/conecta.inc';
        //Seta os cacteres vindos do banco em UTF8
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET charecter_set_client=utf8');
	mysql_query('SET charecter_set_results=utf8');
	
	//Recupera a pesquisa feita
	$pesquisa 	= mysql_real_escape_string($_POST['palavra']);
	//Recupera oque foi selecionado
	$campo 		= mysql_real_escape_string($_POST['campo']);

	//Cria a SQL para fazer a consulta no banco, e onde se poe o nome do campo, trocamos pela váriavel '$campo'
	/*Exemplo: se for selecionado o campo titulo, então ele pequisa na tabela no campo titulo,
	se for selecionado o campo categoria ele faz a pesquisa no campo categoria da tabela*/
	$sql = "SELECT * FROM series WHERE $campo LIKE '%$pesquisa%'";

	//Excuta a SQL
	$query		= mysql_query($sql) or die("Erro ao Pesquisar");
	
	//Se não for encontrado nada, então diz: 'Nada Encontrado...', se não retorna o resultado
	if(mysql_num_rows($query) <= 0){
		echo 'Nada Encontrado...';
	}else{
		//Como é retornado um array, então precisamos colocar novamente a váriavel '$campo' onde colocamos a nome do campo a ser exibido
		while($res = mysql_fetch_assoc($query)){
			echo '<li>'.$res[$campo].'</li>';
		}
	}

