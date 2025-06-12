@extends('layouts.app')

@section('content')
    <h1>{{ $product->getTitle() }}</h1>
    <p><strong>Категория:</strong> {{ $product->getCategory()->getName() }}</p>
    <p><strong>Описание:</strong> {{ $product->getDescription() }}</p>
    <p><strong>Цена:</strong> {{ $product->formattedPrice() }}</p>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад</a>
@endsection
