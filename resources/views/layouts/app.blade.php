<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <style>
        html, body {
            background-color: #fff;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            font-size: 1rem;
            color: black;
        }

        .full-height {
            height: 90vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #cda5f3;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .radius-div {
            border-radius: 45px!important;
        }

        .main-div {
            border: 1px solid #cda5f3;
        }

        .info-card__div {
            padding: 1rem 1.25rem 0.50rem 1.25rem;
            color: black;
            border: 1px solid #cda5f3;
            box-shadow: 0 0.425rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }
        /*#D1CAFF*/
        .info-card__div-small {
            padding: 10px 20px;
            margin: 10px 10px 10px 0;
            border: 1px solid #cda5f3;
            border-radius: 75px;
            box-shadow: 0 0.425rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        .header-div {
            padding: 0.75rem 1.25rem;
            margin: 0rem 0rem 1rem 0rem;
            border: 1px solid #cda5f3;
            /*background-color: rgb(209, 226, 255);*/
            box-shadow: 0 0.425rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        .field-input__div {
            border: 1px solid #cda5f3;
            border-radius: 75px;
            font-size: 1rem;
        }

        .form-group {
            color: black;
            font-size: 1rem;
        }

        .row {
            color: black;
        }

        .h2 {
            color: black;
        }

        .form-control {
            color: black;
            font-size: 1rem;
            border: 1px solid #cda5f3;
            border-radius: 75px;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light border rounded-pill container mt-2 border-lavand shadow-sm">
        <div class="container">
            <a class="navbar-brand mb-1" href="{{ url('/') }}">
                <img src="{{ \URL::to('/img/logo8.png') }}" class="logo-small__div" alt="logo"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('login') }}">{{__('Login')}}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('register') }}">{{__('Register')}}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('recipes.index') }}">{{__('Recipes')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('recipes.generate') }}">{{__('Generate dishes')}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right cursor" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('account.index') }}">
                                    {{__('My account')}}
                                </a>
                                <a class="dropdown-item" href="{{ route('products.categories.index') }}">
                                    {{__('My products')}}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{__('Logout')}}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
