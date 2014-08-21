<?php
echo '<meta charset=utf-8>';
include '../conexao/conecta.inc';
$hoje = date('Y-m-d');
$sql ="SELECT * FROM itens_pedidos ";
$result = mysql_query($sql);
$dados = mysql_fetch_array($result);
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data Pedido', 'Quantidade Pedido'],
          ['12', '21']
          ['12', '21']
          ['12', '21']
          ['12', '21']
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  Estatisticas do Dia
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>