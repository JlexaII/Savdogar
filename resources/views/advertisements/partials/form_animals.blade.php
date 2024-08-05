{{-- resources/views/advertisements/partials/form_animals.blade.php --}}
<div class="form-group">
    <label for="animal_type">Тип животного</label>
    <select id="animal_type" name="title" class="form-control" required>
        <option value="Домашнее">Домашнее</option>
        <option value="Новорожденное">Новорожденное</option>
        <option value="Дикое">Дикое</option>
        <!-- Другие варианты -->
    </select>
</div>

<div class="form-group">
    <label for="age">Возраст</label>
    <input type="number" id="age" name="square_meters" class="form-control" value="{{ old('age') }}">
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