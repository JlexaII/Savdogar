{{-- resources/views/advertisements/partials/form_work.blade.php --}}
<div class="form-group">
    <label for="job_title">Название вакансии</label>
    <input type="text" id="job_title" name="job_title" class="form-control" value="{{ old('job_title') }}" required>
</div>

<div class="form-group">
    <label for="company">Компания</label>
    <input type="text" id="company" name="company" class="form-control" value="{{ old('company') }}">
</div>

<div class="form-group">
    <label for="salary">Зарплата</label>
    <input type="number" id="salary" name="salary" class="form-control" value="{{ old('salary') }}" step="0.01">
</div>
