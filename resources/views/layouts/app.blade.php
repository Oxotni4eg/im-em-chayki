<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ОЛ им. "Е.М.Чайки"</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scripts.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Favicon -->

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">ОЛ им. "Е.М.Чайки"</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Главная</a></li>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle"  href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                О Чайке<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="/page/istoriya">История</a></li>
                                <li><a class="dropdown-item" href="/page/job">Вакансии</a></li>
                                <li><a class="dropdown-item" href="/page/pravila_i_zakony">Правила и законы</a></li>
                                <li><a class="dropdown-item" href="/page/smeny">Смены</a></li>
                                <li><a class="dropdown-item" href="/page/rabota-s-roditelyami">Работа с родителями</a></li>
                                <li><a class="dropdown-item" href="/page/nasha-deyatelnost">Наша деятельность</a></li>
                                <li><a class="dropdown-item" href="/page/contacts">Контакты</a></li>
                                <li><a class="dropdown-item" href="/full-calender">Календарь</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/blog">Новости</a></li>
                        <li class="nav-item"><a class="nav-link" href="/gallery">Фотоальбомы</a></li>
                        <li class="nav-item"><a class="nav-link" href="/page/feedback">Обратная связь</a></li>

                        @if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
                            <li class="nav-item"><a class="nav-link" href="{{route("binshopsblog.admin.index")}}">Перейти в admin-панель</a></li>
                            <li class="nav-item"><a class="nav-link" {{ Request::is('albums/create') ? 'font-weight-bold' : '' }} href="/albums/create">Создать новый альбом</a></li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегестрироваться') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
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

        <main class="py-4">
            @include('inc.flashMessage')
            @yield('content')
        </main>

        <footer>

            <div class="footer-above pt-4 pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>АДРЕС</h3>
                            <p>
                                222666 Беларусь
                                <br>Минская обл. д.Дрозды
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h3>КОНТАКТЫ</h3>
                            <div class="row">
                                <div class="col-md-6"><a class="phone" href="tel:80171777202">8 (01717) 7 72 02</a></div>
                                <div class="col-md-5 text-left"> - приемная</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"><a class="phone" href="tel:80171777203">8 (01717) 7 72 03</a></div>
                                <div class="col-md-5 text-left"> - отдел кадров</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"><a class="phone" href="tel:80296165226">+375 (29) 616 52 26</a></div>
                                <div class="col-md-5 text-left"> - Начальник О.Л. им. Е.М.Чайки Шпилевская Татьяна Николаевна</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h3>РАЗРАБОТКА САЙТА</h3>
                            <p>
                            {{--logo--}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
    </div>
</body>
</html>
