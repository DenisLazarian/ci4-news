<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Permission extends Seeder
{
    public function run()
    {
        
        $data = [   // permissos aplicables solo a los menssajes enviados a traves del formulario de contactos.
            [
                'id' => 1,
                'action' => 'create',
                'description' => 'Create',
            ],
            [
                'id' => 2,
                'action' => 'read',
                'description' => 'Read',
            ],
            [
                'id' => 3,
                'action' => 'update',
                'description' => 'Update',
            ],
            [
                'id' => 4,
                'action' => 'delete',
                'description' => 'Delete',
            ],
        ];

        $this->db->table('permission')->insertBatch($data);

        $data = 
        [
            [
                'user_id' => 1,
                'permission_id' => 1,
            ],
            [
                'user_id' => 1,
                'permission_id' => 2,
            ],
            [
                'user_id' => 1,
                'permission_id' => 3,
            ],
            [
                'user_id' => 1,
                'permission_id' => 4,
            ],

        ];

        $this->db->table('user_permission')->insertBatch($data);
        
    }
}
