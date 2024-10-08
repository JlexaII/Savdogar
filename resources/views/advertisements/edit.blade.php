{{-- resources/views/advertisements/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ __('editads.text') }}</h1>
        <form action="{{ route('advertisements.update', $advertisement->id) }}" method="POST" enctype="multipart/form-data" id="edit-form">
            @csrf
            @method('PUT')

            <!-- Заголовок -->
            <div class="mb-3">
                <label for="title" class="form-label">{{ __('editads.text2') }}</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $advertisement->title) }}" required>
                @error('title')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Описание -->
            <div class="mb-3">
                <label for="description" class="form-label">{{ __('messages.opis') }}</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $advertisement->description) }}</textarea>
                @error('description')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Фото -->
            <div class="form-group">
                <label for="images">{{ __('messages.imgload') }}</label>
                <input type="file" id="images" name="images[]" class="form-control" multiple>
                @if ($advertisement->images)
                    @foreach (json_decode($advertisement->images) as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="{{ __('messages.imgload') }}" style="max-width: 200px; margin-top: 10px;">
                    @endforeach
                @endif
            </div>

            <!-- Подкатегория -->
            <div class="mb-3">
                <label for="subcategory_id" class="form-label">{{ __('messages.crob2') }}</label>
                <select name="subcategory_id" id="subcategory_id" class="form-select" required>
                    @foreach ($categories as $category)
                        <optgroup label="{{ __('categories.' . $category->name) }}">
                            @foreach ($category->subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ $subcategory->id == old('subcategory_id', $advertisement->subcategory_id) ? 'selected' : '' }}>
                                    {{ __('categories.' . $subcategory->name) }}
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                @error('subcategory_id')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

             <!-- Адрес -->
             <div class="mb-3">
                <label for="address" class="form-label">{{ __('messages.address') }}</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $advertisement->address) }}">
                @error('address')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Карта -->
            <div class="mb-3">
                <label for="map" class="form-label">{{ __('messages.locate') }}</label>
                <div id="map" style="height: 200px; width: 100%;"></div>
                <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', $advertisement->latitude) }}">
                <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', $advertisement->longitude) }}">
            </div>

            <!-- Цена -->
            <div class="mb-3">
                <label for="price" class="form-label">{{ __('messages.price') }}</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $advertisement->price) }}" step="0.01">
                @error('price')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Телефон -->
            <div class="mb-3">
                <label for="phone" class="form-label">{{ __('messages.tel') }}</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $advertisement->phone) }}" required>
                @error('phone')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Квадратные метры -->
            <div class="mb-3 d-none" id="square_meters_group">
                <label for="square_meters" class="form-label">{{ __('messages.square') }}</label>
                <input type="number" name="square_meters" id="square_meters" class="form-control" value="{{ old('square_meters', $advertisement->square_meters) }}">
                @error('square_meters')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Описание автомобиля -->
            <div class="mb-3 d-none" id="car_description_group">
                <label for="car_description" class="form-label">{{ __('editads.text3') }}</label>
                <input type="text" name="car_description" id="car_description" class="form-control" value="{{ old('car_description', $advertisement->car_description) }}">
                @error('car_description')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ __('editads.text4') }}</button>
        </form>
    </div>
@endsection
