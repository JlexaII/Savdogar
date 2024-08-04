{{-- resources/views/advertisements/partials/form_hobbies.blade.php --}}
<div class="form-group">
    <label for="hobby_name">Название хобби</label>
    <input type="text" id="hobby_name" name="hobby_name" class="form-control" value="{{ old('hobby_name') }}" required>
</div>

<div class="form-group">
    <label for="price">Цена</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
</div>
