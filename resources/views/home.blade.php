@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h1>Добро пожаловать!</h1>
        <p>Выберите раздел для управления:</p>

        <div class="d-flex justify-content-center gap-4 mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Товары</a>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-lg">Заказы</a>
            <a href="{{ route('orders.create') }}" class="btn btn-success btn-lg">Создать заказ</a>
        </div>
    </div>
@endsection
