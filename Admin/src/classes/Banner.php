<?php

@session_start();

class Banner{

    public function GetAllBannersToFront()
    {
        require 'Admin/src/db/connect.php';

        $getBanners = $conn->prepare("SELECT * FROM banner WHERE banner_status = 'ativo' ");

        $getBanners->execute();

        $data = $getBanners->fetchAll();

        return $data;
    }

    public function GetAllBanners()
    {
        require 'src/db/connect.php';

        $getBanners = $conn->prepare("SELECT * FROM banner");

        $getBanners->execute();

        $data = $getBanners->fetchAll();

        return $data;
    }

    public static function UploadBannerToFolder($img)
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
                $newName = 'banner_'.uniqid(time()) . '.' . $extensao;
    
                // Concatena a pasta com o nome
                $destino = '../../public/img/banners/'.$newName;
        
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

    public function InsertBanner($title, $sub_title, $text, $link, $img, $status, $created_at)
    {
        require '../db/connect.php';

        $uploadFile = Banner::UploadBannerToFolder($img);

            if ($uploadFile) {

                if ($uploadFile[0] === true) {

                    $insert_banner = $conn->prepare(
                        "INSERT INTO banner 
                        (banner_title, 
                        banner_sub_title,
                        banner_text, 
                        banner_link, 
                        banner_image,
                        banner_status, 
                        created_at) 
                        VALUES
                        (:title,
                        :sub_title,
                        :text,
                        :link,
                        :fileN,
                        :status,
                        :created_at)"
                    );

                    $insert_banner->bindValue(':title', $title);
                    $insert_banner->bindValue(':sub_title', $sub_title);
                    $insert_banner->bindValue(':text', $text);
                    $insert_banner->bindValue(':link', $link);
                    $insert_banner->bindValue(':fileN', $uploadFile[1]);
                    $insert_banner->bindValue(':status', $status);
                    $insert_banner->bindValue(':created_at',$created_at);

    
                        if ($insert_banner->execute()) {
                            
                            header('Location: http://localhost/Humanalitics/Admin/banner.php');
                        }
                }
            }
    }

    public function UpdateStatus(string $id, string $status)
    {
        require '../db/connect.php';

        $updateStatus = $conn->prepare("UPDATE banner SET banner_status = :newStatus WHERE id = :id");
        $updateStatus->bindValue(':newStatus', $status);
        $updateStatus->bindValue(':id', $id);
        $success = $updateStatus->execute();
        
        if ($success) {

            $_SESSION['statusUpdate'] = '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            Status alterado com sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            header('Location: http://localhost/Humanalitics/Admin/banner.php');
        } else {

            $_SESSION['statusUpdate'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Não foi possível alterar o status!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

            header('Location: http://localhost/Humanalitics/Admin/banner.php');
        }
    }

    public function DeleteBanner($id)
    {
        require '../db/connect.php';
        $sql = "DELETE FROM banner WHERE id=$id";    

        $del_banner = $conn->prepare($sql);

        $success = $del_banner->execute();

            if ($success) {

                $_SESSION['statusUpdate'] = '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                Banner removido com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                header('Location: http://localhost/Humanalitics/Admin/banner.php');

            }else{

                $_SESSION['statusUpdate'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Não foi possível remover esse banner!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
    }
    
}