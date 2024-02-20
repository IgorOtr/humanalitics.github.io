<?php
include 'Admin/src/classes/Jobs.php';

$jobs_class = new Job();

$jobs = $jobs_class->getJobsToFront();

?>
<?php include 'includes/head.php'?>

<body>


    <?php include 'includes/navbar.php'?>


    <section class="difference_section layout_padding" id="difference">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Trabalhe Conosco
                </h2>
                <p>
                    A Humanalitics é uma consultoria na área de Gestão de Pessoas que visa atrelar dois conceitos atuais
                    e fundamentais para o desenvolvimento estratégico de qualquer empresa: Processos Assertivos +
                    Pessoas.
                    <br><br>
                    <span style="font-size: 20px; font-weight: 600;">Confira nossas oportunidades abaixo.</span>
                </p>
            </div>
        </div>
    </section>

    <section class="service_section layout_padding" id="services">
        <div class="container">
            <div class="heading_container heading_center mb-5">
                <h2>
                    Vagas disponíveis
                </h2>
                <p>
                    Aqui estão todas as vagas disponiveis!
                </p>
            </div>
            <div class="row">

                <?php foreach ($jobs as $key => $job) {
                
                $skills = explode(';', $job['job_skills']);
            
            ?>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight<?php echo $job['id']?>"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasRightLabel">Detalhes de:
                            <strong><?php echo $job['job_title']?></strong>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <div class="job_details">
                            <ul>
                                <li class="mb-4">
                                    <?php echo $job['job_subtitle']?>
                                </li>

                                <li class="mb-4" style="text-align: justify;">
                                    <?php echo $job['job_description']?>
                                </li>
                            </ul>

                            <div class="row" style="position: absolute; bottom: 12px; width: 95%;">
                                <div class="col">
                                    <button data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $job['id']?>"
                                        type="button" class="btn btn-warning w-100">Aplicar para vaga</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal<?php echo $job['id']?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Aplicar para:
                                    <?php echo $job['job_title']?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo SITE_URL.'Admin/src/controllers/CandidateController.php'?>"
                                    method="POST" enctype="multipart/form-data">

                                    <div class="personalData">
                                        <div class="file-input">
                                            <label for="exampleFormControlInput1" class="form-label"
                                                style="color: red; font-size: 14px;">Apenas arquivos em PDF</label>
                                            <input required type="file" name="candidate-file" id="file-input"
                                                class="file-input__input" />
                                            <label class="file-input__label" for="file-input">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="upload" class="svg-inline--fa fa-upload fa-w-16"
                                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path fill="currentColor"
                                                        d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                                                    </path>
                                                </svg>
                                                <span>Anexe seu currículo aqui</span></label>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nome
                                                Completo:</label>
                                            <input required type="text" name="candidate-name" class="form-control"
                                                id="exampleFormControlInput1" placeholder="Seu nome:">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Endereço de
                                                E-mail:</label>
                                            <input required type="email" name="candidate-email" class="form-control"
                                                id="exampleFormControlInput1" placeholder="Seu e-mail:">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Telefone para
                                                contato:</label>
                                            <input required type="text" name="candidate-phone" class="form-control"
                                                id="exampleFormControlInput1" placeholder="Seu Telefone:">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Data de
                                                Nascimento:</label>
                                            <input required type="date" name="candidate-date" class="form-control"
                                                id="exampleFormControlInput1" placeholder="Sua data de nascimento:">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Endereço:</label>
                                            <input required type="text" name="candidate-adress" class="form-control"
                                                id="exampleFormControlInput1" placeholder="Seu endereço:">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Cidade:</label>
                                            <input required type="text" name="candidate-city" class="form-control"
                                                id="exampleFormControlInput1" placeholder="Cidade onde mora:">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label">Escolaridade:</label>
                                            <select required name="candidate-school" class="form-select"
                                                aria-label="Default select example">
                                                <option selected>Selecionar</option>
                                                <option value="EF">Ensino Fundamental</option>
                                                <option value="EMI">Ensino Médio Incompleto</option>
                                                <option value="EMC">Ensino Médio Completo</option>
                                                <option value="ESI">Ensino Superior Incompleto</option>
                                                <option value="ESC">Ensino Superior Completo</option>
                                                <option value="CT">Curso Técnico</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Conte um pouco
                                                sobre
                                                você: </label>
                                            <textarea required name="candidate-resume" class="form-control"
                                                placeholder="Como você descreve sua personalidade?"
                                                id="floatingTextarea2" rows="6"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Por que você está
                                                procurando um novo emprego?</label>
                                            <textarea required name="candidate-ask" class="form-control"
                                                placeholder="Escreva aqui:" id="floatingTextarea2" rows="6"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Fale sobre seu
                                                histórico profissional:</label>
                                            <textarea required name="candidate-history" class="form-control"
                                                placeholder="Escreva aqui:" id="floatingTextarea2" rows="6"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Quais são as 3
                                                coisas
                                                mais importantes para você em um emprego?:</label>
                                            <textarea required name="candidate-list" class="form-control"
                                                placeholder="Escreva aqui:" id="floatingTextarea2" rows="6"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Preferência de
                                                vínculo:</label>
                                            <select required name="candidate-preference" class="form-select"
                                                aria-label="Default select example">
                                                <option selected>Selecionar</option>
                                                <option value="CLT">CLT</option>
                                                <option value="MEI">MEI</option>
                                                <option value="AMBOS">AMBOS</option>
                                                <option value="ESTÁGIO">ESTÁGIO</option>
                                            </select>
                                        </div>

                                        <input type="hidden" name="job-id" value="<?php echo $job['id']?>">
                                        <button type="submit" name="apply" class="btn w-100 mt-5 btn-warning">Enviar Dados</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card p-3">
                        <!-- Put Image Here -->
                        <div class="card-body">

                            <h5 class="card-title job-title"><?php echo $job['job_title']?></h5>

                            <div class="card-company-glassdoor">
                                <p class="card-company-name">
                                    <?php echo $job['job_subtitle']?>
                                </p>
                            </div>


                            <!-- Company Rating -->
                            <div class="card-job-details">

                                <?php for ($i = 0; $i < count($skills); $i++) {?>

                                <p class="card-role-type"
                                    style="font-size: 12px; padding: 3px; background-color: #ffc80087; border-radius: 3px; border: 1px solid #ffc800;">
                                    <?php echo $skills[$i]?>
                                </p>

                                <?php }?>

                            </div>

                            <div class="card-job-summary">
                                <p class="card-text"><?php echo substr($job['job_description'],0, 160).'...'?></p>
                            </div>

                            <button type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight<?php echo $job['id']?>" aria-controls="offcanvasRight"
                                target="_blank" class="btn btn-warning">Visualizar
                                vaga</button>
                        </div>
                    </div>
                </div>

                <?php }?>

            </div>
        </div>
    </section>


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
                        <a href="trabalhe-conosco.php" class="">
                            <i class='bx bx-briefcase'></i>
                            <span>
                                Trabalhe Conosco
                            </span>
                        </a>
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

    <script>
    const offcanvasElementList = document.querySelectorAll('.offcanvas')
    const offcanvasList = [...offcanvasElementList].map(offcanvasEl => new bootstrap.Offcanvas(offcanvasEl))
    </script>

    <script src="js/app.js"></script>

</body>

</html>