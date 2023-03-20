<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Install extends Seeder
{
    public function run()
    {
        $this->call('GroupSeeder'); 
        $this->call('UserSeeder');
        $this->call('NewsSeeder');
        $this->call('PublicmessagesSeeder');
        $this->call('Permission');
        $this->call('GroupPermissionSeeder'); 
        // $this->call('NewsSeeder');
    }
}
