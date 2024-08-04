{{-- resources/views/advertisements/partials/form_for_business.blade.php --}}
<div class="form-group">
    <label for="business_name">Название бизнеса</label>
    <input type="text" id="business_name" name="business_name" class="form-control" value="{{ old('business_name') }}" required>
</div>

<div class="form-group">
    <label for="business_description">Описание бизнеса</label>
    <textarea id="business_description" name="business_description" class="form-control" rows="3">{{ old('business_description') }}</textarea>
</div>

<div class="form-group">
    <label for="contact_info">Контактная информация</label>
    <input type="text" id="contact_info" name="contact_info" class="form-control" value="{{ old('contact_info') }}">
</div>
