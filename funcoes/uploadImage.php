<?php
if (isset($_POST['cadastrar']))
 {  
  // Recupera os dados dos campos
   $tipoCategoria = $_POST['categoria'];
   $nome = $_POST['nome'];
   $foto = $_FILES["foto"];  
   $descricao = $_POST['descricao'];
   $preco =  $_POST['preco'];
   $tamanho = $_POST['tamanho'];
   $artista  = $_POST['artista'];
   $qtde  = $_POST['qtde_produto'];
   $qtde  = $_POST['qtde_produto'];
   $peso  = $_POST['peso'];
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
                
$sql = mysql_query("INSERT INTO produto VALUES ('','".$tipoCategoria."','".$nome."','".$descricao."','".$artista."','".$preco."','".$qtde."','".$tamanho."','".$nome_imagem."','".$peso."')");   
                  // Se os dados forem inseridos com sucesso
                   if ($sql){ echo "<script> alert('Produto inserido Com Sucesso!');
                   location.href='produtos.php'
                   </script>"; }else{ echo "<script> alert('Não foi possivel cadastrar Produto!');
                   location.href='produtos.php'
                   </script>"; } } 
                     // Se houver mensagens de erro, exibe-as 
                   if (count($error) != 0)
                     { foreach ($error as $erro)
                         { echo $erro . "<br />"; 
                     
                  } 
                      
                     }
                        } 
                         
                            } 