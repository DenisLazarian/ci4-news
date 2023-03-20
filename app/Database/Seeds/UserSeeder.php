<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
    public function run()
    {

        $faker = Factory::create("es_ES");
        
        $defaultUsers = [
            [
                'username' => 'admin principal', // porque tendra el prilegio de leer los mensajes de la pagina
                'name' => 'admin',
                'email' => $faker->email(),
                'password' => password_hash('1234', PASSWORD_DEFAULT),
                'id_group' => 1,
            ],
            [
                'username' => 'admin',
                'name' => $faker -> name(),
                'email' => $faker->email(),
                'password' => password_hash('1234', PASSWORD_DEFAULT),
                'id_group' => 1,
            ],
            [
                'username' => 'user',
                'name' => $faker -> name(),
                'email' => $faker->email(),
                'password' => password_hash('1234', PASSWORD_DEFAULT),
                'id_group' => 2,
            ],
            [
                'username' => 'editor',
                'name' => $faker -> name(),
                'email' => $faker->email(),
                'password' => password_hash('1234', PASSWORD_DEFAULT),
                'id_group' => 3,
            ],
            [
                'username' => 'reporter',
                'name' => $faker -> name(),
                'email' => $faker->email(),
                'password' => password_hash('1234', PASSWORD_DEFAULT),
                'id_group' => 2,
            ],
            

        ];



        for ($i = 0 ; $i < count($defaultUsers); $i++) {
            $this->db->table('user')->insert($defaultUsers[$i]);
        }

        $groupModel = new \App\Models\GroupModel();
        $groups = $groupModel->getGroups();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'username' => $faker->userName(),
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => password_hash('1234', PASSWORD_DEFAULT),
                'id_group' => rand(1, count($groups)),
            ];
            $this->db->table('user')->insert($data);
        }
    }
}
