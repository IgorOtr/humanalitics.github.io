<?php

class Candidate {

    public function FormatSchool($shool)
    {
        switch ($shool) {
            case 'EF':
                return 'Ensino Fundamental';
                break;
                
            case 'EMI':
                return 'Ensino Médio Incompleto';
                break;

            case 'EMC':
                return 'Ensino Médio Completo';
                break;

            case 'ESI':
                return 'Ensino Superior Imcompleto';
                break;

            case 'ESC':
                return 'Ensino Superior Completo';
                break;

            case 'CT':
                return 'Curso Técnico';
                break;
            
            default:
                # code...
                break;
        }
    }

    public function getCandidateById($id)
    {
        require 'src/db/connect.php';

        $sql = "SELECT * FROM candidates WHERE id = :_id";

        $select = $conn->prepare($sql);
        $select->bindValue(':_id', $id);

            if ($select->execute()) {

                $data = $select->fetchAll();
                return $data;
            }
    }

    public function getAllCandidates()
    {
        require 'src/db/connect.php';

        $sql = "SELECT * FROM candidates";
        $select = $conn->prepare($sql);

        $success = $select->execute();

            if ($success) {

                $data = $select->fetchAll();
                return $data;
            }
    }

    public function getCantidatesByJob($id)
    {
        require 'src/db/connect.php';

        $sql = "SELECT * FROM candidates WHERE job_id = :_id";
        $select = $conn->prepare($sql);
        $select->bindValue(':_id', $id);

        $success = $select->execute();

            if ($success) {

                $data = $select->fetchAll();
                return $data;
            }
    }

    public static function UploadFileToFolder($file, $nome)
    {
        if (!empty($file)) {
    
            $arquivo_tmp = $file['tmp_name'];
    
            // Pega a extensão do arquivo de imagem
            $extensao = pathinfo ($file['name'], PATHINFO_EXTENSION);
        
            // Converte a extensão para minúsculo
            $extensao = strtolower($extensao);
        
            // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfileiro as extensões permitidas e separo por ';'
            // Isso serve apenas para eu poder pesquisar dentro desta String
            if ( strstr ('.pdf', $extensao)) {
    
                // Cria um nome único para esta imagem
                // Evita que duplique as imagens no servidor.
                // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                $newName = 'curriculo de ' . $nome . '.' . $extensao;
    
                // Concatena a pasta com o nome
                $destino = '../../candidates/'.$newName;
        
                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
    
                    return [true, $newName];

                } else {

                    echo 'Erro ao salvar o arquivo. Aparentemente, você não tem permissão de escrita.</br>';

                    return false;
                }

            } else {

                echo 'Você poderá enviar apenas arquivos ".pdf"';

                return false;
            } 

        } else {

            echo 'Você não enviou nenhum arquivo!';

            return false;
        }
    }

    public function AddCandidate($name, $email, $phone, $date, $adress, $city, $school, $resume, $ask, $history, $list, $preference, $job_id, $file)
    {

            require '../db/connect.php';

            $sql = "INSERT INTO candidates 
            (candidate_name, 
            candidate_email, 
            candidate_phone, 
            candidate_date,
            candidate_adress,
            candidate_city,
            candidate_school,
            candidate_resume,
            candidate_ask,
            candidate_history,
            candidate_list,
            candidate_preference,
            job_id,
            candidate_file) 
            VALUES 
            (:_name,
            :_email,
            :_phone,
            :_date,
            :_adress,
            :_city,
            :_school,
            :_resume,
            :_ask,
            :_history,
            :_list,
            :_preference,
            :_job_id,
            :_file)";

            $add = $conn->prepare($sql);
            $add->bindValue(':_name', $name);
            $add->bindValue(':_email',$email);
            $add->bindValue(':_phone',$phone);
            $add->bindValue(':_date',$date);
            $add->bindValue(':_adress',$adress);
            $add->bindValue(':_city',$city);
            $add->bindValue(':_school',$school);
            $add->bindValue(':_resume',$resume);
            $add->bindValue(':_ask',$ask);
            $add->bindValue(':_history',$history);
            $add->bindValue(':_list',$list);
            $add->bindValue(':_preference',$preference);
            $add->bindValue(':_job_id',$job_id);
            $add->bindValue(':_file',$file);

            $success = $add->execute();

                if ($success) {

                    header('Location: '.SITE_URL.'trabalhe-conosco.php');
                }
    }
}