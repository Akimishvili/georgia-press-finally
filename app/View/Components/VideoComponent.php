<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VideoComponent extends Component
{
    public object | null $videoTitle;
    public object $defaultTitle;
    /**
     * Create a new component instance.
     */
    public function __construct(public object $block, public string $language)
    {
        $this -> defaultTitle = (object)[
            "ka" => "სტატიის ვიდეო კონტენტი",
            "en" =>  "Video Content Of Article",
            "ru" => "Видеоконтент статьи"
        ];
        $this -> videoTitle = $block -> title  ??  $block -> sub_title ?? $this -> defaultTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.video-component');
    }
}
