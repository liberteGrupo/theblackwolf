<?php
 if(isset($_POST['acao']) && $_POST['acao'] =='update' ):
              $recuperEndereco =  $_POST['endereco'];
              $recuperCidade = $_POST['cidade'];
              $recuperBairro =  $_POST['bairro'];
              $recuperCep =  $_POST['cep'];
              $recuperNumero = $_POST['numero'];
               
           
              $update = mysql_query("UPDATE endereco SET CIDADE = '$recuperCidade',BAIRRO= '$recuperBairro',"
                      . "ENDERECO = '$recuperEndereco',NUMERO='$recuperNumero',CEP = '$recuperCep' "
                      . "WHERE ID_ENDERECO ='$codigo_endereco'");
  if($update):
    include 'funcoes/logRegistros.php';
            $mensagem  = 'Usuario Atualizou Dados';
    salvaLog($mensagem);  
    echo '<script language="Javascript">
    alert("Dados atualizados com sucesso !")
    location.href=minhaConta.php
   </script>';
    else:
    echo '<script>
    alert("Não  foi  possivel atualizar !")
    location.href=minhaConta.php
     </script>';
      endif;
endif;

