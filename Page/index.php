<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Humanalitics - Pages</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Rubik:wght@300;400;500;600;700;800;900&display=swap');

        body {
            height: 100vh;
            background-color: #1c1c1c;
            background: linear-gradient(to bottom, #232323 50%, #febe00);
        }

        .container {
            padding-top: 90px;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 800;
            font-family: Montserrat, sans-serif;
            color: #ffffff;
            margin: 0px;
        }

        .btn-success {
            background-color: #00d100;
            padding-left: 60px;
            padding-right: 60px;
            padding-bottom: 8px;
            padding-top: 8px;
        }

        .btn-success:hover {
            background-color: #00a700;
        }

        .btn-secondary {
            background-color: #737373;
            color: #ffffff;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 8px;
            padding-top: 8px;
            border: none;
            transition: .3s;
        }

        .btn-secondary:hover {
            transition: .3s;
            background-color: #2f2f2f;
            transform: scale(1.05);
        }

        .retangle {
            background-color: #febe00;
            position: absolute;
            left: 230px;
            width: 160px;
            height: 100vh;
        }

        .card {
            padding: 125px;
            box-shadow: 12px 12px 20px #0000009c;
        }

        .card h1 {
            color: #1c1c1c;
        }

        @media only screen and (max-width: 768px) {

            .retangle {
                display: none;
            }

            .card {
                padding: 80px;
            }
            
        }

    </style>
</head>

<body>

        <div class="retangle"></div>

        <div class="container">

            <div class="row mb-5">
                <div class="col-md-12 text-center mb-3">
                    <img src="../images/humanalitics/logoo.png" width="300" alt="">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-12 text-center">
                    <h3>ASSISTA O VÍDEO PARA MAIS INFORMAÇÕES</h3>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 text-center mb-3">
                </div>
                <div class="col-md-6 text-center mb-3">
                    <div class="card"><h1>VÍDEO AQUI</h1></div>
                </div>
                <div class="col-md-3 text-center mb-3">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 text-center mb-3">
                </div>
                <div class="col-md-4 text-center mb-3">
                    <a href="https://w.app/Humanalitics" target="_blank" class="btn btn-success"><h5>QUERO UM ORÇAMENTO</h5></a>
                </div>
                <div class="col-md-4 text-center mb-3">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 text-center mb-3">
                </div>
                <div class="col-md-4 text-center mb-3">
                    <a href="https://w.app/Humanalitics" target="_blank" class="btn btn-secondary"><h5>FALAR COM A EQUIPE</h5></a>
                </div>
                <div class="col-md-4 text-center mb-3">
                </div>
            </div>

        </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>