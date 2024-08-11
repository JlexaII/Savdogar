{{-- resources/views/advertisements/partials/form_animals.blade.php --}}
<div class="form-group">
    <label for="animal_type">{{ __('messages.tanimal') }}</label>
    <select id="animal_type" name="title" class="form-control" required>
        <option value="{{ __('messages.hanimal') }}">{{ __('messages.hanimal') }}</option>
        <option value="{{ __('messages.1animal') }}">{{ __('messages.1animal') }}</option>
        <option value="{{ __('messages.2animal') }}">{{ __('messages.2animal') }}</option>
        <!-- Другие варианты -->
    </select>
</div>

<div class="form-group">
    <label for="age">{{ __('messages.ae') }}</label>
    <input type="number" id="age" name="square_meters" class="form-control" value="{{ old('age') }}">
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