<?php
session_start();
require 'session.php';
require './src/classes/Jobs.php';
include './includes/head.php';

$class_jobs = new Job();
$jobs = $class_jobs->getAllJobs();
$action = isset($_GET['action']) ? $_GET['action'] : '';
$job_id = isset($_GET['job_id']) ? $_GET['job_id'] : '';

$dataToEdit = $class_jobs->getJobToEdit($job_id);

// var_dump($jobs);
// die();

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
                    <h1>Gerenciamento de Vagas</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <?php if ($action === 'ed_job') {
            
            foreach ($dataToEdit as $jobToEdit) {


                $limit_date = $jobToEdit['job_limit_date'];
                $limit_date = explode('/',$limit_date);
                $limit_date = $limit_date[2].'-'.$limit_date[1].'-'.$limit_date[0];
            }
        ?>

        <div class="container mt-5">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Adicionar Novo <i class='bx bx-plus'></i>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse show"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <form class="row g-3" method="post" action="src/controllers/JobController.php">
                                <div class="col-md-6">
                                    <label for="inputEmail4" style="color: #000000;" class="form-label">Título
                                        <small>(obrigatório)</small></label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Adicione um Título ao Bannner:" name="job_title"
                                        value="<?php echo $jobToEdit['job_title']?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" style="color: #000000;" class="form-label">Sub-título
                                        <small>(opcional)</small></label>
                                    <input type="text" class="form-control" id="inputPassword4"
                                        placeholder="Adicione um sub-título ao Bannner:" name="job_subtitle"
                                        value="<?php echo $jobToEdit['job_subtitle']?>">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPassword4" style="color: #000000;" class="form-label">Data de
                                        encerramento: </label>
                                    <input type="date" class="form-control" id="inputPassword4" name="limit_date"
                                        value="<?php echo $limit_date?>">
                                </div>
                                <div class="col-12">
                                    <label for="exampleFormControlTextarea1" style="color: #000000;"
                                        class="form-label">Descrição
                                        <small>(obrigatório)</small></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="12"
                                        placeholder="Adicione um texto ao Bannner:"
                                        name="job_description"><?php echo $jobToEdit['job_description']?></textarea>
                                </div>
                                <div class="col-12">
                                    <input type="hidden" name="job_id" value="<?php echo $jobToEdit['id']?>">
                                    <button type="submit" name="edit_new_banner" class="btn btn-primary w-100">Alterar
                                        Dados</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php }else{?>

        <div class="container mt-5">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Adicionar Nova <i class='bx bx-plus'></i>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <form class="row g-3" enctype="multipart/form-data" method="post"
                                action="src/controllers/JobController.php">
                                <div class="col-md-6">
                                    <label for="inputEmail4" style="color: #000000;" class="form-label">Título
                                        <small>(obrigatório)</small></label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Adicione um Título á Vaga:" name="job_title">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label" style="color: #000000;">Sub-título
                                        <small>(opcional)</small></label>
                                    <input type="text" class="form-control" id="inputPassword4"
                                        placeholder="Adicione um sub-título á Vaga:" name="job_sub_title">
                                </div>
                                <div class="col-12">
                                    <label for="exampleFormControlTextarea1" style="color: #000000;"
                                        class="form-label">Descrição da vaga
                                        <small>(obrigatório)</small></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Adicione um texto á Vaga:" name="job_description"></textarea>
                                </div>

                                <div class="col-12">
                                    <label for="inputEmail4" style="color: #000000;" class="form-label">Competências para esta vaga <small>(Separe por " ; ")</small></label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Ex.: Excel Avançado;Experiêcia em Gestão de Pessoas" name="job_skills">
                                        <span style="color: red; font-size: 14px;">Máximo de 4 competências</span>
                                </div>

                                <div class="col-md-6">
                                    <label for="formFile" class="form-label" style="color: #000000;">Escolha uma Imagem
                                        para esta vaga: <small>(obrigatório)</small></label>
                                    <input class="form-control" type="file" id="formFile" name="job_image">
                                </div>
                                <div class="col-md-6">
                                    <label for="formFile" class="form-label" style="color: #000000;">Data de
                                        encerramento:<small>(obrigatório)</small></label>
                                    <input class="form-control" type="date" min="<?php echo date('Y-m-d')?>"
                                        name="limit_date">
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="add_new_job"
                                        class="btn btn-primary w-100">Adicionar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php }?>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <h1>Vagas Adicionadas</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <?php foreach($jobs as $key => $job){
                
                $status = ($job['job_status'] == 'ativo') ? '<i style="font-size: 16px;" class="bx bx-block"></i>' : '<i style="font-size: 16px;" class="bx bx-check-circle"></i>';
                $tooltip = ($job['job_status'] == 'ativo') ? 'data-bs-toggle="tooltip" data-bs-placement="top" title="Bloquear"' : 'data-bs-toggle="tooltip" data-bs-placement="top" title="Desbloquear"';
                $link = ($job['job_status'] == 'ativo') ? 'http://localhost/Humanalitics/Admin/src/controllers/JobController.php?action=ed_stts&job_id='.$job['id'].'&set_stts=bloq' : 'http://localhost/Humanalitics/Admin/src/controllers/JobController.php?action=ed_stts&job_id='.$job['id'].'&set_stts=ativo';
                $link_del = 'http://localhost/Humanalitics/Admin/src/controllers/JobController.php?action=del_job&job_id='.$job['id'];
                $link_ed = 'http://localhost/Humanalitics/Admin/jobs.php?action=ed_job&job_id='.$job['id'];
            ?>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $job['id']?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Verifique esta ação:</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Deseja remover esta vaga?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <a href="<?php echo $link_del;?>" class="btn btn-danger">Remover</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card w-100" style="">
                        <div class="card_image"
                            style="background-image: url(public/img/jobs/<?php echo $job['job_image']?>); background-size: cover; background-repeat: no-repeat; padding: 205px; border-radius: 6px;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $job['job_title']?> <br>
                                <span style="color:#febe00; font-size: 14px;"><?php echo $job['job_subtitle']?></span>
                            </h5>
                            <p class="card-text">
                                <?php echo 'Encerramento: '.$job['job_limit_date']?>
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?php echo $link_ed;?>" class="btn btn-primary"><i style="font-size: 16px;"
                                            class='bx bx-edit'></i></a>
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal<?php echo $job['id']?>" class="btn btn-danger"><i
                                            style="font-size: 16px;" class='bx bx-trash'></i></button>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="<?php echo $link;?>" class="btn btn-primary"
                                        <?php echo $tooltip;?>><?php echo $status;?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php }?>

            </div>
        </div>

        <?php if (count($jobs) < 1) {?>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <h3 style="color: #ffffff; font-weight: 300;">Ainda não existem vagas adicionadas =(</h3>
                </div>
            </div>
        </div>
        <?php }?>

    </section>

    <?php include './includes/footer.php'?>
</body>

</html>