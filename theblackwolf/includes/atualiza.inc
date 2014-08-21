<?php
 if(isset($_POST['acao']) && $_POST['acao'] =='update' ):
              $recuperNome =  mysql_real_escape_string($_POST['nome']);
              $recuperEmail = mysql_real_escape_string($_POST['email']);
              $recuperSenha = mysql_real_escape_string($_POST['senha']);
              $recuperTipo  = mysql_real_escape_string($_POST['tipo']); 
              $codigo_usuario  =  intval($_GET['codigo']);
             
$update = mysql_query(" UPDATE cliente SET  NOME_CLIENTE = '$recuperNome',EMAIL_CLIENTE='$recuperEmail',
                        SENHA_CLIENTE='$recuperSenha',TIPO_CLIENTE='$recuperTipo'
                        WHERE ID_CLIENTE ='$codigo_usuario'");
  if($update):
    echo '<script language="Javascript">
    alert("Dados atulizados com sucesso !")
    location.href=listarUsuarios.php
   </script>';
    else:
    echo '<script>
    alert("Não  foi  possivel atualizar seus Dados !")
    location.href=listarUsuarios.php
     </script>';
      endif;
endif;