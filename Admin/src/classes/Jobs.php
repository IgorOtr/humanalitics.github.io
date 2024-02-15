<?php

@session_start();

class Job{

    public function getAllJobs()
    {

        require 'src/db/connect.php';

        $sql = "SELECT * FROM jobs";

        $select = $conn->prepare($sql);
        $success = $select->execute();

            if ($success) {
                
                $data = $select->fetchAll();

                return $data;
            }

    }

    public function getJobToEdit($id)
    {

        require 'src/db/connect.php';

        $sql = "SELECT * FROM jobs WHERE id = :_id";

        $select = $conn->prepare($sql);
        $select->bindValue(':_id', $id);

        $success = $select->execute();

            if ($success) {
                
                $data = $select->fetchAll();

                return $data;
            }

    }

    public static function getImageToUnlink($id)
    {

        require '../db/connect.php';

        $sql = "SELECT job_image FROM jobs WHERE id = :_id";

        $select = $conn->prepare($sql);
        $select->bindValue(':_id', $id);

        $success = $select->execute();

            if ($success) {
                
                $data = $select->fetchAll();

                return $data;
            }

    }
    public function getAllActiveJobs()
    {

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
                $newName = 'job_'.uniqid(time()) . '.' . $extensao;
    
                // Concatena a pasta com o nome
                $destino = '../../public/img/jobs/'.$newName;
        
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


    public function addNewJob($title, $sub_title, $description, $image, $limit_date, $status)
    {

        require '../db/connect.php';

        $uploadImage = self::UploadPostImageToFolder($image);

            if ($uploadImage[0] == true) {
                
                $sql = "INSERT INTO jobs (job_title, job_subtitle, job_description, job_limit_date, job_image, job_status) VALUES (:_title, :_subtitle, :_description, :_limit_date, :_image, :_status)";

                $add = $conn->prepare($sql);
                $add->bindValue(':_title', $title);
                $add->bindValue(':_subtitle', $sub_title);
                $add->bindValue(':_description', $description); 
                $add->bindValue(':_limit_date', $limit_date);
                $add->bindValue(':_image', $uploadImage[1]);
                $add->bindValue(':_status', $status);

                $success = $add->execute();

                    if ($success) {

                        $_SESSION['statusUpdate'] = '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                Vaga adicionada com sucesso!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';

                                header('Location:'.SITE_URL.'Admin/jobs.php');
                    }
            }
        
    }

    public function updateJob()
    {
        require '../db/connect.php';

        
    }

    public function deleteJob($id)
    {
        require '../db/connect.php';

        $imageToUnlink = self::getImageToUnlink($id);

        $image = '../../public/img/jobs/'.$imageToUnlink[0][0];

            if (unlink($image)) {

                $sql = "DELETE FROM jobs WHERE id = :_id";

                $delete = $conn->prepare($sql);
                $delete->bindValue(':_id', $id);

                $success = $delete->execute();

                    if ($success) {
                        
                        $_SESSION['statusUpdate'] = 
                            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                Vaga removida com sucesso!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';

                        header('Location:'.SITE_URL.'Admin/jobs.php');
                    }

            } else {

                echo 'Não foi possível remover essa vaga no momento!';

            }
    }

    public function UpdateStatus(string $id, string $status)
    {
        require '../db/connect.php';

        $updateStatus = $conn->prepare("UPDATE jobs SET job_status = :newStatus WHERE id = :id");
        $updateStatus->bindValue(':newStatus', $status);
        $updateStatus->bindValue(':id', $id);
        $success = $updateStatus->execute();
        
        if ($success) {

            $_SESSION['statusUpdate'] = '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            Status alterado com sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            header('Location: '.SITE_URL.'Admin/jobs.php');
        } else {

            $_SESSION['statusUpdate'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Não foi possível alterar o status!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

            header('Location: '.SITE_URL.'Admin/jobs.php');
        }
    }

}