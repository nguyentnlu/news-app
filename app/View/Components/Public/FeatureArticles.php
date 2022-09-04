<?php

namespace App\View\Components\Public;

use App\Models\Article;
use Illuminate\View\Component;

class FeatureArticles extends Component
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

    public function getArticle()
    {
        return Article::where('status', Article::ENABLE_STATUS)->latest()->limit(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.public.feature-articles');
    }
}
