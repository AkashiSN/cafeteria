<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuSetController extends Controller
{
    public function menuset(){
        return view('menuset');
    }
}
