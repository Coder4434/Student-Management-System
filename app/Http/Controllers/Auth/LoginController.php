<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function showLogin()
    {


        return view('auth.login');
    }

    public function Login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (strpos($email, '@') !== false) {

            $admin = User::where("email", $email)->first();
            if ($admin && Hash::check($password, $admin->password) && $admin->status == 1) {

                Auth::login($admin);

                return redirect()->route("common-infos");
            } else {

                return redirect()->route("login");
            }

        } else {
            $user = User::where("ogrNo", $email)->first();

            if ($user && Hash::check($password, $user->password) && $user->status == 0) {

                Auth::login($user);

                return redirect()->route("Genel-Bilgiler");

            } else {

                return redirect()->route("login");
            }

        }




    }

    public function logout(Request $request){

        if(Auth::check()){
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login');
        }

    }
}
