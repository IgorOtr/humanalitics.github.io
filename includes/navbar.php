<header class="header_section">
    <div class="header_bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <div class="row">
                    <div class="col-md-6">
                        <a class="navbar-brand2" href="index.html">
                            <img style="width: 250px;" src="<?php echo SITE_URL.'images/humanalitics/logoo.png'?>" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""></span>
                        </button>
                    </div>

                    <div class="col-md-6 d-flex align-items-center">
                        <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                            <ul class="navbar-nav  ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $sobre = (@$page == 'index') ? '#sobre' : SITE_URL.'#sobre'?>"> Sobre</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $difference = (@$page == 'index') ? '#difference' : SITE_URL.'#difference'?>"> Diferenciais </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $servico = (@$page == 'index') ? '#services' : SITE_URL.'#services'?>"> Serviços </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $blog = (@$page == 'index') ? '#blog' : SITE_URL.'#blog'?>">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $contato = (@$page == 'index') ? '#contato' : SITE_URL.'#contato'?>">Contato</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>