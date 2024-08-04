{{-- resources/views/advertisements/partials/form_animals.blade.php --}}
<div class="form-group">
    <label for="animal_type">Тип животного</label>
    <select id="animal_type" name="animal_type" class="form-control" required>
        <option value="dog">Собака</option>
        <option value="cat">Кошка</option>
        <option value="bird">Птица</option>
        <!-- Другие варианты -->
    </select>
</div>

<div class="form-group">
    <label for="age">Возраст</label>
    <input type="number" id="age" name="age" class="form-control" value="{{ old('age') }}">
</div>

<div class="form-group">
    <label for="price">Цена</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
</div>
