@extends('layouts.app_soupculture')

@section('content')
    <div class="center_box">
        <h2>{{ __('Register delivery address') }}</h2>
        <div id="login_wrapper">
            <form method="POST" action="{{ route('address_register') }}">
                @csrf

                <addresses-autocomplete
                    label-i-d-value="address-confirmed"
                    label-value="Confirmed delivery address"
                    input-name-value="address-confirmed"
                    v-on:autocomlete_change="setAddressListChange($event)"
                    :is-loading-outside="false"
                    :reset-value="yourAddressChange"
                    :items="[{'id': 201, 'name': 'Apple Apple Apple Apple Apple Apple Apple Apple Apple Apple Apple '},{'id': 2111, 'name': 'Apple'},{'id': 21, 'name': 'Apple1'},{'id': 21, 'name': 'Apple2'},{'id': 21, 'name': 'Apple3'},{'id': 21, 'name': 'Apple4'},{'id': 21, 'name': 'Apple5'},{'id': 21, 'name': 'Apple6'},{'id': 21, 'name': 'Apple7'}, {'id': 22, 'name': 'BananaonArrowDownssssssssssssssssssssssssssssssssssssssssss'}, {'id': 23, 'name': 'Grape'}, {'id': 24, 'name': 'Pineapple'}]"
                ></addresses-autocomplete>
                @error('address-confirmed')
                <p class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </p>
                @enderror
                <your-address
                    :reset-value="addressSelectedListChange"
                    :label-value="'Or your delivery Address'"
                    :old-value='@json($oldAddress)'
                    v-on:your_address_result="setAddressSelectedYour($event)"
                >
                </your-address>
                @error('your-address')
                <p class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </p>
                @enderror

                <div class="form_group_login" id="login_buttons_row">
                    <div></div>
                    <div>
                        <button type="submit">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
