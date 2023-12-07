<?php
session_start();
require 'session.php';
require './src/classes/Banner.php';
include './includes/head.php';

$class_banners = new Banner();
$banners = $class_banners->GetAllBanners();
$action = isset($_GET['action']) ? $_GET['action'] : '';

// var_dump($banners);
// die();


?>

<body>
    <?php include './includes/navbar.php'?>
    <?php

        if (@$_SESSION['statusUpdate']) {

            echo $_SESSION['statusUpdate'];
        }
    ?>
    <section class="main-section mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <h1>Gerenciamento de Banner</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

            <?php if ($action == 'ed_ban') {
                
                $banenrs = $class_banners->GetBannerDataFromID($_GET['b_id']);

                // echo '<pre>';
                // var_dump($banenrs);
                // echo '</pre>';
                // die();

                foreach ($banenrs as $key => $banner) {
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
                            <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form class="row g-3" method="post"
                                        action="src/controllers/BannerController.php">
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Título <small>(opcional)</small></label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Adicione um Título ao Bannner:" name="banner_title" value="<?php echo $banner['banner_title']?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword4" class="form-label">Sub-título
                                                <small>(opcional)</small></label>
                                            <input type="text" class="form-control" id="inputPassword4"
                                                placeholder="Adicione um sub-título ao Bannner:" name="banner_sub_title" value="<?php echo $banner['banner_sub_title']?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="exampleFormControlTextarea1" class="form-label">Texto
                                                <small>(opcional)</small></label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Adicione um texto ao Bannner:" name="banner_text"><?php echo $banner['banner_text']?></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress2" class="form-label">Link <small>(opcional)</small></label>
                                            <input type="text" class="form-control" id="inputAddress2"
                                                placeholder="Adicione um link ao Bannner:" name="banner_link" value="<?php echo $banner['banner_link']?>">
                                        </div>
                                        <div class="col-12">
                                            <input type="hidden" name="banner_id" value="<?php echo $banner['id']?>">
                                            <button type="submit" name="edit_new_banner"
                                                class="btn btn-primary w-100">Alterar Dados</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } } else {?>

                <div class="container mt-5">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Adicionar Novo <i class='bx bx-plus'></i>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form class="row g-3" enctype="multipart/form-data" method="post"
                                        action="src/controllers/BannerController.php">
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Título <small>(opcional)</small></label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Adicione um Título ao Bannner:" name="banner_title">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword4" class="form-label">Sub-título
                                                <small>(opcional)</small></label>
                                            <input type="text" class="form-control" id="inputPassword4"
                                                placeholder="Adicione um sub-título ao Bannner:" name="banner_sub_title">
                                        </div>
                                        <div class="col-12">
                                            <label for="exampleFormControlTextarea1" class="form-label">Texto
                                                <small>(opcional)</small></label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Adicione um texto ao Bannner:" name="banner_text"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress2" class="form-label">Link <small>(opcional)</small></label>
                                            <input type="text" class="form-control" id="inputAddress2"
                                                placeholder="Adicione um link ao Bannner:" name="banner_link">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="formFile" class="form-label">Escolha a foto do Banner:</label>
                                            <input class="form-control" type="file" id="formFile" name="banner_file">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" name="add_new_banner"
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
                    <h1>Banners já Adicionados</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <?php foreach($banners as $key => $banner){
                
                $status = ($banner['banner_status'] == 'ativo') ? '<i style="font-size: 16px;" class="bx bx-block"></i>' : '<i style="font-size: 16px;" class="bx bx-check-circle"></i>';
                $tooltip = ($banner['banner_status'] == 'ativo') ? 'data-bs-toggle="tooltip" data-bs-placement="top" title="Bloquear"' : 'data-bs-toggle="tooltip" data-bs-placement="top" title="Desbloquear"';
                $link = ($banner['banner_status'] == 'ativo') ? 'http://localhost/Humanalitics/Admin/src/controllers/BannerController.php?action=ed_stts&b_id='.$banner['id'].'&set_stts=bloq' : 'http://localhost/Humanalitics/Admin/src/controllers/BannerController.php?action=ed_stts&b_id='.$banner['id'].'&set_stts=ativo';
                $link_del = 'http://localhost/Humanalitics/Admin/src/controllers/BannerController.php?action=del_ban&b_id='.$banner['id'];
                $link_ed = 'http://localhost/Humanalitics/Admin/banner.php?action=ed_ban&b_id='.$banner['id'];
            ?>

                <div class="col-md-6 mb-3">
                    <div class="card w-100" style="width: 18rem; height: 650px; overflow: hidden;">
                        <img src="./public/img/banners/<?php echo $banner['banner_image']?>" style="border-radius: 7px;"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $banner['banner_title']?> <span
                                    style="color:#febe00;"><?php echo $banner['banner_sub_title']?></span></h5>
                            <p class="card-text">
                                <?php echo strip_tags(substr($banner['banner_text'], 0, 180)).'...'?>
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?php echo $link_ed;?>" class="btn btn-primary">Editar</a>
                                    <a href="<?php echo $link_del;?>" class="btn btn-danger">Apagar</a>
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

    </section>

    <?php include './includes/footer.php'?>
</body>

</html>