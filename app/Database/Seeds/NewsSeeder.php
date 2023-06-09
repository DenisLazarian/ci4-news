<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;
use Faker\Factory;

class NewsSeeder extends Seeder
{

    public function run()
    {

        $faker = Factory::create("es_ES");

        $modelUser = new UserModel();

        $users = $modelUser->getReportersEditorsAndAdmins();
        
        for ($i = 1; $i <= 10; $i++) {
            $fakeTitle = $faker -> catchPhrase();

            $data = [
                'titol'             =>$fakeTitle,
                'text'              =>$faker -> paragraph,
                'url'               => str_replace(" ","%",$fakeTitle), 
                'data_publicacio'   =>$faker-> datetime()->format("y-m-d H:m:s"),
                'author_id'         => rand(1, count($users)),
            ];

            
            $this->db->table('wallpaper')->insert($data);
            d($data);
        }

    }

    // public function drop(){
    //     $this->db->table('wallpaper')->delete($data);
    // }
}
