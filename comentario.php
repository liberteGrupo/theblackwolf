    <label>Comentarios:</label>
<?php
$sql            = mysql_query("SELECT * FROM comentario WHERE ID_PRODUTO = '$id'");
$result         = mysql_num_rows($sql);
    if($result <= 0){
echo "<label >Nenhum Comentario Realizado Seje o primeiro!</label>";
?>
    <form action="" class="form_comentario" method="post">
    <label>Comentário</label><br>
    <textarea name="comentario"  class="textarea_comentario"></textarea><br><br>
    <input type="submit" name="enviar" value="Enviar" class="botaoAdm">
  </form>
<?php
     }else{
$query                 = "SELECT * FROM comentario INNER JOIN cliente INNER JOIN produto ON comentario.ID_CLIENTE =  cliente.ID_CLIENTE AND comentario.ID_PRODUTO = produto.ID_PRODUTO WHERE produto.ID_PRODUTO = '$id'";
$result                = mysql_query($query);
while ($lnComentario   = mysql_fetch_assoc($result)) {
  echo '<label class="pedido_texto"><b>Nome:'.$lnComentario['NOME_CLIENTE'].'</b></label>';
  echo '<label>'.$lnComentario['COMENTARIO'].'</label>';
}

?>
  <form action="<?php $_SERVER['PHP_SELF'];?>" class="form_comentario" method="post">
    <label>Comentar:</label><br>
    <textarea name="comentario"  class="textarea_comentario"></textarea><br><br>
    <input type="submit" name="enviar" value="Enviar" class="botaoAdm">
  </form>
<?php




}
?>