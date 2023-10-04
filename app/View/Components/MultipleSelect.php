<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Database\Eloquent\Model;

class MultipleSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $id,
        public Collection $options,
        public $values,
        public $exclude = [],
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputs.multiple-select');
    }
}
