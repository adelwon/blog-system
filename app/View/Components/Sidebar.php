<?php

namespace App\View\Components;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\View\Component;

class Sidebar extends Component
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
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = $this->getUser();

        return view('components.sidebar', compact('user'));
    }

    private function getUser(): Authenticatable
    {
        return auth()->user();
    }
}
