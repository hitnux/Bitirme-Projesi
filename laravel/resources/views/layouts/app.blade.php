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
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav>
            <b-navbar>
                <template slot="brand">
                    <b-navbar-item href="{{route('home')}}">
                        <h1 class="title">Arporium</h1>
                    </b-navbar-item>
                </template>
                <template slot="start">
                    @foreach ($data['allProducts'] as $prd)
                        <b-navbar-item href="{{route('urun.show',['urun' => $prd->product_slug])}}">
                            {{$prd->product_title}}
                        </b-navbar-item>
                    @endforeach
                </template>
        
                <template slot="end">
                    <b-navbar-item tag="div">
                        <div class="buttons">
                            <shoppingcard></shoppingcard>
                        </div>
                    </b-navbar-item>
                </template>
            </b-navbar>
        </nav>
        @yield('content')
    </div>

    <style>
        html{
            background-color: white;
            color:#ffffff;
        }
        body{
            color:#ffffff;
        }
        .title{
            font-family: 'Audiowide', cursive;
            font-size: 2.5rem;
            color: black;
            margin:auto;
            text-align:center;
        }
        .container{
            margin:auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 1100px;
        }
        nav{
            background: white;
            width:100%;
            border-bottom: solid 1px #dcdcdc;
        }
        .navbar{
            max-width: 1100px;
            margin:auto;
        }
    </style>
</body>
</html>
