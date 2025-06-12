@extends('layouts.app')

@section('content')
    <h1>Создать заказ</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="customer_name" class="form-label">ФИО покупателя</label>
            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Дата заказа</label>
            <input type="date" name="order_date" id="order_date" value="{{ old('order_date', now()->format('Y-m-d')) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Товар</label>
            <select name="product_id" id="product_id" class="form-select" required>
                @foreach ($products as $product)
                    <option value="{{ $product->getId() }}"
                            data-price="{{ $product->getPrice() }}"
                            {{ old('product_id') === $product->getId() ? 'selected' : '' }} >
                            {{ $product->getTitle() }} - {{ $product->formattedPrice() }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Количество</label>
            <input type="number" name="quantity" id="quantity"
                   value="{{ old('quantity', 1) }}" min="1" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea name="comment" id="comment" class="form-control">{{ old('comment') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Создать заказ</button>
    </form>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary mb-3">Назад</a>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInput = document.getElementById('quantity');
        const priceText = document.querySelector('option:checked').dataset.price;

        if (quantityInput && priceText) {
            let basePrice = parseFloat(priceText);
            let total = basePrice * parseInt(quantityInput.value);
            console.log('Total:', total);
        }

        quantityInput.addEventListener('input', function () {
            const selectedOption = document.querySelector('option:checked');
            const price = parseFloat(selectedOption.dataset.price);
            const quantity = parseInt(this.value);
            const total = price * quantity;
            console.log('Общая сумма:', total);
        });
    });
</script>
