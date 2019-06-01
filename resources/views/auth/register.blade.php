@extends('layouts.app')

@section('content')
    <body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf

{{--                                <div class="form-group row">--}}
{{--                                    <label for="name"--}}
{{--                                           class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                                    <div class="col-md-6">--}}
{{--                                        <input id="name" type="text"--}}
{{--                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"--}}
{{--                                               name="name" value="{{ old('name') }}" required autocomplete="name"--}}
{{--                                               autofocus>--}}

{{--                                    @if ($errors->has('name'))--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                                                        <strong>{{ $errors->first('name') }}</strong>--}}
{{--                                                                    </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                </div>--}}


                                {{--                                <div class="form-group row">--}}
                                {{--                                    <div class="col-sm-6 mb-3 mb-sm-0">--}}
                                {{--                                        <input type="text" class="form-control form-control-user"--}}
                                {{--                                               id="exampleFirstName" placeholder="First Name">--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-sm-6">--}}
                                {{--                                        <input type="text" class="form-control form-control-user"--}}
                                {{--                                               id="exampleLastName" placeholder="Last Name">--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="form-group">
                                    <input type="text"
                                           class="form-control form-control-user{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           id="name" placeholder="Name"
                                           name="name" value="{{ old('name') }}" required autocomplete="name">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="email"
                                           class="form-control form-control-user{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           id="exampleInputEmail" placeholder="Email Address"
                                           name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" id="password" name="password"
                                               class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               required placeholder="Password"
                                               autocomplete="new-password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password"
                                               class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password_confirmation" required
                                               id="password-confirm" placeholder="Repeat Password"
                                               autocomplete="new-password">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register') }}
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </body>
@endsection
