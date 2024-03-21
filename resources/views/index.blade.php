<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">

    <!-- Styles -->
    <style>
        /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */

    </style>
</head>

<body class="antialiased">

    <div class="container_menu">
        <img class="" src="{{asset('img/web.png')}}" alt="">
        @if (Route::has('login'))

            <div class="login_register">

                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="">{{ __('Dashboard') }}</a>
                @else
                    <a href="{{ route('login') }}"
                        class="">{{ __('Log in') }}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="">{{ __('Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif

    </div>
    <img class="image" src="{{asset('img/personeria.png')}}" alt="">

    <footer>
        <section id="Acerca-de">
            <article>
                <hgroup>
                    <h3>Acerca de ....</h3>
                </hgroup>
                <p>Intranet Corporativa , software para el ingreso de usuarios y manejo de Gestión Documental</p>
                <a target="_blank" href="https://www.instagram.com/personeriadesabaneta/"></a>
            </article>
        </section>

        <section id="Redes-s">
            <div class="red-social Web"><a target="_blank" href="http://www.personeriasabaneta.gov.co/"><img src="{{asset('img/web.png')}}" alt=""></a></div>
            <div class="red-social facebook"><a target="_blank" href="https://www.facebook.com/PersoneriaSabaneta/"><img src="{{asset('img/facebook.png')}}" alt=""></a></div>
            <div class="red-social youtube"><a target="_blank" href="https://www.youtube.com/channel/UCIOWj7UFGxB8DoKJSCeFqzg/videos?view_as=subscriber"><img src="{{asset('img/youtube.png')}}" alt=""></a></div>
            <div class="red-social instagram"><a target="_blank" href="https://www.instagram.com/personeriadesabaneta/"><img src="{{asset('img/instagram.png')}}" alt=""></a></div>

        </section>

    </footer>

    <div id="copyright">
        <p>Intranet Corporativa Versión 2.0.0 .Reservados. Todos los derechos. Copyright 2022. Desa rrollado por: César A. Bedoya Gómez.</p>
    </div>
</body>

</html>
