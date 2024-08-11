{{-- resources/views/advertisements/partials/form_business_services.blade.php --}}
<div class="form-group">
    <label for="service_type">{{ __('messages.tuslug') }}</label>
    <input type="text" id="service_type" name="title" class="form-control" value="{{ old('service_type') }}" required>
</div>

<div class="form-group">
    <label for="description">{{ __('messages.opis') }}</label>
    <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
</div>

<div class="form-group">
    <label for="phone">{{ __('messages.tel') }}</label>
    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
</div>

<div class="form-group">
    <label for="price">{{ __('messages.price') }}</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
</div>
