<?php
session_start();
require 'session.php';
require './src/classes/Candidate.php';
require 'src/classes/Jobs.php';


$class_candidate = new Candidate();
$class_jobs = new Job();

$jobs = $class_jobs->getJobsToAdmin();

if (isset($_POST['search'])) {

    $cadidates = $class_candidate->getCantidatesByJob($_POST['jobSelected']);
    $jobTitle = $class_jobs->getJobTitleBtId($_POST['jobSelected']) ;

    // var_dump($cadidates);
}



include './includes/head.php';

?>

<body>
    <?php include './includes/navbar.php'?>
    <?php

        if (@$_SESSION['statusUpdate']) {

            echo $_SESSION['statusUpdate'];
            unset($_SESSION['statusUpdate']);
        }
    ?>
    <section class="main-section mb-5">

        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <h1>Currículos Recebidos</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <select class="form-select" name="jobSelected" aria-label="Default select example"
                                        style="background-color: #fff0;">
                                        <option selected>Buscar por vagas</option>

                                        <?php foreach ($jobs as $key => $job) {?>

                                        <option value="<?php echo $job['id']?>"><?php echo $job['job_title']?></option>

                                        <?php }?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" name="search" class="btn btn-warning w-100">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <?php if (isset($_POST['search'])) {?>

        <div class="container" style="margin-top: 40px;">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4 style="color: #FEBE00;">Currículos para a vaga: "<?php echo $jobTitle[0]['job_title']?>"</h4>
                </div>
            </div>
        </div>

        <?php foreach ($cadidates as $key => $cadidate) {?>

        <div class="container" style="margin-top: 80px;">
            <div class="row">
                <div class="col-md-4">
                    <a href="<?php echo SITE_URL.'Admin/candidates/'.$cadidate['candidate_file']?>" target="_blank">
                        <div class="candidate-card">
                            <i class='bx bxs-file-pdf'></i>
                            <h6 style="color: #FEBE00;">Currículo de: <?php echo $cadidate['candidate_name']?></h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <?php }?>

        <?php }else{?>

        <div class="container" style="margin-top: 80px;">
            <div class="row">
                <div class="col-md-4">
                    <a href="">
                        <div class="candidate-card">
                            <i class='bx bxs-file-pdf'></i>
                            <h6 style="color: #FEBE00;">Currículo de: NOME DO FDP</h6>
                            <p style="font-size: 14px;">Vaga de interesse:</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <?php }?>

    </section>

    <?php include './includes/footer.php'?>
</body>

</html>