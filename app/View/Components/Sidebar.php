<?php

namespace App\View\Components;

use App\Models\RouteGroup;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $routes = RouteGroup::query()
        ->with('items', function ($query) {
            return $query->where('status', true)->orderBy('position');
        })
        ->where('status', true)
        ->orderBy('position')
        ->get();

        return view('components.sidebar', compact('routes'));
    }
}
