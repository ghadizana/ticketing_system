<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRouteGroupRequest;
use App\Models\RouteGroup;
use App\Services\RouteGroupService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RouteGroupController extends Controller
{
    public function index(Request $request)
    {
        $routeGroups = RouteGroup::query()
            ->when(!blank($request->search), function ($query) use ($request) {
                return $query
                    ->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('permission_name', 'like', '%' . $request->search . '%');
            })
            ->orderBy('name')
            ->paginate(10);

        $permissions = Permission::orderBy('name')->get();

        return view('master.route.index', compact('routeGroups', 'permissions'));
    }

    public function store(StoreRouteGroupRequest $request, RouteGroupService $routeGroupService)
    {
        return $routeGroupService->create($request)
        ? back()->with('success', 'Route group has been created successfully')
        : back()->withErrors($request)->withInput();
    }

    public function update(StoreRouteGroupRequest $request, RouteGroup $route, RouteGroupService $routeGroupService)
    {
        return $routeGroupService->update($request, $route)
        ? back()->with('success', 'Route berhasil diperbaharui')
        : back()->with('failed', 'Route gagal diperbaharui');
    }

    public function destroy(RouteGroup $route)
    {
        return $route->delete()
            ? back()->with('success', 'Route berhasil dihapus')
            : back()->with('failed', 'Route gagal dihapus');
    }
}
