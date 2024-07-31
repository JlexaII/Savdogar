<!-- resources/views/advertisements/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Редактировать объявление</h1>
        <form action="{{ route('advertisements.update', $advertisement->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Заголовок -->
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title', $advertisement->title) }}" required>
                @error('title')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Описание -->
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $advertisement->description) }}</textarea>
                @error('description')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Фото -->
            <div class="mb-3">
                <label for="photo" class="form-label">Фото</label>
                <input type="file" name="photo" id="photo" class="form-control">
                @if ($advertisement->images)
                    @foreach (json_decode($advertisement->images) as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Image" class="img-thumbnail"
                            style="max-height: 300px; max-width: 300px;">
                    @endforeach
                @endif
                @error('photo')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Адрес -->
            <div class="mb-3">
                <label for="address" class="form-label">Адрес</label>
                <input type="text" name="address" id="address" class="form-control"
                    value="{{ old('address', $advertisement->address) }}">
                @error('address')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Телефон -->
            <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input type="text" name="phone" id="phone" class="form-control"
                    value="{{ old('phone', $advertisement->phone) }}" required>
                @error('phone')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Квадратные метры -->
            <div class="mb-3">
                <label for="square_meters" class="form-label">Квадратные метры</label>
                <input type="number" name="square_meters" id="square_meters" class="form-control"
                    value="{{ old('square_meters', $advertisement->square_meters) }}">
                @error('square_meters')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Описание автомобиля -->
            <div class="mb-3">
                <label for="car_description" class="form-label">Описание автомобиля</label>
                <input type="text" name="car_description" id="car_description" class="form-control"
                    value="{{ old('car_description', $advertisement->car_description) }}">
                @error('car_description')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Подкатегория -->
            <div class="mb-3">
                <label for="subcategory_id" class="form-label">Подкатегория</label>
                <select name="subcategory_id" id="subcategory_id" class="form-select" required>
                    @foreach ($categories as $category)
                        <optgroup label="{{ $category->name }}">
                            @foreach ($category->subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}"
                                    {{ $subcategory->id == old('subcategory_id', $advertisement->subcategory_id) ? 'selected' : '' }}>
                                    {{ $subcategory->name }}
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                @error('subcategory_id')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Кнопка обновления -->
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
        </form>
    </div>
@endsection
