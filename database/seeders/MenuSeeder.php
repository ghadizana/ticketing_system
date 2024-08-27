<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class MenuSeeder extends Seeder
{
    // Menu - Menu Item
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        Menu::insert([
            [
                'baseUrl' => 'masterUser.index',
                'namaMenu' => 'master_user_index',
            ],
            [
                'baseUrl' => 'masterUser.show',
                'namaMenu' => 'master_user_show',
            ],
            [
                'baseUrl' => 'masterUser.store',
                'namaMenu' => 'master_user_store',
            ],
            [
                'baseUrl' => 'masterUser.update',
                'namaMenu' => 'master_user_update',
            ],
            [
                'baseUrl' => 'masterUser.destroy',
                'namaMenu' => 'master_user_destroy',
            ]
        ]);

        Menu::insert([
            [
                'baseUrl' => 'profile.edit',
                'namaMenu' => 'profile_edit',
            ],
            [
                'baseUrl' => 'profile.update',
                'namaMenu' => 'profile_update',
            ],
            [
                'baseUrl' => 'profile.destroy',
                'namaMenu' => 'profile_destroy',
            ]
        ]);

        Menu::insert([
            [
                'baseUrl' => 'grupUser.index',
                'namaMenu' => 'grup_user_index',
            ],
            [
                'baseUrl' => 'grupUser.store',
                'namaMenu' => 'grup_user_store',
            ],
            [
                'baseUrl' => 'grupUser.update',
                'namaMenu' => 'grup_user_update',
            ],
            [
                'baseUrl' => 'grupUser.destroy',
                'namaMenu' => 'grup_user_destroy',
            ]
        ]);

        Menu::insert([
            [
                'baseUrl' => 'menu.index',
                'namaMenu' => 'menu_index',
            ],
            [
                'baseUrl' => 'menu.store',
                'namaMenu' => 'menu_store',
            ],
            [
                'baseUrl' => 'menu.update',
                'namaMenu' => 'menu_update',
            ],
            [
                'baseUrl' => 'menu.destroy',
                'namaMenu' => 'menu_destroy',
            ],
        ]);

        Menu::insert([
            [
                'baseUrl' => 'permission.index',
                'namaMenu' => 'permission_index',
            ],
            [
                'baseUrl' => 'permission.store',
                'namaMenu' => 'permission_store',
            ],
            [
                'baseUrl' => 'permission.update',
                'namaMenu' => 'permission_update',
            ],
            [
                'baseUrl' => 'permission.destroy',
                'namaMenu' => 'permission_destroy',
            ],
        ]);

        Menu::insert([
            [
                'baseUrl' => 'proyek.index',
                'namaMenu' => 'proyek_index',
            ],
            [
                'baseUrl' => 'proyek.store',
                'namaMenu' => 'proyek_store',
            ],
            [
                'baseUrl' => 'proyek.update',
                'namaMenu' => 'proyek_update',
            ],
            [
                'baseUrl' => 'proyek.destroy',
                'namaMenu' => 'proyek_destroy',
            ],
        ]);

        Menu::insert([
            [
                'baseUrl' => 'mandays.index',
                'namaMenu' => 'mandays_index',
            ],
            [
                'baseUrl' => 'mandays.store',
                'namaMenu' => 'mandays_store',
            ],
            [
                'baseUrl' => 'mandays.update',
                'namaMenu' => 'mandays_update',
            ],
            [
                'baseUrl' => 'mandays.destroy',
                'namaMenu' => 'mandays_destroy',
            ],
        ]);

        Menu::insert([
            [
                'baseUrl' => 'tiket.index',
                'namaMenu' => 'tiket_index',
            ],
            [
                'baseUrl' => 'tiket.create',
                'namaMenu' => 'tiket_create',
            ],
            [
                'baseUrl' => 'userTiket.create',
                'namaMenu' => 'tiket_user_create',
            ],
            [
                'baseUrl' => 'tiket.store',
                'namaMenu' => 'tiket_store',
            ],
            [
                'baseUrl' => 'tiket.show',
                'namaMenu' => 'tiket_show',
            ],
            [
                'baseUrl' => 'tiket.update',
                'namaMenu' => 'tiket_update',
            ],
            [
                'baseUrl' => 'tiket.destroy',
                'namaMenu' => 'tiket_destroy',
            ],
        ]);

        Menu::insert([
            [
                'baseUrl' => 'komentar.index',
                'namaMenu' => 'komentar_index',
            ],
            [
                'baseUrl' => 'komentar.store',
                'namaMenu' => 'komentar_store',
            ],
            [
                'baseUrl' => 'komentar.update',
                'namaMenu' => 'komentar_update',
            ],
            [
                'baseUrl' => 'komentar.destroy',
                'namaMenu' => 'komentar_destroy',
            ],
        ]);
    }
}
