@extends('layouts.app')

@section('content')
    <h1>Список заказов</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Дата</th>
            <th>ФИО</th>
            <th>Статус</th>
            <th>Итоговая цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $index => $order)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $order->getOrderDate()->format('d.m.Y') }}</td>
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
@endsection
