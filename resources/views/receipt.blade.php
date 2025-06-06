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
    </style>
@endpush

@section('content')
    <div class="container">
        <h1 class="title">{{ $receipt->name }}</h1>

        <img src="{{ url(sprintf("%s/%s", 'images/receipts', $receipt->code . '.jpg')) }}" alt="{{ $receipt->name }}"
             class="recipe-image">

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

        @if (!empty($receipt->steps))
            <h3>Пошаговый рецепт:</h3>
            <div class="steps">
                <div class="cooking-steps">
                    @foreach (json_decode($receipt->steps, true, 512, JSON_THROW_ON_ERROR) as $index => $stepText)
                        <div class="step">
                            <img src="{{ asset("images/steps/{$receipt->code}/step" . ($index + 1) . ".jpg") }}"
                                 alt="Шаг {{ $index + 1 }}">
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
    </div>
@endsection