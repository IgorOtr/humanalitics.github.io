<!-- info section -->
<section class="info_section ">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="info_logo">
                    <a class="navbar-brand" href="index.html">
                        <span>
                            <img style="width: 230px;" src="http://localhost/Humanalitics/images/humanalitics/logoo.png" alt="" srcset="">
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