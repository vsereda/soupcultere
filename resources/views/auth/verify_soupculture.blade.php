@extends('layouts.app_soupculture')

@section('content')
    <div class="center_box">
        <h2>{{ __('Verify Your Email Address') }}</h2>
        <div id="login_wrapper">
            <div class="verify_message_wrapper">
                @if (session('resent'))
                <h3 class="info-color">{{ __('A fresh verification link has been sent to your email address.') }}</h3>
                @endif
                <h3>{{ __('Before proceeding, please check your email for a verification link.') }}</h3>
                <h3>{{ __('If you did not receive the email') }},</h3>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit">
                        {{ __('click here to request another') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
