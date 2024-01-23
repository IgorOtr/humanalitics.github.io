<?php
include 'Admin/src/classes/Banner.php';
include 'Admin/src/classes/Blog.php';

$blog_class = new Blog();
$banner_class = new Banner();

$banners = $banner_class->GetAllBannersToFront();
$posts = $blog_class->GetAllPostsToFront();

$page = 'index';

?>
    <?php include 'includes/head.php'?>
<body>
    <div class="hero_area">
        
    <?php include 'includes/navbar.php'?>
        <!-- end header section -->
        <!-- slider section -->
        <section class=" slider_section ">

            <div class="owl-carousel owl-theme owl-loaded owl-drag" style="height: 100vh;">

                <div class="owl-stage-outer" style="height: 100%;">
                    <div class="owl-stage"
                        style="height: 100%; transform: translate3d(-792px, 0px, 0px); transition: all 0.25s ease 0s; width: 2376px;">

                        <?php foreach ($banners as $key => $banner) {?>

                        <div class="owl-item "
                            style="height: 100%; width: 178px; margin-right: 20px; background-size: cover; background-repeat: no-repeat; background-image: url(Admin/public/img/banners/<?php echo $banner['banner_image']?>);">

                            <div class="banner__black d-flex align-items-center">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="detail-box">
                                                <h1>
                                                    <?php echo $banner['banner_title']?><br>
                                                    <span>
                                                        <?php echo $banner['banner_sub_title']?>
                                                    </span>
                                                </h1>
                                                <p>
                                                    <?php echo $banner['banner_text']?>
                                                </p>
                                                <div class="btn-box">
                                                    <a href="<?php echo $banner['banner_link']?>" target="_blank"
                                                        class="btn-2">Saiba Mais</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <?php }?>

                    </div>
                </div>
            </div>

        </section>
        <!-- end slider section -->
    </div>

    <!-- about section -->

    <section class="about_section layout_padding" id="sobre">
        <div class="container">
            <div class="row">
                <div class="col-md-6 px-0">
                    <div class="img_container">
                        <div class="img-box">
                            <img src="images/humanalitics/colegas-sorridentes-de-tiro-medio-com-smartphone.jpg"
                                alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="detail-box">
                        <div class="heading_container ">
                            <h2>
                                Quem Somos?
                            </h2>
                        </div>
                        <p>
                            A Humanalitics é uma consultoria na área de Gestão de Pessoas que visa atrelar dois
                            conceitos atuais e fundamentais para o desenvolvimento estratégico de qualquer empresa:
                            Processos Assertivos + Pessoas.
                            <br>
                            <br>
                            A Gestão de Pessoas só se torna funcional quando alinhada a estratégia da empresa e quando
                            contribui ativamente para o desenvolvimento do negócio.
                        </p>
                        <div class="btn-box">
                            <a href="">
                                Saiba Mais
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 px-0">
                    <div class="detail-box">
                        <div class="heading_container ">
                            <h2>
                                Nosso Propósito
                            </h2>
                        </div>
                        <p>
                            Somos movidos pelo propósito de ajudar empresas a
                            redefinir seu sucesso, oferecendo serviços de recursos
                            humanos personalizados, ancorados em nossa paixão pelo
                            cliente, respeito pelas pessoas e busca constante por
                            organização e resultados.
                        </p>
                        <div class="btn-box">
                            <a href="">
                                Saiba Mais
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="img_container">
                        <div class="img-box">
                            <img src="images/humanalitics/pessoas-negocio-apertar-mao-junto.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- service section -->

    <section class="difference_section layout_padding" id="difference">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Diferenciais
                </h2>
                <p>
                    Oferecemos ferramentas práticas e personalizadas, além de assumir a responsabilidade pela
                    implementação e monitoramento de indicadores, garantindo resultados tangíveis
                </p>
            </div>
        </div>
    </section>

    <section class="service_section layout_padding" id="services">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Serviços
                </h2>
                <p>
                    Nosso Combo de Base do RH é a pedra fundamental para construir uma estrutura sólida de recursos
                    humanos
                    em sua empresa. É o primeiro passo rumo a uma gestão de RH eficiente e orientada para resultados.
                </p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="box p-5">
                        <div class="img-box">
                            <i class='bx bx-signal-5'></i>
                        </div>
                        <div class="detail-box">
                            <h6>
                                AUMENTO NA ATRAÇÃO E RETENÇÃO DE TALENTOS
                            </h6>
                            <p class="text-center">
                                REDUÇÃO DO TURNOVER EM ATÉ 75%
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box p-5">
                        <div class="img-box">
                            <i class='bx bx-signal-5'></i>
                        </div>
                        <div class="detail-box">
                            <h6>
                                AUMENTO DA PRODUTIVIDADE E REDUÇÃO DE CUSTOS
                            </h6>
                            <p class="text-center">
                                AUMENTO DA RECEITA X COLABORADOR EM ATÉ 10%
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box p-5">
                        <div class="img-box">
                            <i class='bx bx-file'></i>
                        </div>
                        <div class="detail-box">
                            <h6>
                                CUMPRIMENTO DE NORMAS LEGAIS E REGULAMENTAÇÕES
                            </h6>
                            <p class="text-center">
                                MINIMIZAÇÃO DO PASSIVO TRABALHISTA EM 95%
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end service section -->


    <!-- client section -->

    <section class="team_section layout_padding" id="blog">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Blog
                </h2>
                <p>
                    Confira os nossos principais conteúdos sobre o mundo do RH
                </p>
            </div>
            <div class="row mt-3">

                <?php foreach ($posts as $key => $post) {?>

                    <div class="col-md-4 col-sm-6 mx-auto ">
                        <a href="<?php echo SITE_URL.'Blog/post.php?id='.$post['id']?>" class="blog_link">
                            <div class="card card__blog">
                                <img src="Admin/public/img/post/<?php echo $post['post_image']?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $post['post_title']?></h5>
                                    <p class="created_at">Publicado em: <?php echo $post['created_at']?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php }?>



            </div>
            <div class="btn-box">
                <a href="<?php echo SITE_URL.'Blog/'?>">
                    Ver Todos
                </a>
            </div>
        </div>
    </section>

    <!-- end client section -->

    <!-- contact section -->

    <section class="contact_section layout_padding" id="contato">
        <div class="contact_bg_box">
            <div class="img-box">
                <img src="images/humanalitics/mulher-jovem-e-bonita-no-escritorio-em-casa-trabalhando-em-casa-conceito-de-teletrabalho.jpg"
                    alt="">
            </div>
        </div>
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Entre em Contato
                </h2>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-md-7 mx-auto">
                        <form action="#">
                            <div class="contact_form-container">
                                <div>
                                    <div>
                                        <input type="text" placeholder="Nome Completo:" />
                                    </div>
                                    <div>
                                        <input type="email" placeholder="Email " />
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Telefone:" />
                                    </div>
                                    <div class="">
                                        <input type="text" placeholder="Mensagem:" class="message_input" />
                                    </div>
                                    <div class="btn-box ">
                                        <button class="w-100" type="submit">
                                            Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- info section -->
    <section class="info_section ">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="info_logo">
                        <a class="navbar-brand" href="index.html">
                            <span>
                                <img style="width: 230px;" src="images/humanalitics/logoo.png" alt="" srcset="">
                            </span>
                        </a>
                        <p>
                            Empresa especializada na estruturação do RH do zero.
                        </p>
                    </div>
                    <div class="info_form ">
                        <div class="social_box">
                            <a href="">
                                <i style="font-size: 32px;" class='bx bxl-whatsapp'></i>
                            </a>
                            <a href="">
                                <i style="font-size: 32px;" class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i style="font-size: 32px;" class='bx bxl-linkedin-square'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info_info">
                        <h5>
                            Entre em Contato
                        </h5>
                    </div>
                    <div class="info_contact">
                        <a href="" class="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                +55 24 99995-1022
                            </span>
                        </a>
                        <a href="" class="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                contato@humanalitics.com.br
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end info_section -->




    <!-- footer section -->
    <footer class="container-fluid footer_section">
        <p>
            &copy; <span id="currentYear"></span> All Rights Reserved. Developed By Intentoo
        </p>
    </footer>
    <!-- footer section -->
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="js/app.js"></script>
    <script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            autoplay: true,
            autoplaySpeed: 2500,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true
                }
            }
        });
    });
    </script>

</body>

</html>