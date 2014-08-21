<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Busca com jQuery ( Recriando )</title>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	
	//PESQUISA INSTANTANEA PELO INPUT
	$("#pesquisa").keyup(function(){
		//Recupera oque está sendo digitado no input de pesquisa
		var pesquisa 	= $(this).val();

		//Recupera oque foi selecionado
		var campo 		= $("#campo").val();

		//Verifica se foi digitado algo
		if(pesquisa != ''){
			//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa e na propriedade campo o campo a ser pesquisado
			var dados = {
				palavra : pesquisa,
				campo 	: campo
			}
			
			//Envia por AJAX pelo metodo post, a pequisa para o arquivo 'busca.php'
			//O paremetro 'retorna' é responsável por recuperar oque vem do arquivo 'busca.php'
			$.post('busca.php', dados, function(retorna){
				//Mostra dentro da ul com a class 'resultados' oque foi retornado
				$(".resultados").html(retorna);
			});
		}else{
			$(".resultados").html('');
		}
	});

	//PESQUISA INSTANTANEA PELO SELECT
	$("#campo").change(function(){
		//Recupera oque está sendo digitado no input de pesquisa
		var pesquisa = $("#pesquisa").val();

		//Recupera oque foi selecionado
		var campo 		= $(this).val();

		//Verifica se foi digitado algo
		if(pesquisa != ''){
			//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa e na propriedade campo o campo a ser pesquisado
			var dados = {
				palavra : pesquisa,
				campo 	: campo
			}
			
			//Envia por AJAX pelo metodo post, a pequisa para o arquivo 'busca.php'
			//O paremetro 'retorna' é responsável por recuperar oque vem do arquivo 'busca.php'
			$.post('busca.php', dados, function(retorna){
				//Mostra dentro da ul com a class 'resultados' oque foi retornado
				$(".resultados").html(retorna);
			});
		}else{
			$(".resultados").html('');
		}
	});

	//PESQUISA DE FORMULÀRIO
	$("#form-pesquisa").submit(function(e){
		//Cancela a ação padrao o formulário, impedindo que ele atualize a página
		e.preventDefault();

		//Recupera oque está sendo digitado no input de pesquisa
		var pesquisa = $("#pesquisa").val();

		//Recupera oque foi selecionado
		var campo = $("#campo").val();
		
		//Se não for digitado nada, então ele mostra um alert
		if(pesquisa == ''){
			alert('Informe sua Pequisa!');
		}else{
			//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa
			//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa e na propriedade campo o campo a ser pesquisado
			var dados = {
				palavra : pesquisa,
				campo 	: campo
			}
			
			//Envia por AJAX pelo metodo post, a pequisa para o arquivo 'busca.php'
			//O paremetro 'retorna' é responsável por recuperar oque vem do arquivo 'busca.php'
			$.post('busca.php', dados, function(retorna){
				$(".resultados").html(retorna);
			});
		}
	});
});
</script>
</head>

<body>

<form id="form-pesquisa" action="" method="post">
	Pesquisar por:
	<select id="campo">
		<!-- Os valores das opções devem ser os mesmos nomes dos campos dos quias se quer a pesquisa -->
		<option selected value="titulo">Titulo</option>
		<option value="categoria">Categoria</option>
	</select>

	<input type="text" name="pesquisa" id="pesquisa">
    <input type="submit" name="enviar" value="Pesquisar">
</form>

<ul class="resultados">
</ul>

</body>
</html>