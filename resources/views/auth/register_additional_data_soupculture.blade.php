@extends('layouts.app_soupculture')

@section('content')
    <div class="center_box">
        <h2>{{ __('Register additional data') }}</h2>
        <div id="login_wrapper">
            <form method="POST" action="{{ route('address_register') }}">
                @csrf

                @if(!$phone_exists)
                <div class="form_group_login">
                    <div>
                        <label for="phone">{{ __('Phone number') }}</label>
                    </div>
                    <div>
                        <input
                            id="phone"
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            required
                            autocomplete="soupcultere-phone"
                            placeholder="example: 0981234567"
                        >
                    </div>
                </div>
                @error('phone')
                <p class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </p>
                @enderror
                @endif

                @if(!$address_exists)
                <addresses-autocomplete
                    label-i-d-value="address-confirmed"
                    label-value="Confirmed delivery address"
                    input-name-value="address-confirmed"
                    v-on:autocomlete_change="setAddressListChange($event)"
                    :is-loading-outside="false"
                    :reset-value="yourAddressChange"
                    :items='@json($confirmedAddresses)'
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
                @endif

                <div class="form_group_login" id="login_buttons_row">
                    <div></div>
                    <div>
                        <button type="submit">
                            {{ __('Register_additional') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
