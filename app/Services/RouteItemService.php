<?php

namespace App\Services;

use App\Models\RouteGroup;
use App\Models\RouteItem;
use Illuminate\Http\Request;

class RouteItemService
{
    public function create(Request $request, RouteGroup $routeGroup): RouteItem
    {
        return RouteItem::create(array_merge(
            $request->validated(),
            array(
                'route_group_id' => $routeGroup->id,
                'status' => !blank($request->status) ? true : false,
                'position' => $routeGroup->items()->max('position') + 1,
            )
        ));
    }

    public function update(Request $request, RouteGroup $routeGroup, RouteItem $routeItem): RouteItem|bool {
        return $routeItem->update(array_merge(
            $request->validated(),
            array(
                'route_group_id' => $routeGroup->id,
                'status' => !blank($request->status) ? true : false
            ),
        ));
    }
}
