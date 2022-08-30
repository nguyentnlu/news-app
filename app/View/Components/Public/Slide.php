<?php

namespace App\View\Components\Public;

use Illuminate\View\Component;

class Slide extends Component
{
    public $key;
    public $items;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($key = null, $items = [])
    {
        $this->key = $key;
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.public.slide');
    }
}
