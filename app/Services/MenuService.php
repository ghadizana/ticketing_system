<?php

namespace App\Services;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuService
{
    public function create(Request $request): Menu
    {
        return Menu::create(array_merge(
            $request->validated()
        ));
    }

    public function update(Request $request, Menu $menu): Menu|bool
    {
        return $menu->update(array_merge(
            $request->validated()
        ));
    }
}
