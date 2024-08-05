{{-- resources/views/advertisements/partials/form_home_garden.blade.php --}}
<div class="form-group">
    <label for="item_type">Тип предмета</label>
    <select id="item_type" name="title" class="form-control" required>
        <option value="Старое">Старое</option>
        <option value="С ремонтом">С ремонтом</option>
        <option value="Новое">Новое</option>
    </select>
</div>

<div class="form-group">
    <label for="description">Описание</label>
    <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
</div>

<div class="form-group">
    <label for="phone">Телефон</label>
    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
</div>

<div class="form-group">
    <label for="price">Цена</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
</div>
