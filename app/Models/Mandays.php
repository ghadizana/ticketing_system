<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mandays extends Model
{
    use HasFactory;

    protected $primaryKey = 'idMandays';

    protected $fillable = ['idProyek', 'mandays', 'tahun', 'terpakai'];

    protected $table = 'mandays';

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'idProyek', 'idProyek');
    }

    public function tikets() {
        return $this->hasMany(Tiket::class, 'idMandays');
    }
}
