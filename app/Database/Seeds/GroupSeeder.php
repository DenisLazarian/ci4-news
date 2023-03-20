<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $groupsRoles = ["admin", "user", "editor", "reporter"];

        for ($i = 0; $i < count($groupsRoles); $i++) {
            $data = [
                'name' => $groupsRoles[$i],
            ];
            $this->db->table('group')->insert($data);
        }

        
        
        
    }
}
