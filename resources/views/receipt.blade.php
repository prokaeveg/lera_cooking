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

        .notes {
            margin-bottom: 20px;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <h1 class="title">{{ $receipt->name }}</h1>

    <img src="{{ url(sprintf("%s/%s", 'images/receipts', $receipt->image)) }}" alt="{{ $receipt->name }}" class="recipe-image">

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

    <div class="notes">
        @livewire('notes', ['receiptCode' => $receipt->code])
    </div>

    @if ($receipt->video)
    <div class="video">
        <iframe width="720" height="405"
            src="https://rutube.ru/play/embed/{{ $receipt->video }}" frameBorder="0"
            allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
        </iframe>
    </div>
    @endif

    @if($receipt->steps_view)
        <div class="steps">
            @include($receipt->steps_view)
        </div>
    @endif
</div>
@endsection