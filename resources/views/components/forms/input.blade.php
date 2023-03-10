<div class="col-sm-12">
    <div class="form-group">
        <label for="{{ $name }}">{{ $label }}</label>
        <input 
            type="{{ $type }}"
            class="form-control form-control-lg"
            placeholder="{{ $placeholder }}"
            name="{{ $name }}"
            autocomplete="off"
            {{ $attributes }}
        >
    </div>
</div>