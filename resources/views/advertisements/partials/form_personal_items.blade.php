{{-- resources/views/advertisements/partials/form_personal_items.blade.php --}}
<div class="form-group">
    <label for="item_name">{{ __('messages.nname') }}</label>
    <input type="text" id="item_name" name="title" class="form-control" value="{{ old('item_name') }}" required>
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