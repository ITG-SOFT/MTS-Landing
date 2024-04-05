<div class="form-group">
    @isset($title)
        <label for="{{ $name }}">{{ $title }}</label>
    @endisset
    <input type="text" name="{{ $name }}"
           class="form-control @error($name) is-invalid @enderror"
           @isset($readonly) readonly @endisset
           id="{{ $name }}" @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
           @if(old($name, $value ?? null) || (isset($value) && $value === 0)) value="{{ old($name, $value ?? null) }}" @endif
    >
</div>
