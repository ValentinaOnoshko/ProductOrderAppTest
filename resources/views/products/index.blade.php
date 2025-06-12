@extends('layouts.app')

@section('content')
    <h1>Список товаров</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Добавить товар</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $index => $product)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $product->getTitle() }}</td>
                <td>{{ $product->getCategory()->getName() }}</td>
                <td>{{ number_format($product->getPrice(), 2) }} ₽</td>
                <td>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">Просмотр</a>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
@endsection
