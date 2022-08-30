<?php

namespace App\View\Components\Public;

use App\Models\Article;
use App\Models\Category;
use Illuminate\View\Component;

class Navigation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getMenu()
    {
        return Category::where('status', Article::ENABLE_STATUS)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.public.navigation');
    }
}
