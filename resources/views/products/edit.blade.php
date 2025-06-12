@extends('layouts.app')

@section('content')
    <h1>Редактировать товар</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" name="title" id="title" value="{{ old('title', $product->getTitle()) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $product->getDescription()) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select name="category_id" id="category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->getId() }}" {{ old('category_id', $product->getCategoryId()) === $category->getId() ? 'selected' : '' }}>
                        {{ $category->getName() }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Цена (рубли)</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->getPrice()) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
