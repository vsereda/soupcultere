@extends('layouts.app_soupculture')

@section('content')
    <main>
        <div class="center_box">
            <h2>О нас</h2>
            <div id="about-wrapper">
                <div class="nav-pictures">
                    <img src="images/input.jpg" id="imput_img">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2564.637121699052!2d36.23287931571508!3d49.99941247941571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a0e689c52087%3A0x626221da55e245fc!2z0KHRg9C_0LrRg9C70YzRgtGD0YDQsCDQpdCw0YDRjNC60L7Qsg!5e0!3m2!1sru!2sua!4v1602356518366!5m2!1sru!2sua"
                            width="310" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0">
                    </iframe>
                </div>
                <div class="nav-text">
                    <p>Мы находимся по аадресу: Харків, ул.Сумская, 36/38.</p>
                    <p>Также мы осуществляем доставку наших супов в офис, подробнее в разделе <a href="#">Доставка и оплата</a></p>
                    <p>Контактный телефон: 0988888888</p>
                    <p>Другая контактная информация...</p>
                </div>
            </div>
        </div>
    </main>
@endsection
