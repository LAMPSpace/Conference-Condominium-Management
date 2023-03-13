<div class="col-sm-12">
    <div class="form-group">
        <label for="{{ $name }}">{{ $label }}</label>
        <input 
            type="{{ $type }}"
            class="form-control form-control-lg @error($name) is-invalid @enderror"
            placeholder="{{ $placeholder }}"
            name="{{ $name }}"
            autocomplete="off"
            value="{{ !empty($value) ? $value : old($name) }}"
            {{ $attributes }}
        >
        @error($name)
            <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>