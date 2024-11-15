<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_group' => 1,
                'name' => 'Admin',
                'description' => 'Administrator'
            ],
            [
                'id_group' => 2,
                'name' => 'Member',
                'description' => 'General User'
            ]
        ];
        DB::table('groups')->insert($data);
    }
}
