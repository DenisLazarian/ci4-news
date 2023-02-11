<?php

namespace App\Controllers;

use CodeIgniter\Database\Migration;


class Home extends BaseController
{
    public function index()
    {
        
        return view('welcome_message');
    }
}
