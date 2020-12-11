@extends('layouts.app_soupculture')

@section('content')
    <main>
        <div class="center_box">
            <h2>{{ __('Reset Password') }}</h2>
            <div id="login_wrapper">
                <form method="POST" action="{{ route('password.update') }}">
                @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form_group_login">
                        <div>
                            <label for="email">{{ __('E-Mail Address') }}</label>
                        </div>
                        <div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="soupcultere-email" class="@error('email') is_invalid @enderror">
                        </div>
                    </div>
                    @error('email')
                    <p class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                    <div class="form_group_login">
                        <div>
                            <label for="password">{{ __('Password') }}</label>
                        </div>
                        <div>
                            <input id="password" type="password" name="password" required autocomplete="soupcultere-current-password" class="@error('password') is_invalid @enderror">
                        </div>
                    </div>
                    @error('password')
                    <p class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                    <div class="form_group_login">
                        <div>
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        </div>
                        <div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="soupcultere-new-password">
                        </div>
                    </div>

                    <div class="form_group_login" id="login_buttons_row">
                        <div></div>
                        <div>
                            <button type="submit">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
