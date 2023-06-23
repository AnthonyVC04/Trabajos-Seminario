<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-header.css">
    <link rel="stylesheet" href="../css/style-footer.css">
    <link rel="stylesheet" href="../css/stye-contacto.css">
    
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

    <!-- CONTACTENOS -->
    <section class="contactanos">
        <div class="first_block">
            <div class="contactanos_contenedor">
                <div>
                    <h2>Contáctenos</h2>
                </div>
                <div>
                    <p>Puedes contactarnos en nuestros detalles de contactos que se muestras a continuacion</p>
                </div>
            </div>
            <div class="detalle_contacto">
                <div class="dc_contenedor">
                    <div>
                        <h3>Detalles de contacto</h3>
                    </div>
                    <div class="datos">
                        <p>Heroes de la Breña, San Juan de Lurigancho 15457</p>
                    </div>
                    <div class="datos">
                        <p>923907418 - 993329053</p>
                    </div>
                    <div class="datos">
                        <p class="correo">Contacto <a href="#">ventas@hidrosvelservice.com</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="formulario_contacto">
            <div>
                <h3>
                    Formulario de contacto
                </h3>
            </div>
            <div>
                <p>Puedes contactarnos en el formulario que se muestra a continuacion llenando todos los campos</p>
                <!--En esta parte va el correo que sera el receptor de los correos-->
                <form action="https://formsubmit.co/jhonatanmontoya426@gmail.com
                " method="POST" class="formulario" required>
                    <input type="text" placeholder="Tus nombres" name="name">
                    <input type="email" placeholder="Correo" name="gmail">
                    <input type="tel" placeholder="Telefono" maxlength="12" name="telefono">
                    <textarea name="coments" id="" placeholder="Mensaje" cols="30" rows="10"></textarea>
                    <div class="btn">
                        <button>Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="mapa">
        <!--Aqui es para insertar el mapa de la ubicacion-->
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249768.05979494765!2d-77.2021197835937!3d-12.000364899999987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105ce568c042771%3A0x6072f46c2b26e80!2sSENATI%20%E2%80%94%20San%20Mart%C3%ADn%20de%20Porres!5e0!3m2!1ses-419!2spe!4v1678454540369!5m2!1ses-419!2spe"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
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