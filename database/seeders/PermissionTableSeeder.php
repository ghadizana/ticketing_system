<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Master User
        Permission::create(['name' => 'master_user_index']);
        Permission::create(['name' => 'master_user_show']);
        Permission::create(['name' => 'master_user_store']);
        Permission::create(['name' => 'master_user_update']);
        Permission::create(['name' => 'master_user_destroy']);

        // Profile
        Permission::create(['name' => 'profile_edit']);
        Permission::create(['name' => 'profile_update']);
        Permission::create(['name' => 'profile_destroy']);

        // Grup User
        Permission::create(['name' => 'grup_user_index']);
        Permission::create(['name' => 'grup_user_store']);
        Permission::create(['name' => 'grup_user_update']);
        Permission::create(['name' => 'grup_user_destroy']);

        // Menu
        Permission::create(['name' => 'menu_index']);
        Permission::create(['name' => 'menu_store']);
        Permission::create(['name' => 'menu_update']);
        Permission::create(['name' => 'menu_destroy']);

        // Permission - Izin
        Permission::create(['name' => 'permission_index']);
        Permission::create(['name' => 'permission_store']);
        Permission::create(['name' => 'permission_update']);
        Permission::create(['name' => 'permission_destroy']);

        // Proyek
        Permission::create(['name' => 'proyek_index']);
        Permission::create(['name' => 'proyek_store']);
        Permission::create(['name' => 'proyek_update']);
        Permission::create(['name' => 'proyek_destroy']);

        // Mandays
        Permission::create(['name' => 'mandays_index']);
        Permission::create(['name' => 'mandays_store']);
        Permission::create(['name' => 'mandays_update']);
        Permission::create(['name' => 'mandays_destroy']);

        // Tiket
        Permission::create(['name' => 'tiket_index']);
        Permission::create(['name' => 'tiket_create']);
        Permission::create(['name' => 'tiket_user_create']);
        Permission::create(['name' => 'tiket_store']);
        Permission::create(['name' => 'tiket_show']);
        Permission::create(['name' => 'tiket_update']);
        Permission::create(['name' => 'tiket_destroy']);

        // Komentar
        Permission::create(['name' => 'komentar_index']);
        Permission::create(['name' => 'komentar_store']);
        Permission::create(['name' => 'komentar_update']);
        Permission::create(['name' => 'komentar_destroy']);
    }
}
