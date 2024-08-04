{{-- resources/views/advertisements/partials/form_transport.blade.php --}}
<div class="form-group">
    <label for="vehicle_type">Тип транспортного средства</label>
    <select id="vehicle_type" name="vehicle_type" class="form-control" required>
        <option value="car">Автомобиль</option>
        <option value="motorcycle">Мотоцикл</option>
        <option value="truck">Грузовик</option>
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
