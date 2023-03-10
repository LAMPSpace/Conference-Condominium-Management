{{-- Component buton blade bootstrap 4 --}}
<button
    type="{{ $type }}"
    class="btn btn-{{ $color }} btn-{{ $size }} {{ $class }}"
    {{ $attributes }}
>
    {{ $label }}
</button>