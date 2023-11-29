<?php
session_start();
require 'session.php';

include './includes/head.php';
?>

<body>
    <?php include './includes/navbar.php'?>

    <section class="main-section">
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <h1>Gerenciamento do Blog</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>

    <?php include './includes/footer.php'?>
</body>

</html>