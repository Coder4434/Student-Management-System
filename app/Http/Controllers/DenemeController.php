<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DenemeController extends Controller
{
    public function MyRoute(){
        return view('student.GenelBilgiler');
    }
}
