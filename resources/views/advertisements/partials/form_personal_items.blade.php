{{-- resources/views/advertisements/partials/form_personal_items.blade.php --}}
<div class="form-group">
    <label for="item_name">Название предмета</label>
    <input type="text" id="item_name" name="item_name" class="form-control" value="{{ old('item_name') }}" required>
</div>

<div class="form-group">
    <label for="price">Цена</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
</div>
