{{-- resources/views/advertisements/partials/form_real_estate.blade.php --}}
<div class="form-group">
    <label for="property_type">Тип недвижимости</label>
    <select id="property_type" name="title" class="form-control" required>
        <option value="Квартира">Квартира</option>
        <option value="Дом">Дом</option>
        <option value="Участок">Участок</option>
    </select>
</div>

<div class="form-group">
    <label for="description">Описание</label>
    <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
</div>

<div class="form-group">
    <label for="price">Цена</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
</div>

<div class="form-group">
    <label for="square_meters">Площадь (м²)</label>
    <input type="number" id="square_meters" name="square_meters" class="form-control"
        value="{{ old('square_meters') }}">
</div>

<div class="form-group">
    <label for="phone">Телефон</label>
    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
</div>

<div class="form-group">
    <label for="address">Местоположение адрес недвижимости</label>
    <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required>
</div>