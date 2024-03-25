<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VideoComponent extends Component
{
    public object | null $videoTitle;
    /**
     * Create a new component instance.
     */
    public function __construct(public object $block, public  object $article, public string $language)
    {
        $this -> videoTitle = $block -> title  ??  $block -> sub_title ??  $article -> title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.video-component');
    }
}
