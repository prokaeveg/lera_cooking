@php use App\Models\Category; @endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}" />
    <title>Лера готовит!</title>
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
        .category-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 50px 4px;
            padding: 16px;
            box-sizing: border-box;
        }
        .category-row {
            text-decoration: none;
            width: 30%;
        }
        .category-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 8px 0;
            width: 100%;
        }
        .category-img {
            width: 70%;
            max-width: 70%;
            aspect-ratio: 1 / 1;
            border-radius: 12px;
            object-fit: cover;
        }
        .category-title {
            margin-top: 15px;
            font-size: 2.2vh;
            text-align: center;
            color: #331800;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <h1>Рецепты от жены</h1>
    @php
        $categories = Category::query()
            ->orderBy('sort')
            ->get();

    @endphp

    <div class="category-container">
        @foreach ($categories as $category)
            @include('components.categories', [
                'title' => $category->name,
                'image' =>  url(sprintf("%s/%s", 'images/categories', $category->image)),
                'url' => route('category', ['code' => $category->code])
            ])
        @endforeach
    </div>
</body>