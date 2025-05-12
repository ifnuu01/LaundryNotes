<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputWithIcon extends Component
{
    /**
     * Create a new component instance.
     */
    public $type, $name, $label, $placeholder, $icon, $value;

    public function __construct($type = 'text', $name, $label, $placeholder = '', $icon = '', $value = '')
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->icon = $icon;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.input-with-icon');
    }
}
