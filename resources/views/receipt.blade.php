<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $recipe->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fffaf5;
            margin: 0;
            padding: 1rem;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .title {
            font-size: 2rem;
            color: #4b2200;
            margin-bottom: 1rem;
            text-align: center;
        }

        .recipe-image {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            margin-bottom: 1.5rem;
        }

        .ingredients {
            background-color: #fef2e6;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: inset 0 0 5px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .ingredients h3 {
            margin-top: 0;
            color: #4b2200;
            font-size: 1.2rem;
        }

        .ingredient-item {
            padding: 0.3rem 0;
            border-bottom: 1px solid #e3d5c6;
        }

        .ingredient-item:last-child {
            border-bottom: none;
        }

        .video {
            margin-bottom: 2rem;
            text-align: center;
        }

        iframe {
            width: 100%;
            height: 315px;
            border-radius: 10px;
            border: none;
        }

        .steps {
            padding: 1rem;
            background-color: #fffdfb;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="title">{{ $recipe->title }}</div>

    <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="recipe-image">

    <div class="ingredients">
        <h3>Ингредиенты:</h3>
        @foreach ($recipe->ingredients as $ingredient)
            <div class="ingredient-item">
                {{ $ingredient->name }} — {{ $ingredient->pivot->amount }}
            </div>
        @endforeach
    </div>

    <div class="video">
        <iframe src="{{ $recipe->video_url }}" allowfullscreen></iframe>
    </div>

    <div class="steps">
        @include($recipe->steps_view)
    </div>

</div>
</body>
</html>