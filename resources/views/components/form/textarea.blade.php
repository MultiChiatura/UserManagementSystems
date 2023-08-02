<div class="form-group">
    <label>{{ isset($title) ? $title : '' }}</label>
    <textarea class="form-control {{ isset($name) && $errors->has($name) ? 'is-invalid' : '' }}"
        name="{{ isset($name) ? $name : '' }}"
        placeholder="{{ isset($title) ? $title : '' }}"
        >{{ isset($value) ? $value : '' }}</textarea>
    @if (isset($name) && $errors->has($name))
        <span class="error invalid-feedback">{{ $errors->first($name) }}</span>
    @endif
</div>
