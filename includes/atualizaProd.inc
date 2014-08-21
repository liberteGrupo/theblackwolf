<?php

if(isset($_POST['acao']) && $_POST['acao'] == 'update'){
   $codigo_produto = intval($_GET['codigo']);
      $recuperIdCategoria = $_POST['categoria'];
      $recuperNome        =  $_POST['nome'];
      $recuperDescricao   = $_POST['descricao'];
      $recuperArtista     =  $_POST['artista'];
      $recuperPreco       =  $_POST['preco'];
      $recuperQtde        = $_POST['qtde_produto'];
      $recuperTamanho     = $_POST['tamanho'];      
      $foto               = $_FILES['foto'];
      $recuperPeso        = $_POST['peso'];
      $codigo_produto     = intval($_GET['codigo']);
   // Se a foto estiver sido selecionada 
if (!empty($foto["name"]))
    {   // Largura máxima em pixels
     $largura = 1500; 
     // Altura máxima em 
      $altura = 1500; 
     // Tamanho máximo do arquivo em bytes
      $tamanho = 1024 * 1024 * 2; 
       // Verifica se o arquivo é uma imagem
        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){ $error[1] = "Isso não é uma imagem."; 
        }   
        // Pega as dimensões da imagem 
        $dimensoes = getimagesize($foto["tmp_name"]);   
        // Verifica se a largura da imagem é maior que a largura permitida 
        if($dimensoes[0] > $largura)
         { $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
          }  
           // Verifica se a altura da imagem é maior que a altura permitida 
           if($dimensoes[1] > $altura)
            { $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels"; 
            } 
              // Verifica se o tamanho da imagem é maior que o tamanho permitido 
              if($foto["size"] > $tamanho)
               { $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
               }  
                // Se não houver nenhum erro 
               if (count($error) == 0)
               {   
               // Pega extensão da imagem 
               preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);   
               // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];   
                // Caminho de onde ficará a imagem
                 $caminho_imagem = "../images/" . $nome_imagem;   
                 // Faz o upload da imagem para seu respectivo caminho 
                 move_uploaded_file($foto["tmp_name"], $caminho_imagem);   
                 // Insere os dados no banco
                
$sql = "UPDATE produto SET ID_CATEGORIA='$recuperIdCategoria',NOME_PRODUTO = '$recuperNome',"
        . "DESCRICAO_PRODUTO='$recuperArtista',ARTISTA_PRODUTO='$recuperArtista',"
        . "PRECO_PRODUTO='$recuperPreco',QTDE_PRODUTO='$recuperQtde',TAMANHO_PRODUTO='$recuperTamanho',PRODUTO_IMAGEM='$nome_imagem'"
        . "   WHERE ID_PRODUTO='$codigo_produto'";   
                  // Se os dados forem inseridos com sucesso
                   if (mysql_query($sql))
                    { 
                   echo '<script>
    alert("Produto atualizado Com  sucesso!");
    location.href="../admin/produtos.php"
            </script>';
                  
               }else
               {
                echo mysql_error();
               }
                  }   // Se houver mensagens de erro, exibe-as 
                   if (count($error) != 0)
                     { 
                      foreach ($error as $erro)
                             { echo $erro . "<br />"; 
                     
                  } 
                      
                     }
                        } 
                         
}