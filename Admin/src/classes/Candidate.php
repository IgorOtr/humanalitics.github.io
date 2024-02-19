<?php

class Candidate {

    public static function UploadFileToFolder($file)
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
                $newName = 'candidate_'.uniqid(time()) . '.' . $extensao;
    
                // Concatena a pasta com o nome
                $destino = '../../candidates/'.$newName;
        
                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
    
                    return [true, $newName];

                } else {

                    echo 'Erro ao salvar o arquivo. Aparentemente, você não tem permissão de escrita.<br />';

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