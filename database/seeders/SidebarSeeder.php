<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SidebarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_menu' => 1,
                'id_group' => 1,
                'level' => 1,
                'parent_id' => NULL,
                'label' => 'Group / Role',
                'link' => NULL,
            ],
            [
                'id_menu' => 2,
                'id_group' => 1,
                'level' => 2,
                'parent_id' => 1,
                'label' => 'Group List',
                'link' => '/admin/group',
            ],
            [
                'id_menu' => 3,
                'id_group' => 1,
                'level' => 1,
                'parent_id' => NULL,
                'label' => 'Sidebar',
                'link' => '/admin/sidebar',
            ],
            [
                'id_menu' => 4,
                'id_group' => 1,
                'level' => 1,
                'parent_id' => NULL,
                'label' => 'Manage User',
                'link' => '/admin/user',
            ],
            [
                'id_menu' => 5,
                'id_group' => 2,
                'level' => 1,
                'parent_id' => NULL,
                'label' => 'Footer',
                'link' => '/member/footer',
            ],
            ];
            DB::table('sidebar_menu')->insert($data);
    }
}
