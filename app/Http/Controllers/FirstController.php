<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function show()
    {
        echo __METHOD__;
    }

    public function getId($idishechka)
    {
        echo $idishechka;
    }
}
