<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class NewsController extends BaseController
{
    public function index()
    {
        
    }



    public function list(){


        return view("news/layouts/newssections");
        // return view("news/list");
    }
}
