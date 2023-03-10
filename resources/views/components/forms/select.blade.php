<div class="col-sm-12">
    <div class="form-group">
        <label for="{{ $name }}">{{ $label }}</label>
        <select
            name={{ $name }}
            class="form-control form-control-lg {{ $class }}"
            {{ $attributes }}
        >
            @foreach ($options as $key => $value)
                <option 
                    value="{{ $key }}"
                    {{ $key == $selected ? 'selected' : '' }}
                >{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>