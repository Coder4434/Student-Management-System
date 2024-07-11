<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminrequest;
use App\Models\kullaniciadmins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class adminloginController extends Controller
{
    public function AdminLogin()
    {
        return view('auth.Adminlogin');
    }

   
}

