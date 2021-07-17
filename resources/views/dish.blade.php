@extends('layouts.app_soupculture')

@section('content')
    <div class="center_box">
        <h2>Меню - {{ $dish->category->title }} - {{ $dish->title }}</h2>
        @component('components.info')
        @endcomponent
        <p>Для возможности заказа доставки обедов в офис Вам необходимо зарегистрироваться. После проверки Вашего адреса
            менеджером Вы получите подверждение о готовности обслуживать Ваш адрес. Подробнее в разделе <a
                href="delivery.html">"Доставка и оплата"</a></p>
        <div id="dish-wrapper">
            <img src="{{ $dish->img }}"/>
            <dish-checkout
                :dish-servings='@json($dish->dishServings)'
                :description='@json($dish->description)'
                :composition='@json($dish->composition)'
            >
            </dish-checkout>
        </div>
    </div>
    </div>
@endsection
