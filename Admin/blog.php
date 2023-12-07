<?php
@session_start();
require 'session.php';
require './src/classes/Blog.php';
include './includes/head.php';

$class_banners = new Blog();
$action = isset($_GET['action']) ? $_GET['action'] : '';

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
                    <h1>Gerenciamento de Posts</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Adicionar Novo <i class='bx bx-plus'></i>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">

                            <form action="src/controllers/BlogController.php" method="post"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label style="color: #000000;" for="exampleFormControlInput1"
                                                class="form-label">Título:</label>
                                            <input type="text" name="post_title" class="form-control"
                                                id="exampleFormControlInput1" placeholder="Título do Post" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label style="color: #000000;" for="formFile" class="form-label">Imagem de
                                                Capa:</label>
                                            <input class="form-control" name="post_image" type="file" id="formFile"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <textarea name="post_content" id="summernote" cols="30" rows="20"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100" name="new_post"
                                                type="submit">Adicionar Post</button>
                                        </div>
                                    </div>
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
                    <h1>Posts já Adicionados</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <!-- <div class="container">
            <div class="row">

                <div class="col-md-6 mb-3">
                    <div class="card w-100" style="width: 18rem; height: 650px; overflow: hidden;">
                        <img src="" style="border-radius: 7px;" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><span style="color:#febe00;"></span></h5>
                            <p class="card-text"></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="" class="btn btn-primary">Editar</a>
                                    <a href="" class="btn btn-danger">Apagar</a>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="" class="btn btn-primary"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> -->

    </section>

    <?php include './includes/footer.php'?>
</body>

</html>