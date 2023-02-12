<?php

namespace App\Controllers;

use CodeIgniter\Database\Migration;


class Home extends BaseController
{
    public function index()
    {
        // $forge = \Config\Database::forge();
        // $forge->createDatabase('Generado-mediante-PHP', true);


        return view('welcome_message');
    }
}
