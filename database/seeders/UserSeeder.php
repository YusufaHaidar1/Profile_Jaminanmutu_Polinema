<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
            'id_user' => 1,
            'id_group' => 1,
            'nama' => 'KJM',
            'email' => 'kjm@admin.polinema',
            'no_hp' => '123456',
            'password' => Hash::make('123456')
        ],
        [
            'id_user' => 2,
            'id_group' => 2,
            'nama' => 'KJM',
            'email' => 'kjm@member.polinema',
            'no_hp' => '123456',
            'password' => Hash::make('123456')
        ]
        ];
        DB::table('users')->insert($data);
    }
}
