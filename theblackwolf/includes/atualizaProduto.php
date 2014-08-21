<?php
if(isset($_POST['acao']) && $_POST['acao'] == 'update')
    {
              $codigo_produto = intval($_GET['codigo']);
              $recuperIdProduto =  $_POST['categoria'];
              $recuperNome =  $_POST['nome'];
              $recuperDescricao = $_POST['descricao'];
              $recuperArtista=  $_POST['artista'];
              $recuperPreco =  $_POST['preco'];
              $recuperQtde = $_POST['qtde_produto'];
              $recuperTamanho = $_POST['tamanho'];
              $recuperProdImagem = $_FILES['foto'];
$updateProduto = "UPDATE produto SET ID_CATEGORIA='$recuperIdProduto',NOME_PRODUTO = '$recuperNome',"
        . "DESCRICAO_PRODUTO='$recuperArtista',ARTISTA_PRODUTO='$recuperArtista',"
        . "PRECO_PRODUTO='$recuperPreco',QTDE_PRODUTO='$recuperQtde',TAMANHO_PRODUTO='$recuperTamanho',PRODUTO_IMAGEM='$recuperProdImagem'"
        . "   WHERE ID_PRODUTO='$codigo_produto' ";
    }
    
    
  if(mysql_query($updateProduto)){
      echo '<script>'
      . 'alert("Produto Atualizado Com Sucesso!");'
              . 'href.location="produtos.php"'
              . '</script>';
  }else{
       echo '<script>'
      . 'alert("Produto Atualizado Com Sucesso!");'
              . 'href.location="produtos.php"'
              . '</script>';
  }