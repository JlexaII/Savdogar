@extends('layouts.app')

@section('content')
    <h1>Создать объявление в категории "{{ $category->name }}"</h1>
    <form action="{{ route('advertisements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Скрытое поле для ID категории -->
        <input type="hidden" name="category_id" value="{{ $category->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <!-- Поле для выбора субкатегории -->
        <div class="form-group">
            <label for="subcategory_id">Субкатегория</label>
            <select id="subcategory_id" name="subcategory_id" class="form-control" required>
                <option value="">Выберите субкатегорию</option>
                @foreach ($category->subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Поля формы зависят от категории -->
        @if ($category->name === 'Работа')
            <div class="form-group">
                <label for="title">Название вакансии</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
        @elseif ($category->name === 'Недвижимость')
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Адрес</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="square">Площадь (кв. м.)</label>
                <input type="number" id="square" name="square" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
        @elseif ($category->name === 'Транспорт')
            <div class="form-group">
                <label for="title">Модель автомобиля</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
        @elseif ($category->name === 'Дом и сад')
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
        @elseif ($category->name === 'Электроника')
            <div class="form-group">
                <label for="title">Название устройства</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
        @elseif ($category->name === 'Личные вещи')
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
        @elseif ($category->name === 'Хобби и отдых')
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
        @elseif ($category->name === 'Животные')
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
        @elseif ($category->name === 'Для бизнеса')
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
        @endif

        <!-- Поле для загрузки изображений -->
        <div class="form-group">
            <label for="images">Загрузите изображения</label>
            <input type="file" id="images" name="images[]" class="form-control" multiple>
        </div>

        <!-- Поле для ввода дополнительной информации, если нужно -->
        <div class="form-group">
            <label for="additional_info">Дополнительная информация</label>
            <textarea id="additional_info" name="additional_info" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Создать объявление</button>
    </form>
@endsection

<style>
.form-group {
    margin-bottom: 1rem;
}
</style>
