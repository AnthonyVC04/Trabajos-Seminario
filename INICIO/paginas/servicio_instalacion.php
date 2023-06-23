<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Aos CSS(animate scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../css/style-service.css">
    <link rel="stylesheet" href="../css/style-footer.css">

    <link rel="icon" type="image/jpg" href="../img/img-header/icon electric.png">
    <title>Servel Electric & Ingenieria Eirl</title>
</head>

<body>
    <!-- HEADER -->
<!-- BARRA DE NAVEGACIÓN TOP -->
<nav class="navbar-blue">
    <div class="navbar-blue-container">
        <!-- FORMAS TOP -->
        <div class="orange-forms-top">
            <div class="orange-forms-top-left">
                <div class="rectangule-top-left">

                </div>
                <div class="rectangule-top-left">

                </div>
                <div class="rectangule-top-left">

                </div>
            </div>
            <!-- FORMAS TOP -->
            <div class="orange-forms-top-right">
                <div class="rectangule-top-right">

                </div>
                <div class="rectangule-top-right">

                </div>
                <div class="rectangule-top-right">

                </div>
            </div>
        </div>

        <div class="navbar-info" id="navbarNav">
            <ul class="navbar-info-nav">
                <li class=" info-item-left">
                    <a class="info-link" href="#">
                        <span class="phone"><img class="info-logo-nav-link" src="../img/img-header/icon_telefono.png" alt=""> +51 923
                            907
                            418</span>
                    </a>
                </li>
                <li class="info-item-right">
                    <a class="info-link" href="#">
                        <img class="info-logo-nav-link" src="../img/img-header/icon_correo.webp" alt="">
                        planeamiento.operaciones@servelectric.com
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--DIV REDES SOCIALES -->
<div class="redes">

    <!--DIV FIGURA REDES SOCIALES -->
    <div class="redes-figura">
        <!--ICONOS REDES SOCIALES-->
        <div class="contenedor-figura">
            <a href="" class="social-media-icons"><img class="red-logo1" src="../img/img-header/icon_facebook.png" alt=""></a>
            <a href="" class="social-media-icons"><img class="red-logo2" src="../img/img-header/icon_instagram.png" alt=""></a>
            <a href="" class="social-media-icons"><img class="red-logo3" src="../img/img-header/icon_twitter.png" alt=""></a>
        </div>
    </div>
</div>

<!--BANNER LOGO-->
<div class="logo-header">
    <img src="../img/img-header/logo-servel-electric.png" alt="">
</div>

<!--NAV BAR-->
<div>
    <div class="puente-nav1"></div>
    <div class="container-trapecio-barra-nav">
        <nav class="trapecio-barra-nav">

            <li><a href="../index.php">INICIO</a></li>
            <li><a href="../paginas/nosotros.php">SOBRE NOSOTROS</a></li>
            <li>
                <a href="#">SERVICIOS</a>
                <ul class="tr-sub-menu">
                    <li><a class="tr-sub-menu-a" href="../paginas/servicio_mantenimiento.php">Mantenimiento</a></li>
                    <li><a class="tr-sub-menu-a" href="../paginas/servicio_instalacion.php">Instalaciones</a></li>
                </ul>
            </li>
            <li><a href="../../iniciar.php">LOGIN</a></li>
            </ul>
        </nav>
    </div>

    <div class="puente-nav2"></div>
</div>





<!-- carrusel -->
<div class="carousel-header">
    <div class="carousel-header-list">
        <div class="carousel-header-item">
            <img src="../img/img-servicio/banner servicios instalacion.png" alt="Imagen 1">
        </div>
    </div>
</div>


<script>
    const carousel = document.querySelector('.carousel-header');
    const carouselList = carousel.querySelector('.carousel-header-list');
    const carouselItems = carousel.querySelectorAll('.carousel-header-item');
    const images = carousel.querySelectorAll('img');
    const contactButton = document.querySelector('.btncontactenos');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentIndex = 0;


    function showImage(index) {
        images.forEach((image, i) => {
            if (i === index) {
                image.style.display = 'block';
                if (i === 0) {
                    contactButton.style.display = 'block';
                    document.querySelector('.figura2').style.display = 'block';
                    document.querySelector('.figura3').style.display = 'block';
                } else {
                    contactButton.style.display = 'none';
                    document.querySelector('.figura2').style.display = 'none';
                    document.querySelector('.figura3').style.display = 'none';
                }
            } else {
                image.style.display = 'none';
            }
        });
    }

    function goToPrevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex);
    }

    function goToNextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    }

    prevBtn.addEventListener('click', goToPrevImage);
    nextBtn.addEventListener('click', goToNextImage);

    // Opcional: Desplazamiento automático cada 8 segundos
    setInterval(goToNextImage, 200000);
