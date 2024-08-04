{{-- resources/views/advertisements/partials/form_real_estate.blade.php --}}
<div class="form-group">
    <label for="property_type">Тип недвижимости</label>
    <select id="property_type" name="property_type" class="form-control" required>
        <option value="apartment">Квартира</option>
        <option value="house">Дом</option>
        <option value="land">Участок</option>
    </select>
</div>

<div class="form-group">
    <label for="price">Цена</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
</div>

<div class="form-group">
    <label for="square_meters">Площадь (м²)</label>
    <input type="number" id="square_meters" name="square_meters" class="form-control" value="{{ old('square_meters') }}">
</div>
