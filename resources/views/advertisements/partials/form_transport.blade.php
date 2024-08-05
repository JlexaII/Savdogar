{{-- resources/views/advertisements/partials/form_transport.blade.php --}}
<div class="form-group">
    <label for="vehicle_type">Тип транспортного средства</label>
    <select id="vehicle_type" name="title" class="form-control" required>
        <option value="Автомобиль">Автомобиль</option>
        <option value="Мотоцикл">Мотоцикл</option>
        <option value="Грузовик">Грузовик</option>
    </select>
</div>

<div class="form-group">
    <label for="make">Марка</label>
    <input type="text" id="make" name="make" class="form-control" value="{{ old('make') }}">
</div>

<div class="form-group">
    <label for="model">Модель</label>
    <input type="text" id="model" name="model" class="form-control" value="{{ old('model') }}">
</div>

<div class="form-group">
    <label for="year">Год выпуска</label>
    <input type="number" id="year" name="year" class="form-control" value="{{ old('year') }}">
</div>

<div class="form-group">
    <label for="price">Цена</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
</div>

<div class="form-group">
    <label for="description">Описание</label>
    <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
</div>

<div class="form-group">
    <label for="phone">Телефон</label>
    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
</div>