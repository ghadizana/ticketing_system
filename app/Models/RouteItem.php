<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'route', 'status', 'permission_name', 'route_group_id', 'position'];
    protected $casts = ['status' => 'boolean'];
}
