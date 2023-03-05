<?php

namespace App\Controllers;

use CodeIgniter\Database\Migration;


use App\Libraries\UUID;
class Home extends BaseController
{
    public function index()
    {
        
        
        echo UUID::v3('1546058f-5a25-4334-85ae-e68f2a44bbaf', 'SomeRandomString1');
        echo "<br>";
        echo UUID::v3('1546058f-5a25-4334-85ae-e68f2a44bbaf', 'SomeRandomString2');
        echo "<br> V5 <br>";
        echo UUID::v5('1546058f-5a25-4334-85ae-e68f2a44bbaf', 'SomeRandomString1');
        echo "<br>";
        echo UUID::v5('1546058f-5a25-4334-85ae-e68f2a44bbaf', 'SomeRandomString2');
        echo "<br> V4 <br>";
        echo UUID::v4();

        die;
        
        // $forge = \Config\Database::forge();
        // $forge->createDatabase('Generado-mediante-PHP', true);


        return view('welcome_message');
    }
}
