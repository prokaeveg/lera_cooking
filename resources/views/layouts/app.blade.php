<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Лера готовит!')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}" />
    {{--    <meta name="theme-color" content="hsl(22, 52%, 96%)">--}}
    <meta name="theme-color" content="hsl(25, 89%, 21%)">
    <link rel="apple-touch-icon" href="{{ url('images/iphone-icon-big.png') }}"/>

    @livewireStyles
    <style>
        @font-face {
            font-family: GraublauWeb;
            src: url({{ url('fonts/NewLetterGothicC.otf') }}) format("opentype");
        }
        @font-face {
            font-family: GraublauWeb;
            font-weight: bold;
            src: url({{ url('fonts/NewLetterGothicC-Bold.otf') }}) format("opentype");
        }
        .title, h1, h2, h3, h4 {
            color: #4b2200;
        }
        body {
            font-family: 'GraublauWeb', serif;
            color: #662e06;
            font-size: 1rem;
        }
        html, body {
            margin: 0;
            padding: 0;
        }
        .background {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url({{ url('images/2.webp') }});
            background-size: auto;
            background-repeat: repeat;
            filter: opacity(50%);
            z-index: -1;
        }
        body {
            overflow: auto;
        }
        h1 {
            font-size: 4vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 5vh;
            padding-top: 2vh; !important;
        }
    </style>

    @stack('styles')
    @livewireScripts
</head>
<body>
<div class="background"></div>
    @yield('content')

    @stack('scripts')
</body>
</html>