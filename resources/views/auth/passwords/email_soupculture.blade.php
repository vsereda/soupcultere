@extends('layouts.app_soupculture')

@section('content')
    <main>
        <div class="center_box">
            <h2>{{ __('Reset Password') }}</h2>
            <div id="login_wrapper">
                @if (session('status'))
                    <p class="login_form_status">{{ session('status') }}</p>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                @csrf
                    <div class="form_group_login">
                        <div>
                            <label for="email">{{ __('E-Mail Address') }}</label>
                        </div>
                        <div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="soupcultere-email" class="@error('email') is_invalid @enderror">
                        </div>
                    </div>
                    <div class="form_group_login" id="login_buttons_row">
                        <div></div>
                        <div>
                            <button type="submit">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
