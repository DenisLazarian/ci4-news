<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupPermissionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => 1,
            'permission_id' => '1',
            'group_id' => '1',
        ];

        $this->db->table('group_permission')->insert($data);
    }
}
