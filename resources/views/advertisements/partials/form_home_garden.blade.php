{{-- resources/views/advertisements/partials/form_home_garden.blade.php --}}
<div class="form-group">
    <label for="item_type">{{ __('messages.tname') }}</label>
    <select id="item_type" name="title" class="form-control" required>
        <option value="Старое">{{ __('messages.old') }}</option>
        <option value="С ремонтом">{{ __('messages.repair') }}</option>
        <option value="Новое">{{ __('messages.new') }}</option>
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
