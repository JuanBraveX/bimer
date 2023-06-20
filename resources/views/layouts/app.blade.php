<!doctype html>
<html lang="{{' BIMER'}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BIMER</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/clientes.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
   
    <link
        href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@400;700&family=Inter:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- filtrador -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#filtroTabla').keyup(function() {
                var value = $(this).val().toLowerCase();
                $('#tablaSuscripciones tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header class="border-3 border-header">
        <nav class="navbar navbar-expand-md bg-transparent container-xxl">
            <div class="container-fluid d-flex justify-content-space-around px-md-5">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="w-100" src="{{ asset('sources/BIMERWEB.png') }}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="bi bi-list text-light fs-1"></i>
                </button>

                <div class="collapse navbar-collapse ms-2 text-warning--edit" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-warning--edit" href="{{ asset('bimers') }}">VER TUS BIMER</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-warning--edit" href="{{ asset('suscripciones') }}">VER TUS
                                    SUSCRIPCIONES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-warning--edit" href="{{ asset('planes') }}">ADQUERIR PLANES</a>
                            </li>
                        @endauth
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-warning--edit"
                                        href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-warning--edit"
                                        href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-warning--edit bg-dark-subtle"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end btn-logout text-center p-1"
                                    aria-labelledby="navbarDropdown">
                                    <a class="text-decoration-none" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
    <style>
        .pagination {
            margin-top: 4rem;
            align-self: center;
            align-items: center;
            justify-content: center;
            justify-self: center;
            color: black;
        }

        .pagination {
            --bs-pagination-padding-x: .75rem;
            --bs-pagination-padding-y: .375rem;
            --bs-pagination-font-size: .9rem;
            --bs-pagination-color: black;
            --bs-pagination-bg: #fff;
            --bs-pagination-border-width: 1px;
            --bs-pagination-border-color: #dee2e6;
            --bs-pagination-border-radius: .375rem;
            --bs-pagination-hover-color: var(--bs-link-hover-color);
            --bs-pagination-hover-bg: #e9ecef;
            --bs-pagination-hover-border-color: #dee2e6;
            --bs-pagination-focus-color: var(--bs-link-hover-color);
            --bs-pagination-focus-bg: #e9ecef;
            --bs-pagination-focus-box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .25);
            --bs-pagination-active-color: #fff;
            --bs-pagination-active-bg: #0d6efd;
            --bs-pagination-active-border-color: #0d6efd;
            --bs-pagination-disabled-color: #6c757d;
            --bs-pagination-disabled-bg: #fff;
            --bs-pagination-disabled-border-color: #dee2e6;
            display: flex;
            padding-left: 0;
            list-style: none;
        }

        .page-link.active,
        .active>.page-link {
            z-index: 3;
            color: var(--bs-pagination-active-color);
            background-color: #C6AA33;
            border-color: #C6AA33;
        }
    </style>
    <footer class="footer text-warning--edit">
        <div class="container-xxl text-center pt-5 px-6">
            <div class="row align-items-center fs-2">
                <div class="col">
                    <!--Redes Sociales-->
                    <ul class="network-list d-flex justify-content-center ps-0 mb-2">
                        <li><a href="https://www.facebook.com/businessinmotionstudio" target="_blank"
                                rel="noopener noreferrer"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="https://twitter.com/jambrizcemp?s=20" target="_blank" rel="noopener noreferrer"><i
                                    class="bi bi-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/@binmotionstudio" target="_blank"
                                rel="noopener noreferrer"><i class="bi bi-youtube"></i></a></li>
                        <li><a href="https://wa.me/c/5214461494139" target="_blank"><i class="bi bi-whatsapp"></i></a>
                        </li>
                    </ul>
                    <p class="fs-4 fw-medium">Business in Motion</p>
                </div>
                <!--Contacto-->
                <div class="col">
                    <ul class="network-list info-list gap-5 d-flex justify-content-center ps-0 fs-6">
                        <li>
                            <a href="tel:+524461494139" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-telephone-fill fs-4"></i>
                            </a>
                            <p>Teléfono</p>
                        </li>
                        <li>
                            <a href="https://goo.gl/maps/qCor7piskpLAtRN4A" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-geo-alt-fill fs-4"></i>
                            </a>
                            <p>Ubícanos</p>
                        </li>
                        <li>
                            <a href="mailto:info@binmotion.com.mx" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-envelope-fill fs-4"></i></a>
                            <p>E-mail</p>
                        </li>
                    </ul>
                </div>
                <!--Redes Sociales Studio-->
                <div class="col">
                    <ul class="network-list d-flex justify-content-center ps-0 mb-2">
                        <li><a href="https://www.facebook.com/businessinmotionstudio" target="_blank"
                                rel="noopener noreferrer"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="https://twitter.com/jambrizcemp?s=20" target="_blank"
                                rel="noopener noreferrer"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/@binmotionstudio" target="_blank"
                                rel="noopener noreferrer"><i class="bi bi-youtube"></i></a></li>
                        <li><a href="https://wa.me/c/5214461494139" target="_blank"><i
                                    class="bi bi-whatsapp"></i></a>
                        </li>
                    </ul>
                    <p class="fs-5 fw-medium">Business in Motion STUDIO</p>
                </div>
            </div>
        </div>
        <div class="text-center container-xxl">
            <p> &copy; Copyright.</p>
        </div>
    </footer>
</body>

</html>
