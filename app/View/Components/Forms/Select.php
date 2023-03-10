<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label = '',
        public string $name = '',
        public string $id = '',
        public array $options = [],
        public string $selected = '',
        public string $class = '',
        public string $placeholder = '',
        public bool $disabled = false,
        public bool $multiple = false,
        public bool $required = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }
}
