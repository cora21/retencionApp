<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>@yield('titulo', 'Sazao || e-Commerce HTML Template')</title>
    <link rel="icon" type="image/png" href="{{ asset('imagenes/law.png') }}">

    <!-- Estilos de la plantilla -->
    <link rel="stylesheet" href="{{ asset('adminkit/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/jquery.nice-number.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/jquery.calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/add_row_custon.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/mobile_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/jquery.exzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/multiple-image-video.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/ranger_style.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/jquery.classycountdown.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/responsive.css') }}">
</head>

<body>

    <!--============================
        HEADER START
    ==============================-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-2 col-md-1 d-lg-none">
                    <div class="wsus__mobile_menu_area">
                        <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                    </div>
                </div>
                <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                    <div class="wsus_logo_area">
                        <a class="wsus__header_logo" href="{{ route('dashboard') }}">
                            <img src="{{ asset('imagenes/law.png') }}" alt="logo" class="img-fluid w-50">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6 col-lg-4 d-none d-lg-block">
                    <div class="wsus__search">
                        <form>
                            <input type="text" placeholder="Search...">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- En la sección del header, reemplaza el bloque del usuario con esto: -->
                <div class="col-xl-5 col-3 col-md-3 col-lg-6">
                    <div class="wsus__call_icon_area">
                        <div class="wsus__call_area">
                            <div class="wsus__call">
                                <i class="fas fa-user-headset"></i>
                            </div>
                            <div class="wsus__call_text">
                                <p>Usuario: {{ Auth::user()->name ?? 'Usuario' }} </p>
                                <p>Correo: {{ Auth::user()->email ?? 'Usuario' }} </p>
                            </div>
                        </div>
                        <ul class="wsus__icon_area">
                            <!-- Dropdown del usuario -->
                            <li class="nav-item dropdown">
                                {{-- <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name ?? 'Usuario' }} <!-- Nombre del usuario -->
                                </a> --}}
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="wsus__mini_cart">
            <h4>shopping cart <span class="wsus_close_mini_cart"><i class="far fa-times"></i></span></h4>
            <ul>
                <li>
                    <div class="wsus__cart_img">
                        <a href="#"><img src="{{ asset('adminkit/images/tab_2.jpg') }}" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="#">apple 9.5" 7 serise tab with full view display</a>
                        <p>$140 <del>$150</del></p>
                    </div>
                </li>
                <!-- Más elementos del carrito -->
            </ul>
            <h5>sub total <span>$3540</span></h5>
            <div class="wsus__minicart_btn_area">
                <a class="common_btn" href="cart_view.html">view cart</a>
                <a class="common_btn" href="check_out.html">checkout</a>
            </div>
        </div>
    </header>
    <!--============================
        HEADER END
    ==============================-->

    <!--============================
        MAIN MENU START
    ==============================-->
    <nav class="wsus__main_menu d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="relative_contect d-flex">
                        {{-- <div class="wsus_menu_category_bar">
                            <i class="far fa-bars"></i>
                        </div> --}}
                        <ul class="wsus__menu_item">
                            <li><a class="active" href="{{ route('dashboard') }}"> Inicio </a></li>
                            {{-- dropdown para las retenciones --}}
                            <li class="wsus__relative_li"><a href="#">Retenciones<i class="fas fa-caret-down"></i></a>
                                <ul class="wsus__menu_droapdown">
                                    <li><a href="#">Comprobantes</a></li>
                                    <li><a href="#">Generar XLM</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('compra.index') }}">Compras</a></li>
                            <li><a href="#">Ventas</a></li>
                        </ul>
                        <ul class="wsus__menu_item wsus__menu_item_right">
                            <li><a href="#">Contacto</a></li>
                            <li><a href="{{ route('perfilEmpresa.index') }}">Mi cuenta</a></li>
                            <li>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--============================
        MAIN MENU END
    ==============================-->

    <!-- Contenido dinámico -->
    <main>
        @yield('contenido')
    </main>

    <!--============================
        FOOTER PART START
    ==============================-->
    <footer class="footer_2">
        <div class="wsus__footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="wsus__copyright d-flex justify-content-center">
                            <p>Copyright © 2025 OjaO Contability. Todos los derechos reservados</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--============================
        FOOTER PART END
    ==============================-->

    <!-- Scripts de la plantilla -->
    <script src="{{ asset('adminkit/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('adminkit/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminkit/js/Font-Awesome.js') }}"></script>
    <script src="{{ asset('adminkit/js/select2.min.js') }}"></script>
    <script src="{{ asset('adminkit/js/slick.min.js') }}"></script>
    <script src="{{ asset('adminkit/js/simplyCountdown.js') }}"></script>
    <script src="{{ asset('adminkit/js/jquery.exzoom.js') }}"></script>
    <script src="{{ asset('adminkit/js/jquery.nice-number.min.js') }}"></script>
    <script src="{{ asset('adminkit/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('adminkit/js/jquery.countup.min.js') }}"></script>
    <script src="{{ asset('adminkit/js/add_row_custon.js') }}"></script>
    <script src="{{ asset('adminkit/js/multiple-image-video.js') }}"></script>
    <script src="{{ asset('adminkit/js/sticky_sidebar.js') }}"></script>
    <script src="{{ asset('adminkit/js/ranger_jquery-ui.min.js') }}"></script>
    <script src="{{ asset('adminkit/js/ranger_slider.js') }}"></script>
    <script src="{{ asset('adminkit/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('adminkit/js/venobox.min.js') }}"></script>
    <script src="{{ asset('adminkit/js/jquery.classycountdown.js') }}"></script>
    <script src="{{ asset('adminkit/js/main.js') }}"></script>
</body>

</html>