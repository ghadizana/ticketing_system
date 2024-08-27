<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $superadmin = Role::create(['name' => 'Super Admin']);
        $superadmin->givePermissionTo(Permission::all());

        User::factory()->create([
            'nama' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'username' => 'superadmin',
            'password' => '$2y$10$3WGk97cCKMj1eveM96AHOuap.Uj.NK68EVhbzqVsxbNM5yfej7zCy',
        ])->assignRole('Super Admin');
    }
}
