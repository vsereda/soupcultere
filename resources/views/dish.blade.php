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
            <img src="{{ $dish->img }}" />
            <div id="dish-detail-wrapper">
                <p>{{ $dish->description }}</p>
                @if($dish->composition)
                <p>Состав: {{ $dish->composition }}</p>
                @endif
                @foreach($dish->dishServings as $dishServing)
                    <dish-counter
                        :serving-title='@json($dishServing->serving->title)'>
                        :price='@json($dishServing->price)'>
                    </dish-counter>
                @endforeach
            </div>
        </div>
    </div>
@endsection
