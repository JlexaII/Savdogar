{{-- resources/views/advertisements/partials/form_for_business.blade.php --}}
<div class="form-group">
    <label for="business_name">Название бизнеса</label>
    <input type="text" id="business_name" name="title" class="form-control" value="{{ old('business_name') }}" required>
</div>

<div class="form-group">
    <label for="business_description">Описание бизнеса</label>
    <textarea id="business_description" name="description" class="form-control" rows="3">{{ old('business_description') }}</textarea>
</div>

<div class="form-group">
    <label for="contact_info">Контактная информация</label>
    <input type="text" id="contact_info" name="address" class="form-control" value="{{ old('contact_info') }}">
</div>

<div class="form-group">
    <label for="price">Цена</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
</div>

<div class="form-group">
    <label for="phone">Телефон</label>
    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
</div>