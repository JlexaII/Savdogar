{{-- resources/views/advertisements/partials/form_for_business.blade.php --}}
<div class="form-group">
    <label for="business_name">{{ __('messages.tbiz') }}</label>
    <input type="text" id="business_name" name="title" class="form-control" value="{{ old('business_name') }}" required>
</div>

<div class="form-group">
    <label for="business_description">{{ __('messages.obiz') }}</label>
    <textarea id="business_description" name="description" class="form-control" rows="3">{{ old('business_description') }}</textarea>
</div>

<div class="form-group">
    <label for="contact_info">{{ __('messages.cbiz') }}</label>
    <input type="text" id="contact_info" name="address" class="form-control" value="{{ old('contact_info') }}">
</div>

<div class="form-group">
    <label for="price">{{ __('messages.price') }}</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
</div>

<div class="form-group">
    <label for="phone">{{ __('messages.tel') }}</label>
    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
</div>