<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlockComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public string $content;
    public function __construct(public object $block, public string $language)
    {
        if($block -> title) $this -> content = 'title';
        elseif ($block -> sub_title) $this -> content = 'sub title';
        elseif ($block -> description) $this -> content = 'description';
        else $this -> content = 'none';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.block-component');
    }
}
