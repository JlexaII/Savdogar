{{-- resources/views/advertisements/partials/form_home_garden.blade.php --}}
<div class="form-group">
    <label for="item_type">Тип предмета</label>
    <select id="item_type" name="item_type" class="form-control" required>
        <option value="furniture">Мебель</option>
        <option value="garden">Сад/Огород</option>
        <option value="decor">Предметы интерьера</option>
    </select>
</div>

<div class="form-group">
    <label for="price">Цена</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
</div>
