<?php
session_start();
require 'session.php';
require './src/classes/Candidate.php';
require 'src/classes/Jobs.php';

$candidate_id = isset($_GET['candidateid']) ? $_GET['candidateid'] : '' ;
$class_candidate = new Candidate();

$candidate_data = $class_candidate->getCandidateById($candidate_id);
$school = $class_candidate->FormatSchool($candidate_data[0]['candidate_school']);

$dateFormat = explode('-', $candidate_data[0]['candidate_date']);
$dateFormat = $dateFormat[2].'/'.$dateFormat[1].'/'.$dateFormat[0];

// echo '<pre>';
// var_dump($candidate_data);
// echo '</pre>';

include './includes/head.php';

?>

<body>
    <?php include './includes/navbar.php'?>

    <section class="main-section mb-5">

        <div class="container mb-5">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <h1>Informações de: <?php echo $candidate_data[0]['candidate_name']?></h1>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="row">
                <div class="col-4 mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nome Completo:</label>
                        <input value="<?php echo $candidate_data[0]['candidate_name']?>" type="text" class="form-control" id="exampleFormControlInput1" readonly>
                    </div>
                </div>
                <div class="col-4 mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Endereço de Email:</label>
                        <input value="<?php echo $candidate_data[0]['candidate_email']?>" type="text" class="form-control" id="exampleFormControlInput1" readonly>
                    </div>
                </div>
                <div class="col-2 mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Telefone:</label>
                        <input value="<?php echo $candidate_data[0]['candidate_phone']?>" type="text" class="form-control" id="exampleFormControlInput1" readonly>
                    </div>
                </div>
                <div class="col-2 mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Preferência de vínculo:</label>
                        <input value="<?php echo $candidate_data[0]['candidate_preference']?>" type="text" class="form-control" id="exampleFormControlInput1" readonly>
                    </div>
                </div>
                <div class="col-2 mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Data de Nascimento:</label>
                        <input value="<?php echo $dateFormat?>" type="text" class="form-control" id="exampleFormControlInput1" readonly>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Endereço:</label>
                        <input value="<?php echo $candidate_data[0]['candidate_adress']?>" type="text" class="form-control" id="exampleFormControlInput1" readonly>
                    </div>
                </div>
                <div class="col-2 mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cidade:</label>
                        <input value="<?php echo $candidate_data[0]['candidate_city']?>" type="text" class="form-control" id="exampleFormControlInput1" readonly>
                    </div>
                </div>
                <div class="col-2 mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Escolaridade:</label>
                        <input value="<?php echo $school?>" type="text" class="form-control" id="exampleFormControlInput1" readonly>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Conte um pouco sobre você:</label>
                        <textarea class="form-control" id="exampleFormControlInput1" rows="5" readonly><?php echo $candidate_data[0]['candidate_resume']?></textarea>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Por que você está procurando um novo emprego?</label>
                        <textarea class="form-control" id="exampleFormControlInput1" rows="5" readonly><?php echo $candidate_data[0]['candidate_ask']?></textarea>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Fale sobre seu histórico profissional:</label>
                        <textarea class="form-control" id="exampleFormControlInput1" rows="5" readonly><?php echo $candidate_data[0]['candidate_history']?></textarea>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Quais são as 3 coisas mais importantes para você em um emprego?:</label>
                        <textarea class="form-control" id="exampleFormControlInput1" rows="5" readonly><?php echo $candidate_data[0]['candidate_list']?></textarea>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="mb-3">
                        <a href="<?php echo SITE_URL.'Admin/candidates/'.$candidate_data[0]['candidate_file']?>" target="_blank" class="btn w-100 btn-trasparent">Ver Arquivo em PDF</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php include './includes/footer.php'?>
</body>

</html>