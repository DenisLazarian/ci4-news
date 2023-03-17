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

        
        
        // $forge = \Config\Database::forge();
        // $forge->createDatabase('Generado-mediante-PHP', true);


        return view('welcome_message');
    }

    public function capchaPrueba(){ 
        $config = [
            "textColor"=>'#162453',
            // "backColor"=>'#395786',
            // "noiceColor"=>'#162453',
            "imgWidth"=>380,
            "imgHeight"=>140,
            // "fontSize"=>10,
            // "noiceLines"=>40,
            // "noiceDots"=>20,
            "length" =>3,
            
            // "text"=>'hola',
            "expiration"=>5*MINUTE
        ];
        // phpinfo();


        // $testGD = get_extension_funcs("gd"); // Grab function list 
        // if (!$testGD){ 
        //     echo "GD not even installed."; 
        //     exit; 
        // }   
        // echo"<pre>".print_r($testGD,true)."</pre>";

        $timage = new \App\Libraries\Text2Image($config);

        $timage->captcha()->html();

        $timage->toJSON();

        $captcha = json_decode($timage->toJSON());
        d($captcha);

        echo '<img src="data:image/png;base64,' . $timage->toImg64() . '" />';

        
    }
}
