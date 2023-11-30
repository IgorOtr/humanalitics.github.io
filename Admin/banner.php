<?php
session_start();
require 'session.php';

include './includes/head.php';
?>

<body>
    <?php include './includes/navbar.php'?>

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
                            <form class="row g-3" enctype="multipart/form-data" method="post" action="src/controllers/BannerController.php">
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
                                    <button type="submit" name="add_new_banner" class="btn btn-primary w-100">Adicionar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                <div class="col-md-6 mb-3">
                    <div class="card w-100" style="width: 18rem;">
                        <img src="../images/humanalitics/mulher-jovem-e-bonita-no-escritorio-em-casa-trabalhando-em-casa-conceito-de-teletrabalho.jpg" style="border-radius: 7px;" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger">Apagar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card w-100" style="width: 18rem;">
                        <img src="../images/humanalitics/colegas-sorridentes-de-tiro-medio-com-smartphone.jpg" style="border-radius: 7px;" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger">Apagar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php include './includes/footer.php'?>
</body>

</html>