<?php
if ($nome != '' && $email != '' && $texto != '')
{ 
//codigo
$nome = htmlspecialchars(strip_tags($_POST['nome']));
$texto = htmlspecialchars(strip_tags($_POST['texto']));
$email = htmlspecialchars(strip_tags($_POST['email']));
$refresh = '<meta http-equiv="refresh" content="1; url=form.html" />';
  if (!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    echo '<script type="text/javascript">alert("E-mail inválido!.")</script>';  
    exit ($refresh);    
  } elseif
    (!filter_var($email, FILTER_SANITIZE_EMAIL))
    {
    echo '<script type="text/javascript">alert("E-mail inválido!. Contém caracteres não permitidos.")</script>';
    exit ($refresh);    
  }
} else{
  echo '<script type="text/javascript">alert("Por favor preencha todos os campos.")</script>';
  exit ($refresh);      }



  ?>