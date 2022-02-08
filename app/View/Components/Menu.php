<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
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

    /**
     * @return View
     */
    public function render(): View
    {
        $categories = Category::query()->whereNull('parent_id')->with('children')->get();

        return view('components.menu', compact('categories'));
    }
}
