@extends('layouts.app')

@section('content')
    <h1>Список заказов</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Создать заказ</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Дата</th>
            <th>ФИО</th>
            <th>Статус</th>
            <th>Итоговая цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->getId() }}</td>
                <td>{{ $order->getFormattedOrderDate() }}</td>
                <td>{{ $order->getCustomerName() }}</td>
                <td>{{ $order->getStatus() }}</td>
                <td>{{ $order->formattedTotal() }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm">Просмотр</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $orders->links() }}

    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">На главную</a>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">К товарам</a>
@endsection
