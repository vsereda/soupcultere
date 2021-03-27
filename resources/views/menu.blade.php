@extends('layouts.app_soupculture')

@section('content')
    <div class="center_box">
        <h2>Меню</h2>
        @component('components.info')
        @endcomponent
        <p>Для возможности заказа доставки обедов в офис Вам необходимо зарегистрироваться. После проверки Вашего адреса
            менеджером Вы получите подверждение о готовности обслуживать Ваш адрес. Подробнее в разделе <a
                href="delivery.html">"Доставка и оплата"</a></p>
        <div id="menu-wrapper">
            @foreach($categories as $category)
            <a href="{{ route('menu.show', $category->id) }}" class="category-item-wrapper">
                <h2>{{ $category->title }}</h2>
                <img src="{{ $category->img }}" />
            </a>
            @endforeach
        </div>
    </div>
@endsection
