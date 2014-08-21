<?php 
if( isset($_GET['pedido']) && isset($_GET['acao'])){
    $pedido = $_GET['pedido'];
    $acao   = $_GET['acao'];
       if($acao === '1'){
           $query  = "UPDATE pedido SET PAGAMENTO_PEDIDO = false WHERE ID_PEDIDO = '$pedido' "; 
           $result = mysql_query($query); 
       if($result){
          echo 'deu merda mesmo 1';
      }else{    
          header('Location:pedidos.php');
      }
     }elseif($acao === '2'){   
           $query   = "UPDATE pedido SET PAGAMENTO_PEDIDO = true WHERE ID_PEDIDO = '$pedido'";
           $result = mysql_query($query);
      if(!$result){
          echo 'deu merda mesmo 2';
      }else {
          header('Location:pedidos.php');
      }
     
    }
    
    
}