<nav id="menu">
<ul class="menu">
            <div style="width:900px; float:left;">
            <li><a href="index.php">Home</a></li>
            <li><a href="cd.php">CDs</a>
          <ul>
         <?php 
         include  'conexao/conecta.inc';
         $sql   = 'select * from categoria inner join subcategoria on categoria.id_categoria =  subcategoria.id_categoria where nome_categoria = "cd"'; 
         $result= mysql_query($sql);
         if(mysql_num_rows($result) === 0){
             echo 'Nao';
         }else{
             while($linha = mysql_fetch_array($result)){
                 ?>
              <li><a href="categoria.php?categoria=<?php echo $linha['ID_SUBCATEGORIA']; ?>" > <?php echo  $linha['NOME_SUBCATEGORIA']; ?></a></li>
             
             <?php
                
             }
             
             }
         ?>
        </ul>
            <li><a href="camisetas.php">Camisetas</a>
        <ul>
              <?php 
             while($linha = mysql_fetch_array($result)){
                 ?>
              <li><a href="categoria.php?categoria=<?php echo $linha['ID_SUBCATEGORIA']; ?>" > <?php echo  $linha['NOME_SUBCATEGORIA']; ?></a></li>
             
             <?php
             }
         ?>    
             
             
    
        </ul>
        </li>
            <div   style="width:-100px; margin-left:100px; float:right;">
            <li><a href="contato.php">Contato</a></li>
            <li><a href="sobrenos.php">Sobre</a></li>
            <li><a href="index.php">Interatividade</a></li>
        </ul>
</nav>