</script>

    <!-- SERVICIOS CORRECTIVOS -->
    <div class="contenedor-service">

        <!-- card-1 -->

        <div class="poligono" data-aos="zoom-in-left" data-aos-duration="1100">
            <img class="pictureimg" src="../img/img-servicio/imagen1.jpg" alt="">

            <div class="squad">

                <h2>INSTALACIÓN Y MANTENIMIENTO
                    DE POZOS A TIERRA CON
                    CERTIFICADO 100%
                    GARANTIZADO PRE – POST</h2>


            </div>
            <div class="polig-little">
                <img src="../img/img-inicio/icon-pozo-tierra.png" alt="">
            </div>

            <div class="penta">

                <div class="penta2">



                </div>

            </div>

        </div>

        <!-- card-2 -->


        <div data-aos="zoom-in-left" data-aos-duration="1100">


            <div class="poligono reverse">
                <img class="pictureimg" src="../img/img-inicio/tableros-electrico.jpg" alt="">
                <div class="squad">

                    <h2 class="text-reverse">TABLEROS ELÉCTRICOS EN GENERAL CERTIFICADOS, CABLEADO INTEGRAL,
                        ROTULACIÓN, ENTRE OTROS</h2>



                </div>
                <div class="polig-little">
                    <img src="../img/img-inicio/icon-tablero-electrico.png" alt="">
                </div>
                <div class="penta">

                    <div class="penta2">


                    </div>

                </div>

            </div>

        </div>



        <!-- card-4 -->

        <div data-aos="zoom-in-left" data-aos-duration="1100">
            <div class="poligono ">
                <img class="pictureimg" src="../img/img-servicio/cisternas.jpg" alt="">
                <div class="squad">

                    <h2>TANQUES CISTERNA DE ALTA Y BAJA</h2>



                </div>
                <div class="polig-little">
                    <img src="../img/img-inicio/icon-cisterna.png" alt="">
                </div>
                <div class="penta">
                    <div class="penta2">


                    </div>

                </div>

            </div>

        </div>
        <!-- card-5 -->


        <div data-aos="zoom-in-right" data-aos-duration="1100">
            <div class="poligono reverse">
                <img class="pictureimg" src="../img/img-servicio/iluminacion.jpg" alt="">
                <div class="squad">

                    <h2 class="text-reverse">SISTEMA DE ILUMINACIÓN INTERIOR Y EXTERIOR DE PLANTAS INDUSTRIALES</h2>



                </div>
                <div class="polig-little">
                    <img src="../img/img-inicio/icon-luminaria.png" alt="">
                </div>
                <div class="penta">
                    <div class="penta2">


                    </div>

                </div>
            </div>

        </div>

        <!-- card-6 -->


        <div data-aos="zoom-in-left" data-aos-duration="1100">
            <div class="poligono ">
                <img class="pictureimg" src="../img/img-servicio/sensores.jpg" alt="">
                <div class="squad">

                    <h2>SENSORES DE HUMO, MOVIMIENTO Y VIBRACIÓN</h2>



                </div>
                <div class="polig-little">
                    <img src="../img/img-inicio/icon-sensor.png" alt="">
                </div>
                <div class="penta">
                    <div class="penta2">


                    </div>

                </div>

            </div>
        </div>

        <!-- card-7 -->


        <div data-aos="zoom-in-right" data-aos-duration="1100">
            <div class="poligono reverse">
                <img class="pictureimg" src="../img/img-servicio/automatizacion.jpg" alt="">
                <div class="squad">

                    <h2 class="text-reverse">AUTOMATIZACION INDUSTRIAL ELECTRICA PARA EL CONTROL DE MAQUINAS DE
                        PRODUCCIÓN</h2>



                </div>
                <div class="polig-little">
                    <img src="../img/img-inicio/icon-automat.png" alt="">
                </div>
                <div class="penta">
                    <div class="penta2">


                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- Aos CSS(animate scroll) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!--animation inicio-->
    <script>
        AOS.init();
    </script>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer__group-1">
            <div class="footer__group-1-1">
                <div class="footer__box">
                    <figure>
                        <a href="#">
                            <img src="../img/img-footer/logo-servel-electric-blanco.png" alt="Logo">
                        </a>
                    </figure>
                    <p>HIDROSVEL SERVICE es una empresa peruana especializada en sistemas de servicio de mantenimiento
                        integral. Nuestra sólida propuesta se adapta a las necesidades específicas de nuestros clientes,
                        capaces de brindarles y desarrollar soluciones óptimas para aumentar la operatividad de equipos
                        y máquinas eléctricas.</p>
                </div>
            </div>
            <div class="footer__group-1-2">
                <div class="footer__box">
                    <h2>Servicios</h2>
                    <a href="../paginas/servicio_instalacion.html">
                        <li>Servicio de instalación</li>
                        <br>
                    </a>
                    <a href="../paginas/servicio_mantenimiento.html">
                        <li>Servicio de mantenimiento &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; preventivo y correctivo</li>
                        <br>
                    </a>
                </div>
                <div class="footer__box">
                    <h2>Menus</h2>
                    <a href="../index.html">
                        <li>Inicio</li>
                        <br>
                    </a>
                    <a href="../paginas/nosotros.html">
                        <li>Nosotros</li>
                        <br>
                    </a>
                    <a href="../paginas/servicio_instalacion.html">
                        <li>Servicios</li>
                        <br>
                    </a>
                    <a href="../paginas/contacto.html">
                        <li>Contacto</li>
                        <br>
                    </a>
                </div>
                <div class="footer__box">
                    <h2>Contacto</h2>
                    <p>999-999-999</p>
                    <p>Direccion</p>
                </div>
            </div>
        </div>
        <div class="footer__group-copy">
            <small>SERVER ELECTRIC Y INGENIERIA EIRL &copy; 2023</small>
        </div>
    </footer>
</body>

</html>