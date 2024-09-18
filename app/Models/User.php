<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $fillable = [
        'nama',
        'email',
        'username',
        'password',
        'idProyek',
        'idKaryawan',
        'idDepartment',
        'image',
        'status',
        'statusUser'
    ];

    protected $primaryKey = 'userId';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function proyek() {
        return $this->belongsTo(Proyek::class, 'idProyek', 'idProyek');
    }

    public function komentars() {
        return $this->hasMany(Komentar::class, 'idKomentar', 'idKomentar');
    }

    public function profile() {
        return $this->hasOne(Profile::class, 'userId');
    }

    public function tikets() {
        return $this->hasMany(Tiket::class);
    }
}
