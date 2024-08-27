<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Models\Menu;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as FacadesMenu;
use Spatie\Permission\Models\Permission;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menu = Menu::query()
            ->when(!blank($request->search), function ($query) use ($request) {
                return $query
                    ->where('namMenu', 'like', '%' . $request->search . '%')
                    ->orWhere('baseUrl', 'like', '%' . $request->search . '%');
            })
            ->orderBy('namaMenu')
            ->paginate(50);

        $facadesMenus = FacadesMenu::getRoutes();
        $permissions = Permission::orderBy('name')->get();

        return view('master.menu.index', compact('menu', 'facadesMenus', 'permissions'));
    }

    public function store(StoreMenuRequest $request, MenuService $menuService)
    {
        return $menuService->create($request)
            ? back()->with('success', 'Menu has been created successfully.')
            : back()->with('failed', 'Menu was not been created successfully.');
    }

    public function update(StoreMenuRequest $request, Menu $menu, MenuService $menuService)
    {
        return $menuService->update($request, $menu)
            ? back()->with('success', 'Menu has been updated successfully')
            : back()->with('failed', 'Menu was not been updated successfully');
    }

    public function destroy(Menu $menu)
    {
        return $menu->delete()
            ? back()->with('success', 'Menu has been deleted successfully')
            : back()->with('failed', 'Menu was not been deleted successfully');
    }
}
