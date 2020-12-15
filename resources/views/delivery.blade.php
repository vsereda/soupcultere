@extends('layouts.app_soupculture')

@section('content')
    <div class="center_box">
        <h2>Доставка и оплата</h2>
        @component('components.info')
        @endcomponent
        <div id="delivery-wrapper">
            <article>
                <p>
                    Мы осуществляем доставку обедов в офисы по городу Харькову. После Вашей регистрации на сайте наш
                    менеджер
                    проверяет зарегистрированный Вами адрес доставки и включает Вам возможность заказов. Заказы обедов
                    осуществляются на завтра, либо до 9 часов утра на сегодня.
                </p>
            </article>
        </div>
    </div>
@endsection
