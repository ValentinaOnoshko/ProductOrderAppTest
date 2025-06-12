@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h1>Добро пожаловать!</h1>
        <p>Выберите раздел для управления:</p>

        <div class="mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg me-3">Товары</a>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-lg">Заказы</a>
        </div>
    </div>
@endsection
