<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    {!! Html::style('https://fonts.googleapis.com/css?family=Nunito') !!}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css') !!}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    @stack('head')
    
</head>
<body>
    <div id="app">
        @include('layouts.partials.nav')

        <main class="py-4 container">
            <div class="row">
                <aside class="col-lg-4 col-sm-12">
                    @include('layouts.partials.sidebar')
                </aside>
                <div class="col-lg-8 col-sm-12">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @include('layouts.partials.alert')
    @stack('scripts')
</body>
</html>
