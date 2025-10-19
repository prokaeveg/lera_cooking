@php use App\Models\Category;use App\Models\Receipt; @endphp
@extends('layouts.app')

@push('styles')
    <style>
        .category-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 30px 4px;
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
            font-size: 1.5rem;
            text-align: center;
            color: #331800;
            font-weight: bold;
        }

        @media (min-width: 700px) and (max-width: 1200px) {
            .category-title {
                font-size: 2.3rem;
            }

            .note-item {
                padding: 1rem 1rem;
                margin-bottom: 1rem;
            }
        }
    </style>
@endpush


@section('content')
    <h1>Рецепты от жены</h1>
    @php
        $categories = Category::query()
            ->orderBy('sort')
            ->get();
//        $randomReceipt =  Receipt::inRandomOrder()->limit(1)->get()->first();
    @endphp

    <div class="category-container">
        @foreach ($categories as $category)
            @include('components.categories', [
                'title' => $category->name,
                'image' =>  url(sprintf("%s/%s", 'images/categories', $category->image)),
                'url' => route('category', ['code' => $category->code])
            ])
        @endforeach
{{--        @include('components.categories', [--}}
{{--            'title' => 'Случайный рецепт',--}}
{{--            'image' =>  url('images/categories/random.png'),--}}
{{--            'url' => route('receipt', ['code' => $randomReceipt->code])--}}
{{--        ])--}}
    </div>
@endsection