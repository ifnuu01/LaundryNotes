<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectWithIcon extends Component
{
    /**
     * Create a new component instance.
     */
    public $name, $label, $icon, $placeholder;

    public function __construct($name, $label, $icon = '', $placeholder = 'Pilih opsi')
    {
        $this->name = $name;
        $this->label = $label;
        $this->icon = $icon;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.select-with-icon');
    }
}
