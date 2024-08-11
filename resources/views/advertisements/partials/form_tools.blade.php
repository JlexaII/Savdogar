{{-- resources/views/advertisements/partials/form_tools.blade.php --}}
<div class="form-group">
    <label for="tool_type">{{ __('messages.tinst') }}</label>
    <select id="tool_type" name="title" class="form-control" required>
        <option value="{{ __('messages.einst') }}">{{ __('messages.einst') }}</option>
        <option value="{{ __('messages.rinst') }}">{{ __('messages.rinst') }}</option>
    </select>
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
