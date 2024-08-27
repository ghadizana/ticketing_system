<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    // Role Permission - Grup User
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $direksi = Role::create(['name' => 'Direksi']);
        $pm = Role::create(['name' => 'PM']);

        $direksi->givePermissionTo(Permission::all());
        $pm->givePermissionTo(['master_user_index', 'menu_index']);

        User::firstWhere('email', 'direksi@gmail.com')->assignRole('Direksi');
        User::firstWhere('email', 'pm@gmail.com')->assignRole('PM');
    }
}
