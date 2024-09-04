<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon', 'status', 'permission_name', 'position'];
    protected $casts = ['status' => 'boolean'];

    public function items() {
        return $this->hasMany(RouteItem::class);
    }
}
