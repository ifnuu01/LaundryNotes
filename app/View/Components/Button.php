<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public $type, $icon, $text, $color, $width, $asLink, $href, $baseStyle, $dataId;

    public function __construct(
        $text = '',
        $icon = null,
        $color = 'bg-skyBlueDark',
        $width = null,
        $type = 'submit',
        $asLink = false,
        $href = '#',
        $baseStyle = true,
        $dataId = ""
    ) {
        $this->type = $type;
        $this->icon = $icon;
        $this->text = $text;
        $this->color = $color;
        $this->width = $width;
        $this->asLink = $asLink;
        $this->href = $href;
        $this->baseStyle = $baseStyle;
        $this->dataId = $dataId;
    }

    public function render()
    {
        return view('components.button');
    }
}
