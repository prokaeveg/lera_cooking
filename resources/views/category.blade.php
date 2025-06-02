<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $category->title }}</title>
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
        body {
            font-family: 'GraublauWeb', serif;
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
            color: #662e06;
            margin-bottom: 5vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 0 16px 32px;
            box-sizing: border-box;
        }

        .recipe-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .recipe-card img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        .recipe-ingredients {
            background-color: #fef2dc;
            padding: 12px 16px;
            font-size: 1.6vh;
            color: #333;
        }

        .recipe-ingredients strong {
            color: #992e00;
        }
    </style>
</head>
<body>
<div class="background"></div>

<h1>{{ $category->name }}</h1>

<div class="container">
{{--    @foreach ($recipes as $recipe)--}}
{{--        <div class="recipe-card">--}}
{{--            <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}">--}}
{{--            <div class="recipe-ingredients">--}}
{{--                <strong>Продукты:</strong> {{ $recipe->ingredients }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
</div>
</body>
</html>