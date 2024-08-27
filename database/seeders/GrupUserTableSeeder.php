<?php

namespace Database\Seeders;

use App\Models\AksesMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grup_users')->insert([
            [
                'grupUser' => 'Direksi',
                'idGrupUser' => 1,
            ],
            [
                'grupUser' => 'PM/CS',
                'idGrupUser' => 2,
            ],
            [
                'grupUser' => 'PL/CS/EK',
                'idGrupUser' => 3,
            ],
            [
                'grupUser' => 'EDP',
                'idGrupUser' => 4,
            ]
        ]);
    }
}
