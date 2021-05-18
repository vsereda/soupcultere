@extends('layouts.app_soupculture')

@section('content')
    <div class="center_box">
        <h2>Меню - {{ $category->title }}</h2>
        @component('components.info')
        @endcomponent
        <p>Для возможности заказа доставки обедов в офис Вам необходимо зарегистрироваться. После проверки Вашего адреса
            менеджером Вы получите подверждение о готовности обслуживать Ваш адрес. Подробнее в разделе <a
                href="delivery.html">"Доставка и оплата"</a></p>
        <div id="category-wrapper">
            @foreach($category->dishes as $dish)
                <div class="dish-wrapper">
                    <a href="{{ route('dish.index', $dish->id) }}">
                        <img src="{{ $dish->img }}" class="category-small-img">
                    </a>
                    <div class="dish-servings-wrapper">
                        <h3>{{ $dish->title }}</h3>
                        @foreach($dish->dishServings as $dishServing)
                            <p>{{ $dishServing->serving->title }} - {{ $dishServing->price }} грн</p>
                        @endforeach
                        <a href="{{ route('dish.index', $dish->id) }}">
                            Подробнее
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
