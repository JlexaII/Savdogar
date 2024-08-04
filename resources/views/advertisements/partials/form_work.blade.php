{{-- resources/views/advertisements/partials/form_work.blade.php --}}
<!-- Обязательные поля -->
<div class="form-group">
    <label for="title">Название</label>
    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
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
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
</div>