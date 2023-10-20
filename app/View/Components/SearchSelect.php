<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class SearchSelect extends Component
{
    public function __construct(
        public $endpoint,
        public $id,
        public $label,
        public bool $multiple = false,
        public $values = [],
        public $attr = 'name'
    )
    {}

    public function render(): View|Closure|string
    {
        return view('components.inputs.search-select');
    }
}
