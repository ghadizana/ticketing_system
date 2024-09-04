<?php

namespace App\Services;

use App\Models\RouteGroup;
use Illuminate\Http\Request;

class RouteGroupService
{
    public function create(Request $request): RouteGroup
    {
        return RouteGroup::create(array_merge(
            $request->validated(),
            array(
                'status' => !blank($request->status) ? true : false,
                'position' => RouteGroup::max('position') + 1
            ),
        ));
    }

    public function update(Request $request, RouteGroup $routeGroup): RouteGroup|bool {
        return $routeGroup->update(array_merge(
            $request->validated(),
            array('status' => !blank($request->status) ? true : false)
        ));
    }
}
