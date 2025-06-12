@extends('layouts.app')

@section('content')
    <h1>Заказ #{{ $order->getId() }}</h1>

    <div class="mb-3">
        <strong>ФИО:</strong> {{ $order->getCustomerName() }}
    </div>
    <div class="mb-3">
        <strong>Дата:</strong> {{ $order->getOrderDate()->format('d.m.Y') }}
    </div>
    <div class="mb-3">
        <strong>Статус:</strong> {{ $order->getStatus() }}
    </div>
    <div class="mb-3">
        <strong>Товар:</strong> {{ $order->getProduct()->getTitle() }}
    </div>
    <div class="mb-3">
        <strong>Цена за единицу:</strong> {{ number_format($order->getProduct()->getPrice(), 2) }} ₽
    </div>
    <div class="mb-3">
        <strong>Количество:</strong> {{ $order->getQuantity() }}
    </div>
    <div class="mb-3">
        <strong>Итого:</strong> {{ $order->formattedTotal() }}
    </div>
    <div class="mb-3">
        <strong>Комментарий:</strong> {{ $order->getComment() }}
    </div>

    @if ($order->getStatus() === 'новый')
        <form action="{{ route('orders.updateStatus', $order) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success">Выполнить заказ</button>
        </form>
    @endif

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад</a>
@endsection
