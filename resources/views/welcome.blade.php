@extends('layouts.app')

@section('content')

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('img/carousel_1.jpg') }}" alt="Наши Услуги">
                <div class="carousel-caption d-none d-md-block">
                    <a type="button" class="btn btn-primary" href="/page/uvazhaemye-druzya">Подробнее</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/carousel_2.jpg') }}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <a type="button" class="btn btn-primary" href="/page/uvazhaemye-druzya">Подробнее</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/carousel_3.jpg') }}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <a type="button" class="btn btn-primary" href="/page/uvazhaemye-druzya">Подробнее</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section class="container mt-4 pb-4">

        <div class="row align-items-center">

            <div class="col">
                <h2>Бронирования путевок</h2>
                <p> <span class="font-weight-bold">Стоимость:</span><br>
                    <span class="font-weight-bold">6-10 лет:</span> 642 рубля 02 копеек<br>
                    <span class="font-weight-bold">11-13 лет:</span> 653 рубля 00 копейки<br>
                    <span class="font-weight-bold">14 лет:</span> 660 рубль 20 копеейк<br>
                    Иностранные граждане по ценам РБ<br>
                    <span class="font-weight-bold">Сумма дотации:</span> 215,00 рублей<br>
                    <span class="font-weight-bold">Примечание:</span> превышение суточной стоимости питания, оплачивается из прибыли
                    предприятия УП«Минскоблгаз», иностранные граждане оплачивают стоимость путевки в волюте своей
                    странны, в переводе стоимости путевки от белорусской цены. Для того, чтобы забронировать путевку,
                    необходимо заполнить заявление (индивидуальная путевка) или заявку (организации). Образец заявления
                    и заявки от организации смотрите внизу страницы. Обращаем Ваше внимание, что все графы заявлений и
                    заявок должны быть Вами заполнены ...
                </p>
                <a type="button" class="btn btn-primary" href="/page/bronirovaniya-putevok">Подробнее</a>
            </div>

            <div class="col">
                <img class="img-responsive" src="{{ asset('img/trip.jpg') }}" alt="Бронирование путевок">
            </div>

        </div>

    </section>

    <div class="container pt-4 pb-4"><hr/></div>

    <section class="container mt-4 pb-4">

        <div class="row align-items-center">

            <div class="col">
                <img class="img-responsive" src="{{ asset('img/chaika.jpg') }}" alt="Узнайте больше">
            </div>

            <div class="col">
                <h2>Узнайте больше</h2>
                <p> Оздоровительный лагерь имени «Е.М.Чайки», принадлежит  Производственному республиканскому  унитарному предприятию «МИНСКОБЛГАЗ», находится на балансе филиала Столбцовского производственного управления  «Столбцыгаз». Лагерь имени «Е.М.Чайки» является учреждением, обеспечивающим получение внешкольного воспитания и обучения, несет оздоровительную  и иные функции  для детей от 6 до 14 лет. Лагерь им. «Е.М. Чайки» является сезонным оздоровительным лагерем с  круглосуточным  пребыванием детей и персонала, привлекает  на временную  работу персонал, согласно  нормам штатного  расписания. СЕГОДНЯ оздоровительный  лагерь имени Е.М.Чайки  – это целый оздоровительный комплекс, состоящий из 7 корпусов, столовой, бассейна, спортзала, бани, готовый принять  на отдых  не только детей, но и их родителей. Узнаем ...
                </p>
                <a type="button" class="btn btn-primary" href="/page/obshie-polozheniya">Подробнее</a>
            </div>

        </div>

    </section>

    <div class="container pt-4 pb-4"><hr/></div>

@endsection
