<?php
session_start();
require 'session.php';
require './src/classes/Candidate.php';
include './includes/head.php';

$class_jobs = new Candidate();

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
                <div class="col-md-6 text-center">
                    <form action="">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" style="background-color: #fff0;">
                                <option selected>Buscar por vagas</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-warning w-100 search-btn">Buscar</button>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

    </section>

    <?php include './includes/footer.php'?>
</body>

</html>