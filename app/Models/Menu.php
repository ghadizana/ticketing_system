<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'idMenu';

    protected $fillable = ['namaMenu', 'baseUrl', 'label', 'status'];
}
