{{-- resources/views/advertisements/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.crob') }} "{{ __('categories.' . $category->name) }}"</h1>
    <form action="{{ route('advertisements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Скрытое поле для ID категории -->
        <input type="hidden" name="category_id" value="{{ $category->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <!-- Поле для выбора субкатегории -->
        <div class="form-group">
            <label for="subcategory_id">{{ __('messages.crob1') }}</label>
            <select id="subcategory_id" name="subcategory_id" class="form-control" required>
                <option value="">{{ __('messages.crob2') }}</option>
                @foreach ($category->subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ __('categories.' . $subcategory->name) }}</option>
                @endforeach
            </select>
        </div>

        <!-- Поля формы зависят от категории -->
        @switch($category->name)
            @case('Работа')
                @include('advertisements.partials.form_work')
            @break

            @case('Недвижимость')
                @include('advertisements.partials.form_real_estate')
            @break

            @case('Транспорт')
                @include('advertisements.partials.form_transport')
            @break

            @case('Дом и сад')
                @include('advertisements.partials.form_home_garden')
            @break

            @case('Инструменты')
                @include('advertisements.partials.form_tools')
            @break

            @case('Бизнес и услуги')
                @include('advertisements.partials.form_business_services')
            @break

            @case('Электроника')
                @include('advertisements.partials.form_elektr')
            @break

            @case('Личные вещи')
                @include('advertisements.partials.form_personal_items')
            @break

            @case('Хобби и отдых')
                @include('advertisements.partials.form_hobbies')
            @break

            @case('Животные')
                @include('advertisements.partials.form_animals')
            @break

            @case('Для бизнеса')
                @include('advertisements.partials.form_for_business')
            @break

            @default
                <p>{{ __('messages.crob3') }}.</p>
        @endswitch

        <!-- Поле для загрузки изображений -->
        <div class="form-group">
            <label for="images">{{ __('messages.imgload') }}</label>
            <input type="file" id="images" name="images[]" class="form-control" multiple>
        </div>

        <!-- Адрес -->
        <div class="mb-3">
            <label for="address" class="form-label">{{ __('messages.address') }}</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
            @error('address')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Карта -->
        <div class="mb-3">
            <label for="map" class="form-label">{{ __('messages.locate') }}</label>
            <div id="map" style="height: 400px; width: 100%;"></div>
            <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', '55.7558') }}">
            <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', '37.6173') }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.create') }}</button>
    </form>
@endsection

<style>
    .form-group {
        margin-bottom: 1rem;
    }
</style>
