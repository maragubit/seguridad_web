 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')

<div class="grid">

    <form method="POST" action="{{ route('login') }}" class="form login">
        @csrf
        <header class="login__header">
            <h3 class="login__title">{{ __('auth.Login') }}</h3>
        </header>

        <div class="login__body">

            <div class="form__field">
                <input id="email" type="email"
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       placeholder="{{ __('auth.E-Mail Address') }}"
                       name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert" style="color: #ff0000; font-size: 0.7rem;">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>



            <div class="form__field">
                <input id="password" type="password"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       placeholder="{{ __('auth.Password') }}"
                       name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert" style="color: #ff0000; font-size: 0.7rem;">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form__field" style="text-align: left; margin-top: 1.3rem;">
                <input class="checkbox" type="checkbox" name="remember"
                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('auth.Remember Me') }}
                </label>
            </div>

        </div>

        <footer class="login__footer">
            <div>
                <input type="submit" value="Login" style="width: 100%; margin: auto">
            </div>

            <div style="text-align: center; margin-top: 1.3rem;">
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="#000000"
                     style="width: 1rem; translate: 0 2px;"
                     viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM169.8 165.3c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>

                <a href="{{ route('password.request') }}">
                    {{ __('auth.Forgot Your Password?') }}
                </a>
            </div>

            <div style="text-align: center; margin-top: 1.3rem;">

                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="#000000"
                     style="width: 1rem; translate: 0 2px;"
                     viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                <a href="{{ route('register') }}">
                    Registrarse
                </a>
            </div>

            @include('auth.socialite')

        </footer>

    </form>

</div>

<link href="{{asset('css/login_register_recovery.css') }}" rel="stylesheet">

@endsection