<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{'BIMER'}} </title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Scripts de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <!--css-->
    <link rel="stylesheet" href="css/styles.css">

    <!--Estilos de Fuente - POPPINS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!--Animaciones AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    

</head>

<!--Menu Principal-->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top pb-0"
    style="background-color:  #000; border-bottom: 2px solid #C6AA33;">
    <div class="container-fluid align-items-end">

        <!--Imagen Logo-->
        <a class="navbar-brand" href="index.php">
            <img id='logobim' class='logobim' src="{{ asset('sources/Logo_Bimer_Index.png') }}" height="60">
        </a>

        <button type="button" class="navbar-toggler mb-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mx-auto">

                <li class="nav-item active rounded mx-3">
                    <a class="nav-link " aria-current="page" href="{{ env('URL_PAGE').'/Inicio' }}" style="color: #C6AA33;">INICIO</a>
                </li>

                <li class="nav-item rounded mx-3">
                    <a class="nav-link" href="{{ env('URL_PAGE').'/QuienesSomos' }}" style="color: #C6AA33;">QUIÉNES SOMOS</a>
                </li>
                <li class="nav-item dropdown rounded mx-3">
                    <a class="nav-link active dropdown-toggle" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" href="#" style="color: #C6AA33;">QUÉ
                        HACEMOS</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ env('URL_PAGE').'/QueHacemos' }}">Qué Hacemos</a></li>
                        <li><a class="dropdown-item" href="{{ env('URL_PAGE').'/BIMStudio' }}">BIM Studio</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown rounded mx-3">
                    <a class="nav-link active dropdown-toggle" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" href="#" style="color: #C6AA33;">QUÉ
                        OFRECEMOS</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ env('URL_PAGE').'/QueOfrecemos' }}">Que Ofrecemos</a></li>
                        <li><a class="dropdown-item" href="#">Bimer</a></li>
                        <li><a class="dropdown-item" href="{{ env('URL_PAGE').'/Marketing' }}">Marketing</a></li>
                        <li><a class="dropdown-item" href="{{ env('URL_PAGE').'/Consultoria' }}">Consultoría</a></li>
                        <li><a class="dropdown-item" href="{{ env('URL_PAGE').'/DesarrolloTecnologico' }}">Desarrollo Tecnológico</a></li>
                        <li><a class="dropdown-item" href="{{ env('URL_PAGE').'/ProduccionVideografica' }}">Producción Videográfica</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown rounded mx-3">
                    <a class="nav-link active dropdown-toggle" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" href="#"
                        style="color: #C6AA33;">CONTACTO</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ env('URL_PAGE').'/Contacto' }}">Contacto</a></li>
                        <li><a class="dropdown-item" href="{{ env('URL_PAGE').'/Empleate' }}">Empléate</a></li>
                    </ul>
                </li>
                <li class="nav-item rounded mx-3">
                    <a class="nav-link" href="#" style="color: #C6AA33;">BIMER</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body style="background-color:  rgba(0, 0, 0, 0.85);;">
    <!--cuerpo-->
    <div class="d-flex flex-column justify-content-center align-items-center">
        <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </div>

    <style>
        /* efecto type */
        .effecttype {
            font-family: 'Poppins', sans-serif;
            font-size: 60px;
            font-weight: 600;
            border-right: 3px solid;
            margin-left: 50px auto;
            animation: teclear 4s steps(38) 1s 1 normal both, efecto .5s step-end infinite alternate;

        }

        @keyframes teclear {
            from {
                clip-path: polygon(0 0, 0 0, 0 100%, 0% 100%);
            }

            to {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
            }
        }

        @keyframes efecto {
            50% {
                border-color: transparent;
            }
        }
    </style>
    <!--logo e inicio de sesion-->
    <div class="d-flex justify-content-center p-3">
        <div class="col-md-9 d-flex justify-content align-items-center" style="margin-left: 2.5rem;">
            <div class="col-md-12">
                <img src="{{ asset('sources/BIMERWEB.png') }}" alt="Descripción de la imagen" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href="login">
            <button class="btn mb-3 btn01" type="button" value="login">Iniciar Sesión</button>
        </a>

    </div>

    <div class="text-center mb-5">
        <a href="register">
            <button class="btn btn02" type="button" value="registro">Registrate</button>
        </a>
    </div>
    <div class=" border-bottom border-3 border-warning"></div>
    <!--JUMBOTOM--->
    <div class="jumbotron jumbotron-fluid p-3 rounded">
        <div class="d-flex p-3 flex-wrap">
            <div class="col-md-5 m-auto">
                <p class="lead fw-bold" style="color: #C6AA33; font-size: 24px; text-align: justify">El servicio BIMER
                    es un formato estándar para el intercambio de información personal, específicamente tarjetas
                    personales electrónicas, contiene información de contacto como el cargo, los números de teléfono,
                    las direcciones de correo electrónico, entre muchos otros datos importantes a la mano.</p>
            </div>

            <div class="col-md-6 text-center">
                <img src="{{ asset('sources/Bimo_Curioso.svg') }}" alt="Descripción de la imagen" class="img-fluid">
            </div>
        </div>

    </div>

    <div class=" border-bottom border-3 border-warning"></div>

    <h2 class="text-center p-4 fw-semibold fs-1" style="color: #C6AA33; font-size: 24px; text-align: justify">¡Conoce
        todos nuestros paquetes disponibles que tenemos para ti!</h2>

    <!--estilos de las cards (las que hice igual a las de andrés-->

    <style>
        .card-plans {
            background-color: #C6AA33;
            border: none;
            border-radius: 50px;
            box-shadow: 8px 8px 24px rgba(0, 0, 0, 0.25);
            width: 280px;
            height: 450px;
        }

        .card-title {
            font-family: 'Poppins', sans-serif;
            font-weight: normal;
            font-size: 32px;
        }

        .card-plans--beginner:hover {
            background-color: #FFFFFF;
        }

        .card-plans--beginner:hover .card-body {
            color: #C6AA33 !important;
        }

        .card-plans--beginner .btn--acquire {
            background-color: #FFFFFF;
            color: #C6AA33 !important;
            font-family: 'Poppins', sans-serif;
            border-radius: 50px;
            border: none;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.25);
            width: 138px;
            height: 50px;
        }

        .card-plans--beginner:hover .btn--acquire {
            background-color: #C6AA33;
            color: #FFFFFF !important;
        }

        .card-plans--beginner:hover .d-none {
            display: block !important;
            margin: 0 auto;
        }

        .card-plans--beginner .card-text--beginner {
            font-family: 'Poppins', sans-serif;
            font-weight: normal;
            font-size: 50px;
        }

        .card-plans--beginner:hover .card-text--beginner,
        .card-plans--beginner:hover .card-text--description {
            display: none !important;
            text-align: justify;
            transition: 1s;
        }

        .card-plans--beginner .card-text--anual {
            font-family: 'Poppins', sans-serif;
            font-weight: normal;
            font-size: 20px;
            margin-top: -70px;
        }

        .card-plans--beginner:hover .card-text--anual {
            display: none !important;
            transition: 1s;
            display: none;
        }

        .column-list {
            column-count: 2;
            column-gap: 5px;
        }

        .column-list li {
            margin: 0;
            width: 8.2rem;
        }
    </style>


    <!---------------    CARDS          ...........................-->

    <div class="card-body d-flex justify-content-center px-5">
        <div class="row justify-content-center">



            @php
                $url = route('planes.indexF');
                $json = file_get_contents($url);
                $data = json_decode($json, true);
                $i = 1;
            @endphp
            @if (!empty($data))
                @foreach ($data as $item)
                    <!--BEGGINNER-->
                    
                    <div
                        class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch px-4 justify-content-center mb-3">
                        <div class="card card-plans card-plans--beginner ">
                            <div
                                class="card-body d-flex flex-column justify-content-around text-center text-light p-2">
                                <div class="d-flex flex-column">
                                    <h2 class="card-title mt-3">{{ $item['nombre'] }}</h2>
                                    <p class="card-text--description">{{ $item['descripcion'] }}</p>
                                </div>
                                <ul
                                    class="card-text fs-6 d-none list-unstyled text-decoration-none column-list text-start ps-3">
                                    @if ($item['nombre'] === 'Ideal')
                                        <li>Dark mode</li>
                                        <li>White mode</li>
                                        <li>Instagram</li>
                                        <li>TikTok</li>
                                    @endif
                                    @if ($item['nombre'] === 'Mine')
                                        <li>5 colores</li>
                                        <li>Instagram</li>
                                        <li>TikTok</li>
                                        <li>Banner</li>
                                    @endif
                                    @if ($item['nombre'] === 'One')
                                        <li>Banner</li>
                                        <li>Linkedin</li>
                                        <li>Indeed</li>
                                        <li>color de fondo</li>
                                        <li>color de tipografía</li>
                                        <li>Video</li>
                                        <li>5 fotos</li>
                                        <li>Instagram</li>
                                        <li>TikTok</li>
                                        <li>PDF</li>
                                    @endif
                                    <li>Perfil</li>
                                    <li>Cliente</li>
                                    <li>WhatsApp</li>
                                    <li>Facebook</li>
                                    <li>Codigo QR</li>
                                    <li>Empresa</li>
                                    <li>Puesto</li>
                                    <li>Correo</li>
                                    <li>Telefono</li>
                                    <li>WhatsApp</li>
                                    <li>Facebook</li>
                                </ul>
                                <p class="card-text mt-0 card-text--beginner mb-2">${{ $item['precio'] }}<span
                                        style="font-size: 18px;">MXN</span>
                                </p>
                                <p class="card-text card-text--anual">Anual</p>
                                <!--MODAL-->
                                <div class="modal fade" id="miModal{{$i}}" tabindex="-1" aria-labelledby="miModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content" style="height: 100vh;">
                                            <div class="modal-header">
                                                <h5 class="modal-title modal-title-centered" id="miModalLabel">
                                                    {{ $item['nombre'] }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="py-0 h-100">
                                                <!-- Contenido del modal -->
                                                <div class="d-flex flex-wrap justify-content-center h-100">
                                                    <div class='col-10'>
                                                        <iframe src="{{ route('bimers.show', $i) }}"
                                                            class="h-100 w-100 overflow-hidden"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center gap-4 flex-column">
                                    <!--BOTÓN DEL MODAL-->
                                    <button type="button" class="d-none btn btn--acquire"
                                        style="width: 119px; height: 38px;" data-bs-toggle="modal"
                                        data-bs-target="#miModal{{$i++}}">
                                        Vista previa
                                    </button>
                                    <a href="{{ route('planes.index') }}">
                                        <button type="button" class="btn--acquire text-center fw-medium">
                                            Adquirir
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>



    <style>
        .alert {
            background-color: #C6AA33;
            color: #FFFFFF;
        }
    </style>

    <!--FOOTER-->
    <footer class="text-center" style="background-color:  #000; color: #C6AA33;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="icons">
                        <!-- Facebook -->
                        <a class="btn btn-lg m-1" href="https://www.facebook.com/businessinmotionstudio"
                            target="_blank" role="button" data-mdb-ripple-color="dark"><i class="bi bi-facebook"
                                style="font-size: 35px;"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-lg m-1" href="https://twitter.com/binmotionmx" target="_blank"
                            role="button" data-mdb-ripple-color="dark"><i class="bi bi-twitter"
                                style="font-size: 35px;"></i></a>

                        <!-- Youtube -->
                        <a class="btn btn-lg m-1" href="https://www.youtube.com/@binmotionstudio" target="_blank"
                            role="button" data-mdb-ripple-color="dark"><i class="bi bi-youtube"
                                style="font-size: 35px;"></i></a>

                        <!-- Whatsapp -->
                        <a class="btn btn-lg m-1" href="https://wa.me/+524424594505?text=¡Estoy+interesado!"
                            target="_blank" role="button" data-mdb-ripple-color="dark"><i class="bi bi-whatsapp"
                                style="font-size: 35px;"></i></a>
                    </div>
                    <h4 class="bimTittle">Business in Motion</h4>
                </div>
                <div class="icons col">
                    <!-- Phone -->
                    <a class="btn btn-lg m-1" href="tel:+524424594505" target="_blank" role="button"
                        data-mdb-ripple-color="dark"><i class="bi bi-telephone-fill"
                            style="font-size: 25px;"></i></a>
                    <h5 class="references">Telefono</h5>
                </div>
                <div class="icons col">
                    <!-- Email -->
                    <a class="btn btn-lg m-1" href="mailto: dangarrixw.777@gmail.com?Subject=Más%20Información"
                        target="_blank" role="button" data-mdb-ripple-color="dark"><i
                            class="bi bi-envelope-at-fill" style="font-size: 25px;"></i></a>
                    <h5 class="references">Correo</h5>
                </div>
                <div class="icons col">
                    <!-- Located -->
                    <a class="btn btn-lgm-1"
                        href="https://www.google.com.mx/maps/place/C.+Ignacio+P%C3%A9rez+49,+Centro,+76000+Santiago+de+Quer%C3%A9taro,+Qro./@20.592298,-100.4041518,17z/data=!3m1!4b1!4m6!3m5!1s0x85d35ad3bcf1b0c9:0x12e7955fecb5d24b!8m2!3d20.592298!4d-100.4019631!16s%2Fg%2F11c1t5j547"
                        target="_blank" role="button" data-mdb-ripple-color="dark"><i class="bi bi-geo-alt-fill"
                            style="font-size: 25px;"></i></a>
                    <h5 class="references">Ubicacion</h5>
                </div>
                <div class="col-md-4">
                    <div class="icons">
                        <!-- Facebook -->
                        <a class="btn btn-link btn-lg m-1" href="https://www.facebook.com/binmotionmx"
                            target="_blank" role="button" data-mdb-ripple-color="dark"><i class="bi bi-facebook"
                                style="font-size: 35px;"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-link btn-lg m-1" href="https://twitter.com/binmotionmx" target="_blank"
                            role="button" data-mdb-ripple-color="dark"><i class="bi bi-twitter"
                                style="font-size: 35px;"></i></a>

                        <!-- Youtube -->
                        <a class="btn btn-link btn-lg m-1" href="https://www.youtube.com/@binmotionstudio"
                            target="_blank" role="button" data-mdb-ripple-color="dark"><i class="bi bi-youtube"
                                style="font-size: 35px;"></i></a>

                        <!-- Whatsapp -->
                        <a class="btn btn-link btn-lg m-1" href="https://wa.me/+524424594505?text=¡Estoy+interesado!"
                            target="_blank" role="button" data-mdb-ripple-color="dark"><i class="bi bi-whatsapp"
                                style="font-size: 35px;"></i></a>
                    </div>
                    <h4 class="bimTittle">Business in Motion STUDIO</h4>
                </div>
            </div>
            <!--copyright-->
            <div class=" col-md-12 p-3">
                <p class="copyright" style="font-style: italic;"> &copy; Copyright.</p>
            </div>
        </div>
    </footer>


    <!--Animaciones de las cards-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>

    <!--Estas son las clases que tienen los estilo de tipografia y botones y textos-->

    <style>
        /*Estilos de fuentes en el Footer */
        .bimTittle {
            font-family: 'Poppins', sans-serif;
            font-size: 25px;
            font-weight: normal;
        }

        .references {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: normal;
        }

        .copyright {
            font-family: 'Poppins Light', sans-serif;
            font-size: 16px;
            font-weight: 500;
        }


        .fas {
            margin-left: 10px;
        }

        .fontTitle {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 36px;
            text-align: center;

        }

        .fontText {
            font-family: 'Poppins bold', sans-serif;
            font-weight: 600;
            font-size: 24px;
            text-align: center;
            color: #C6AA33;

        }

        .textContact {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            font-size: 24px;
            color: #597FAB;
            text-transform: uppercase;
        }

        .btngoempleate1 {
            font-family: 'Poppins', sans-serif;
            font-weight: auto;
            font-size: 24px;
            text-transform: uppercase;

        }

        .botonContacto {
            color: #597FAB;
        }

        .postRecent {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            font-size: 48px;
            color: #597FAB;
        }

        .imgxqelegirnos {
            width: 70%;
            height: auto;
        }

        /*navkink */
        .nav-link {
            font-family: 'Poppins', sans-serif;
            font-weight: normal;
            font-size: 17px;
        }

        .dropdown-item {
            font-family: 'Poppins', sans-serif;
            font-weight: normal;
            font-size: 17px;
            color: #C6AA33;

        }

        .nav-item {
            transition: background-color 0.5s;
        }

        .dropdown-item {
            transition: background-color 0.5s;
        }


        /*Estilos fernando*/
        .btn01 {
            background: #C6AA33;
            width: 310px;
            height: 45px;
            padding: 10px 20px;
            border-radius: 20px;
            font-family: 'Poppins', sans-serif;
            font-weight: normal;
            font-size: 20px;
            line-height: 20px;
            color: #fff;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.25);
        }

        .btn01:hover {
            background-color: #fff;
            color: #C6AA33;
            border: 2px solid #fff;
        }

        @media (max-width: 400px) {
            .btn01 {
                width: 90%;
            }
        }

        .btn02 {
            background: #C6AA33;
            width: 310px;
            height: 45px;
            padding: 10px 20px;
            border-radius: 20px;
            font-family: 'Poppins', sans-serif;
            font-weight: normal;
            font-size: 20px;
            line-height: 20px;
            color: #fff;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.25);
        }

        .btn02:hover {
            background-color: #fff;
            color: #C6AA33;
            border: 2px solid #fff;
        }

        @media (max-width: 400px) {
            .btn02 {
                width: 90%;
            }
        }

        .border-warning {
            border-color: #C6AA33 !important;
        }

        .border {
            border: 7px solid #f2f2f2 !important;
        }

        .letra {
            font-family: 'Poppins bold', sans-serif;
            font-style: normal;
            font-weight: bold;
            font-size: 22px;
            text-align: justify;
            display: flex;
            line-height: 36px;
            color: #C6AA33;
        }

        .img02 {
            width: 496px;
            height: auto;
        }

        /*footer*/
        .footer {
            background: #C6AA33;
            margin-top: auto;
            height: 240px;
        }

        .icons a,
        .icons a:hover {
            color: #C6AA33
        }

        .icons a:focus {
            box-shadow: none;
        }
    </style>


</body>

</html>
