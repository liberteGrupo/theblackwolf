<!DOCTYPE html>
<html>
<head>
	<title>Busca com jquery</title>
</head>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#pesquisa").keyup(function(){
    var pesquisa = $(this).val();
    if(pesquisa != ''){
    	var dados = {
    		palavra : pesquisa;
    	}
    $.post('busca.php',dados,function(retorna){
        $(".resultados").html(retorna);
    	 
    });
       });
	});
</script>
<body>
<form action="" method="post">
Buscar:<input type="text" id="pesquisa" name="pesquisa"><input type="submit" name="buscar" value="Buscar">

<ul class="resultados">
	
</ul></form>
</body>
</html>