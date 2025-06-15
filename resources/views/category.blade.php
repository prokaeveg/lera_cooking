@extends('layouts.app')

@section('title', $category->name)

@push('styles')
    <style>
        .container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 0 16px 32px;
            box-sizing: border-box;
            align-items: center;
            margin: auto;
        }

        .receipt-link {
            display: block;
            width: 100%;
            text-decoration: none;
            color: inherit;
        }

        .receipt-card {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: #fef2dc;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%; /* растягивать */
        }

        .receipt-img {
            width: 100%;
            aspect-ratio: 4 / 2;
            object-fit: cover;
            display: block;
        }

        .receipt-title {
            font-size: 3vh;
            color: #662e06;
            text-align: center;
            padding: 25px 0 15px;
        }

        .receipt-ingredients {
            padding: 12px 16px;
            font-size: 2vh;
            color: #662e06;
        }

        .receipt-ingredients strong {
            color: #662e06;
        }
    </style>
@endpush

<h1>{{ $category->name }}</h1>

@section('content')
<div class="container">
    @foreach ($receipts as $receipt)
        <a class="receipt-link" href="{{ route('receipt', ['code' => $receipt->code]) }}">
            <div class="receipt-card">
                <img class="receipt-img" src="{{ url(sprintf("%s/%s", 'images/receipts', sprintf("%s.%s", $receipt->code, 'jpg'))) }}" alt="{{ $receipt->name }}">
                <div class="receipt-title">
                    <span>{{ $receipt->name }}</span>
                </div>
                @if($ingredients = $receipt->ingredientsForList())
                    <div class="receipt-ingredients">
                        <strong>Состав:</strong> {{ $ingredients }}
                    </div>
                @endif
            </div>
        </a>
    @endforeach
</div>
@endsection