{{-- resources/views/advertisements/partials/form_transport.blade.php --}}
<div class="form-group">
    <label for="vehicle_type">{{ __('messages.ttrans') }}</label>
    <select id="vehicle_type" name="title" class="form-control" required>
        <option value="{{ __('messages.autom') }}">{{ __('messages.autom') }}</option>
        <option value="{{ __('messages.moto') }}">{{ __('messages.moto') }}</option>
        <option value="{{ __('messages.gruz') }}">{{ __('messages.gruz') }}</option>
    </select>
</div>

<div class="form-group">
    <label for="make">{{ __('messages.mark') }}</label>
    <input type="text" id="make" name="make" class="form-control" value="{{ old('make') }}">
</div>

<div class="form-group">
    <label for="model">{{ __('messages.tmodel') }}</label>
    <input type="text" id="model" name="model" class="form-control" value="{{ old('model') }}">
</div>

<div class="form-group">
    <label for="year">{{ __('messages.gvip') }}</label>
    <input type="number" id="year" name="year" class="form-control" value="{{ old('year') }}">
</div>

<div class="form-group">
    <label for="price">{{ __('messages.price') }}</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
</div>

<div class="form-group">
    <label for="description">{{ __('messages.opis') }}</label>
    <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
</div>

<div class="form-group">
    <label for="phone">{{ __('messages.tel') }}</label>
    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
</div>