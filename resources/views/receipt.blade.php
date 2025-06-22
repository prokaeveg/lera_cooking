@extends('layouts.app')

@section('title', $receipt->name)

@push('styles')
    <style>
        .container {
            max-width: 90%;
            margin: 0 auto;
        }

        .title {
            font-size: 2rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .recipe-image {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 1.5rem;
        }

        .ingredients {
            background-color: #fef2e6;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .ingredients h3 {
            margin-top: 0;
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
            background-color: #fef2e6;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .notes {
            margin-bottom: 20px;
        }

        .step {
            margin-bottom: 2rem;
        }

        .step img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }

        .step-text {
            line-height: 1.6;
        }

        .step-number {
            color: #4b2200;
            font-weight: bold;
        }

        .step-divider {
            border: none;
            height: 2px;
            background: #662e06;
            opacity: 30%;
            margin: 2rem 0;
        }
        .receipt-container {
            margin-bottom: 30px;
        }
        .receipt-link {
            text-decoration: none;
            color: #662e06;
        }

        .recipe-content {
            font-family: 'GraublauWeb', serif;
            font-size: 1.2rem;
            line-height: 1.6;
            color: #4b2200;
            max-width: 800px;
        }

        .receipt-content-item {
            background-color: #fef2e6;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .recipe-content h1,
        .recipe-content h2,
        .recipe-content h3,
        .recipe-content h4 {
            font-family: 'GraublauWeb', serif;
            color: #4b2200;
            margin-top: 0.8rem;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .recipe-content h1 {
            font-size: 2rem;
            border-bottom: 2px solid #4b2200;
            padding-bottom: 0.3rem;
        }

        .recipe-content h2 {
            font-size: 1.6rem;
            padding-left: 0.5rem;
        }

        .recipe-content h3 {
            font-size: 1.3rem;
            font-weight: bold;
        }

        .recipe-content h4 {
            font-size: 1.1rem;
            font-style: italic;
        }

        .recipe-content p {
            margin-bottom: 1rem;
        }

        .recipe-content ul {
            margin-bottom: 1rem;
        }

        .recipe-content ul {
            list-style-type: disc;
        }

        .recipe-content li {
            margin-bottom: 0.4rem;
            padding-left: 0.3rem;
        }

        .recipe-content strong {
            color: #2e1200;
            font-weight: bold;
        }

        .recipe-content em {
            font-style: italic;
            color: #5c2c00;
        }

        .recipe-content blockquote {
            margin: 1.5rem 0;
            padding: 0.7rem 1.2rem;
            background-color: #fdf8f3;
            border-left: 4px solid #a65b2d;
            color: #3b1a00;
            font-style: italic;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <h1 class="title">{{ $receipt->name }}</h1>

        <img src="{{ url(sprintf("%s/%s", 'images/receipts', $receipt->code . '.jpg')) }}" alt="{{ $receipt->name }}"
             class="recipe-image">

        @if(!$receipt->ingredients->isEmpty())
            <div class="ingredients">
                <h3>Ингредиенты:</h3>
                @foreach ($receipt->ingredients as $ingredient)
                    <div class="ingredient-item">
                        @if ($ingredient->pivot->amount)
                            {{ $ingredient->name }} - {{ $ingredient->pivot->amount }}
                        @else
                            {{ $ingredient->name }}
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        @if(!$receipt->notes->isEmpty())
            <div class="notes">
                @include('components.notes', ['notes' => $receipt->notes])
            </div>
        @endif

        @if ($receipt->video)
            <h3>Видео рецепт:</h3>
            <div class="video">
                <iframe width="720" height="405"
                        src="https://rutube.ru/play/embed/{{ $receipt->video }}" frameBorder="0"
                        allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
                </iframe>
            </div>
        @endif

        @if (!empty($receipt->steps) && ($steps = json_decode($receipt->steps, true, 512, JSON_THROW_ON_ERROR)) && count($steps) > 0)
            <h3>Пошаговый рецепт:</h3>
            <div class="steps">
                <div class="cooking-steps">
                    @foreach ($steps as $index => $stepText)
                        <div class="step">
                            @if(file_exists(public_path("images/steps/{$receipt->code}/step" . ($index + 1) . ".jpg")))
                                <img src="{{ asset("images/steps/{$receipt->code}/step" . ($index + 1) . ".jpg") }}"
                                     alt="Шаг {{ $index + 1 }}">
                            @endif
                            <div class="step-text">
                                <span class="step-number">Шаг {{ $index + 1 }}.</span> {{ $stepText }}
                            </div>
                        </div>
                        @if (!$loop->last)
                            <hr class="step-divider">
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
        @if($receipt->html)
            <div class="recipe-content">
                @php
                    echo $receipt->html;
                @endphp
            </div>
        @endif
        @if($receipt->source)
            <h3>Оригинальный рецепт:</h3>
            <div class="receipt-container">
                <a class="receipt-link" href="{{ $receipt->source }}" target="_blank">{{ $receipt->source }}</a>
            </div>
        @endif
    </div>
@endsection