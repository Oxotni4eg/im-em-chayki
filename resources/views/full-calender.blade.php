<!DOCTYPE html>
<html>
<head>
    <title>Календарь</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
{{--    Скрипт для выпадающего меню--}}
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous"></script>


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
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" role="menu">
                            <li><a class="dropdown-item" href="/page/istoriya">История</a></li>
                            <li><a class="dropdown-item" href="/page/job">Вакансии</a></li>
                            <li><a class="dropdown-item" href="/page/pravila_i_zakony">Правила и законы</a></li>
                            <li><a class="dropdown-item" href="/page/smeny">Смены</a></li>
                            <li><a class="dropdown-item" href="/page/rabota-s-roditelyami">Работа с родителями</a></li>
                            <li><a class="dropdown-item" href="/page/nasha-deyatelnost">Наша деятельность</a></li>
                            <li><a class="dropdown-item" href="/page/contacts">Контакты</a></li>
                            <li><a class="dropdown-item" href="/page/full-calender">Календарь</a></li>
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
<div class="container">
    <br />
    <h1 class="text-center text-primary"><u>Календарь событий</u></h1>
    <br />

    <div id="calendar"></div>

</div>

<script>

    $(document).ready(function () {


        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendar = $('#calendar').fullCalendar({
            editable:true,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            events:'/full-calender',
            selectable:true,
            selectHelper: true,
            select:function(start, end, allDay)
            {
                var title = prompt('Заголовок события:');

                if(title)
                {
                    var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                    var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                    $.ajax({
                        url:"/full-calender/action",
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            type: 'add'
                        },
                        success:function(data)
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Событие успешно создано!");
                        }
                    })
                }
            },
            editable:true,
            eventResize: function(event, delta)
            {
                var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        title: title,
                        start: start,
                        end: end,
                        id: id,
                        type: 'update'
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Событие обновлено!");
                    }
                })
            },
            eventDrop: function(event, delta)
            {
                var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        title: title,
                        start: start,
                        end: end,
                        id: id,
                        type: 'update'
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Событие обновлено!");
                    }
                })
            },

            eventClick:function(event)
            {
                if(confirm("Вы уверены, что хотите удалить событие?"))
                {
                    var id = event.id;
                    $.ajax({
                        url:"/full-calender/action",
                        type:"POST",
                        data:{
                            id:id,
                            type:"delete"
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Событие успешно удалено!");
                        }
                    })
                }
            }
        });

    });

</script>
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
