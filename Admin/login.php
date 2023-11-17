<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="public/css/style.css">
    <title>Humanalitics - Amin</title>
</head>

<body>

    <section style="height: 100vh; display: flex; justify-content: center; align-items: center;">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="../images/humanalitics/humanalitics-logo-1.png" alt="">
                </div>

                <div class="col-md-12 mt-4">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 text-center">
                            <p class="presentation_text" style="margin-bottom: 0px;">
                                Plataforma de Gerenciamento do conteúdo do site.
                            </p>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <form class="p-4" action="./src/controllers/UserController.php" method="post">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="form2Example1" name="user-email" class="form-control" />
                            <label class="form-label" for="form2Example1">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="form2Example2" name="user-password" class="form-control" />
                            <label class="form-label" for="form2Example2">Senha</label>
                        </div>


                        <!-- Submit button -->
                        <button type="submit" name="login-user" class="btn btn-primary btn-block mb-4">Entrar</button>

                    </form>

                </div>
                <div class="col-md-3"></div>

            </div>
        </div>
    </section>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>