@extends('layouts.app_soupculture')

@section('content')
    <div class="center_box">
        <h2>Корзина</h2>
        @component('components.info')
        @endcomponent
        <div id="cart-wrapper">
            <h3>Заказ дотавки на 01.06.2021</h3>
            <div id="cart-header">
                <div class="cart-number-product">
                    <p>
                        #
                    </p>
                </div>
                <div class="cart-product-name">
                    <p>
                        Название
                    </p>
                </div>
                <div class="cart-quantity">
                    <p>
                        Количество
                    </p>
                </div>
                <div class="cart-del">
                </div>
            </div>
            <div class="cart-table-row">
                <div class="cart-number-product">
                    <p>
                        1
                    </p>
                </div>
                <div class="cart-product-name">
                    <p>
                        Название
                    </p>
                </div>
                <div class="cart-quantity input-group plus-minus-input">
                    <div class="input-group-button">
                        <button type="button" class="button hollow circle" data-quantity="minus" data-field="quantity">
                            -
                        </button>
                    </div>
                    <input class="input-group-field" type="number" name="quantity" value="0">
                    <div class="input-group-button">
                        <button type="button" class="button hollow circle" data-quantity="plus" data-field="quantity">
                            +
                        </button>
                    </div>
                </div>
                <div class="cart-del">
                    <button title="Удалить">
                        <img src="{{ asset('images/sign-del-icon_34362.png') }}"/>
                    </button>
                </div>
            </div>
            <div class="cart-table-row">
                <div class="cart-number-product">
                    <p>
                        2
                    </p>
                </div>
                <div class="cart-product-name">
                    <p>
                        Название Название Название Название Название Название Название Название Название Название
                        Название Название Название Название
                    </p>
                </div>
                <div class="cart-quantity input-group plus-minus-input">
                    <div class="input-group-button">
                        <button type="button" class="button hollow circle" data-quantity="minus" data-field="quantity">
                            -
                        </button>
                    </div>
                    <input class="input-group-field" type="number" name="quantity" value="0">
                    <div class="input-group-button">
                        <button type="button" class="button hollow circle" data-quantity="plus" data-field="quantity">
                            +
                        </button>
                    </div>
                </div>
                <div class="cart-del">
                    <button title="Удалить">
                        <img src="{{ asset('images/sign-del-icon_34362.png') }}"/>
                    </button>
                </div>
            </div>
            <div id="total-row">
                <p>
                    Итого: 100500 грн
                </p>
            </div>
            <div id="cart-buttons">
                <button id="cart-clear-button">Удалить все</button>
                <button id="cart-checkout-button">Заказать</button>
            </div>
        </div>
    </div>
@endsection
