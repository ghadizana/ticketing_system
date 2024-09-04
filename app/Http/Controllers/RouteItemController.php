<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRouteItemRequest;
use App\Models\RouteGroup;
use App\Models\RouteItem;
use App\Services\RouteItemService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class RouteItemController extends Controller
{
    public function index(Request $request, RouteGroup $route)
    {
        $routeItems = $route->items()
            ->when(!blank($request->search), function ($query) use ($request) {
                return $query
                    ->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('permission_name', 'like', '%' . $request->search . '%');
            })
            ->orderBy('name')
            ->paginate(10);
        $permissions = Permission::orderBy('name')->get();
        $routes = Route::getRoutes();

        return view('master.route.routeItem.index', compact('routeItems', 'route', 'permissions', 'routes'));
    }

    public function store(StoreRouteItemRequest $request, RouteGroup $route, RouteItemService $routeItemService)
    {
        RouteItem::create(array_merge(
            $request->validated(),
            array(
                'route_group_id' => $route->id,
                'status' => !blank($request->status) ? true : false,
                'position' => $route->items()->max('position') + 1,
            )
        ));

        return redirect()->back();
        // return $routeItemService->create($request, $route)
        // ? back()->with('success', 'Route item has been created successfully')
        // : back()->with('failed', 'Route item was not been created successfully');
    }
}
