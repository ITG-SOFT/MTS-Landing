<div class="form-group">
    @isset($title)
        <label for="{{ $id ?? $name }}">{{ $title }}</label>
    @endisset
    <input type="number" name="{{ $name }}"
           @isset($max) max="{{ $max }}" @endisset
           @isset($min) min="{{ $min }}" @endisset
           class="form-control @error($name) is-invalid @enderror"
           @isset($readonly) readonly @endisset
           id="{{ $id ?? $name }}" @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
           @if(old($name, $value ?? null)) value="{{ old($name, $value ?? null) }}" @endif
    >
</div>
