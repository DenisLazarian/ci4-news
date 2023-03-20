<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PublicmessagesSeeder extends Seeder
{
    public function run()
    {
        $fake = \Faker\Factory::create();
        $data = [
            [
                'id' => 1,
                'user_id' => 1,
                'name'=>"admin Principal",
                'email'=>'admin@admin.com',
                'assumpte' => "Assumpte de prova",
                'body' => "Text de prova",
            ]
        ];
        for ($i=0; $i < count($data); $i++) { 
            $this->db->table('message_contact')->insert($data[$i]);
            
        }

    }
}
