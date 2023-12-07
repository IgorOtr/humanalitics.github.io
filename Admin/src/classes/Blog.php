<?php
@session_start();

class Blog{

    public function GetAllPosts()
    {
        require '../db/connect.php';

        echo 'GET ALL';
    }

    public static function UploadPostImageToFolder($img)
    {
        if (!empty($img)) {
    
            $arquivo_tmp = $img['tmp_name'];
    
            // Pega a extensão do arquivo de imagem
            $extensao = pathinfo ($img['name'], PATHINFO_EXTENSION);
        
            // Converte a extensão para minúsculo
            $extensao = strtolower($extensao);
        
            // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfileiro as extensões permitidas e separo por ';'
            // Isso serve apenas para eu poder pesquisar dentro desta String
            if ( strstr ('.jpg;.jpeg;.png', $extensao)) {
    
                // Cria um nome único para esta imagem
                // Evita que duplique as imagens no servidor.
                // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                $newName = 'blog_'.uniqid(time()) . '.' . $extensao;
    
                // Concatena a pasta com o nome
                $destino = '../../public/img/post/'.$newName;
        
                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
    
                    return [true, $newName];

                } else {

                    echo 'Erro ao salvar o arquivo. Aparentemente, você não tem permissão de escrita.<br />';

                    return false;
                }

            } else {

                echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.png"<br />';

                return false;
            } 

        } else {

            echo 'Você não enviou nenhum arquivo!';

            return false;
        }
    }

    public function InsertPost($title, $content, $image, $status, $created_at)
    {
        require '../db/connect.php';

        $returnImageMethod = Blog::UploadPostImageToFolder($image);

        if ($returnImageMethod) {

            if ($returnImageMethod[0] === true) {

                $insert_banner = $conn->prepare(
                    "INSERT INTO blog 
                    (post_title, 
                    post_content,
                    post_image, 
                    post_status, 
                    created_at) 
                    VALUES
                    (:title,
                    :content,
                    :imageFile,
                    :postStatus,
                    :created_at)"
                );

                $insert_banner->bindValue(':title', $title);
                $insert_banner->bindValue(':content', $content);
                $insert_banner->bindValue(':imageFile', $returnImageMethod[1]);
                $insert_banner->bindValue(':postStatus', $status);
                $insert_banner->bindValue(':created_at', $created_at);

                    if ($insert_banner->execute()) {

                        $_SESSION['statusUpdate'] = '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Post adicionado com sucesso!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        
                        header('Location: http://localhost/Humanalitics/Admin/blog.php');
                    }
            }
        }   
    }
    
}