@extends('layouts.app_soupculture')

@section('content')
    <div class="center_box">
        <h2>{{ __('Register') }}</h2>
        <div id="login_wrapper">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form_group_login">
                    <div>
                        <label for="name">{{ __('Name') }}</label>
                    </div>
                    <div>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="soupcultere-name" class="@error('email') is_invalid @enderror">
                    </div>
                </div>
                @error('name')
                <p class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </p>
                @enderror

                <div class="form_group_login">
                    <div>
                        <label for="email">{{ __('E-Mail Address') }}</label>
                    </div>
                    <div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="soupcultere-email">
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
                        <input id="password" type="password" name="password" required autocomplete="soupcultere-new-password" class="@error('password') is_invalid @enderror">
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
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
                <div class="form_group_login">
                    <div>
                        <p id="social_login_title">Вход через соц. сети:</p>
                    </div>
                    <div></div>
                </div>
                <div class="form_group_login" id="social_login_row">
                    <div></div>
                    <div>
                        <a href="{{url('/facebook/redirect')}}">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                 xml:space="preserve">
                                <path style="fill:#1976D2;"
                                      d="M448,0H64C28.704,0,0,28.704,0,64v384c0,35.296,28.704,64,64,64h384c35.296,0,64-28.704,64-64V64 C512,28.704,483.296,0,448,0z"/>
                                <path style="fill:#FAFAFA;"
                                      d="M432,256h-80v-64c0-17.664,14.336-16,32-16h32V96h-64l0,0c-53.024,0-96,42.976-96,96v64h-64v80h64 v176h96V336h48L432,256z"/>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                            </svg>
                        </a>
                        <a href="{{url('/google/redirect')}}">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                 xml:space="preserve">
                                <path style="fill:#FBBB00;"
                                      d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256	c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456 C103.821,274.792,107.225,292.797,113.47,309.408z"/>
                                <path style="fill:#518EF8;"
                                      d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451 c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535 c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z"/>
                                <path style="fill:#28B446;"
                                      d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512 c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771 c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z"/>
                                <path style="fill:#F14336;"
                                      d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012 c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0 C318.115,0,375.068,22.126,419.404,58.936z"/>
                            </svg>
                        </a>
                        <a href="{{url('/instagram/redirect')}}">
                            <svg enable-background="new 0 0 24 24" height="40" viewBox="0 0 24 24" width="40"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <linearGradient id="SVGID_1_"
                                                gradientTransform="matrix(0 -1.982 -1.844 0 -132.522 -51.077)"
                                                gradientUnits="userSpaceOnUse" x1="-37.106" x2="-26.555"
                                                y1="-72.705"
                                                y2="-84.047">
                                    <stop offset="0" stop-color="#fd5"/>
                                    <stop offset=".5" stop-color="#ff543e"/>
                                    <stop offset="1" stop-color="#c837ab"/>
                                </linearGradient>
                                <path
                                    d="m1.5 1.633c-1.886 1.959-1.5 4.04-1.5 10.362 0 5.25-.916 10.513 3.878 11.752 1.497.385 14.761.385 16.256-.002 1.996-.515 3.62-2.134 3.842-4.957.031-.394.031-13.185-.001-13.587-.236-3.007-2.087-4.74-4.526-5.091-.559-.081-.671-.105-3.539-.11-10.173.005-12.403-.448-14.41 1.633z"
                                    fill="url(#SVGID_1_)"/>
                                <path
                                    d="m11.998 3.139c-3.631 0-7.079-.323-8.396 3.057-.544 1.396-.465 3.209-.465 5.805 0 2.278-.073 4.419.465 5.804 1.314 3.382 4.79 3.058 8.394 3.058 3.477 0 7.062.362 8.395-3.058.545-1.41.465-3.196.465-5.804 0-3.462.191-5.697-1.488-7.375-1.7-1.7-3.999-1.487-7.374-1.487zm-.794 1.597c7.574-.012 8.538-.854 8.006 10.843-.189 4.137-3.339 3.683-7.211 3.683-7.06 0-7.263-.202-7.263-7.265 0-7.145.56-7.257 6.468-7.263zm5.524 1.471c-.587 0-1.063.476-1.063 1.063s.476 1.063 1.063 1.063 1.063-.476 1.063-1.063-.476-1.063-1.063-1.063zm-4.73 1.243c-2.513 0-4.55 2.038-4.55 4.551s2.037 4.55 4.55 4.55 4.549-2.037 4.549-4.55-2.036-4.551-4.549-4.551zm0 1.597c3.905 0 3.91 5.908 0 5.908-3.904 0-3.91-5.908 0-5.908z"
                                    fill="#fff"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
