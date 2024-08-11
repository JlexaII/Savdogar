{{-- resources/views/advertisements/partials/form_real_estate.blade.php --}}
<div class="form-group">
    <label for="property_type">{{ __('messages.trs') }}</label>
    <select id="property_type" name="title" class="form-control" required>
        <option value="{{ __('messages.kvrt') }}">{{ __('messages.kvrt') }}</option>
        <option value="{{ __('messages.dom') }}">{{ __('messages.dom') }}</option>
        <option value="{{ __('messages.uchastok') }}">{{ __('messages.uchastok') }}</option>
    </select>
</div>

<div class="form-group">
    <label for="description">{{ __('messages.opis') }}</label>
    <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
</div>

<div class="form-group">
    <label for="price">{{ __('messages.price') }}</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
</div>

<div class="form-group">
    <label for="square_meters">{{ __('messages.square') }}</label>
    <input type="number" id="square_meters" name="square_meters" class="form-control"
        value="{{ old('square_meters') }}">
</div>

<div class="form-group">
    <label for="phone">{{ __('messages.tel') }}</label>
    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
</div>
