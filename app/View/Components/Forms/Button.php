<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'button',
        public string $color = 'primary',
        public string $size = 'md',
        public string $label = '',
        public string $icon = '',
        public bool $outline = false,
        public bool $block = false,
        public bool $disabled = false,
        public string $href = '#',
        public string $target = '_self',
        public string $class = ''
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.button');
    }
}
