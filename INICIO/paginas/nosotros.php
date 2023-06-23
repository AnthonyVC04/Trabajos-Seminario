<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-header.css">
    <link rel="stylesheet" href="../css/style-nosotros.css">
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
                            <span class="phone"><img class="info-logo-nav-link"
                                    src="../img/img-header/icon_telefono.png" alt=""> +51 923
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
                <a href="" class="social-media-icons"><img class="red-logo1" src="../img/img-header/icon_facebook.png"
                        alt=""></a>
                <a href="" class="social-media-icons"><img class="red-logo2" src="../img/img-header/icon_instagram.png"
                        alt=""></a>
                <a href="" class="social-media-icons"><img class="red-logo3" src="../img/img-header/icon_twitter.png"
                        alt=""></a>
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
            <nav class="trapecio-barra-nav1">

                <li><a href="../index.php">INICIO</a></li>
                <li><a href="../paginas/nosotros.php">SOBRE NOSOTROS</a></li>
                <li>
                    <a href="#">SERVICIOS</a>
                    <ul class="tr-sub-menu">
                        <li><a href="../paginas/servicio_mantenimiento.php">Mantenimiento</a></li>
                        <li><a href="../paginas/servicio_instalacion.php">Instalaciones</a></li>
                    </ul>
                </li>
                <li><a href="../../iniciar.php">LOGIN</a></li>
                </ul>
            </nav>
        </div>

        <div class="puente-nav2"></div>
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

    <!-- NOSOTROS -->
    <section class="muestra">
        <div class="content">
            <div class="content_text">
                <h3>Sobre Nosotros</h3>
            </div>
        </div>
    </section>
    <section class="informacion">
        <div class="informacion_content">
            <div class="concepto">
                <p>“HIDROSVEL SERVICE es una empresa peruana especializada en sistemas de servicio de mantenimiento
                    integral. Nuestra sólida propuesta se adapta a las necesidades específicas de nuestros clientes,
                    capaces de brindarles y desarrollar soluciones óptimas para aumentar la operatividad de equipos
                    y máquinas eléctricas.
                    Nuestra trayectoria y vasta experiencia con 25 años en la materia respalda nuestra compañía,
                    para que usted y negocio prosperen disfrutando de un ambiente seguro, con un servicio de calidad
                    y garantía comprobada y respaldada por todos nuestros”</p>
                <div class="extra">
                    <p>Sistema de servicio de mantenimiento integral para la industria</p>
                </div>
            </div>
            <div class="img_first">

            </div>
        </div>
    </section>
    <section class="mision_vision">
        <div class="mision_vision_content">
            <div class="vision">
                <h2>Nuestra Visión</h2>
                <p>Ser reconocida como empresa líder en sistemas de servicios de mantenimiento integral, en el Perú, basados en la integridad y excelencia profesional.</p>
            </div>
            <div class="mision">
                <h2>Nuestra Misión</h2>
                <p>Brindar un óptimo servicio de calidad, mediante la correcta gestión de recursos humanos, logísticos y técnicos, a fin de mejorar la operatividad de los equipos y máquinas eléctricas de nuestros clientes.</p>
            </div>
        </div>
    </section>
    <section class="brochure">
        <h2>DESCARGA NUESTRO BROCHURE</h2>
        <div>
            <button>BROCHURE</button>
        </div>
    </section>

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
                    <a href="../paginas/servicio_instalacion.php">
                        <li>Servicio de instalación</li>
                        <br>
                    </a>
                    <a href="../paginas/servicio_mantenimiento.php">
                        <li>Servicio de mantenimiento &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; preventivo y correctivo</li>
                        <br>
                    </a>
                </div>
                <div class="footer__box">
                    <h2>Menus</h2>
                    <a href="../index.php">
                        <li>Inicio</li>
                        <br>
                    </a>
                    <a href="../paginas/nosotros.php">
                        <li>Nosotros</li>
                        <br>
                    </a>
                    <a href="../paginas/servicio_instalacion.php">
                        <li>Servicios</li>
                        <br>
                    </a>
                    <a href="../paginas/contacto.php">
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