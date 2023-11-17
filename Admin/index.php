<?php
session_start();
require 'session.php';

include './includes/head.php';
?>

<body>
    <?php include './includes/navbar.php'?>


    <section class="main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <h1>Olá, Erika! Tudo certo?</h1>
                    <p>
                        Essa é uma plataforma que, por enquanto, você vai poder escrever
                        os posts do blog e alterar os banners do site. Conforme sua
                        preferência e demanda, nossa ideia é adicionar mais funcionaliidades.
                    </p>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>

    <section class="options-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="opt__card p-5">
                        <div class="opt__card__header text-center">
                            <i class='bx bx-image-add'></i>
                        </div>
                        <div class="opt__card__body text-center">
                            <h3>Banners</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="opt__card p-5">
                        <div class="opt__card__header text-center">
                            <i class='bx bx-edit-alt'></i>
                        </div>
                        <div class="opt__card__body text-center">
                            <h3>Blog</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include './includes/footer.php'?>
</body>

</html>