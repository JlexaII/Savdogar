{{-- resources/views/advertisements/partials/form_tools.blade.php --}}
<div class="form-group">
    <label for="tool_type">Тип инструмента</label>
    <select id="tool_type" name="tool_type" class="form-control" required>
        <option value="power_tool">Электроинструмент</option>
        <option value="hand_tool">Ручной инструмент</option>
    </select>
</div>

<div class="form-group">
    <label for="price">Цена</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
</div>
