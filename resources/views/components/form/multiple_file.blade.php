




<div class="form-group">
    <label>{{ isset($title) ? $title : '' }}</label>

    <div class="custom-file">
        <input type="file" multiple class="custom-file-input {{ isset($name) && $errors->has($name) ? 'is-invalid' : '' }}" name="{{ isset($name) ? $name : '' }}">
        <label class="custom-file-label" >{{ isset($title) ? $title : '' }}</label>
    </div>
    @if (isset($name) && $errors->has($name))
        <span class="error invalid-feedback">{{ $errors->first($name) }}</span>
    @endif
</div>
