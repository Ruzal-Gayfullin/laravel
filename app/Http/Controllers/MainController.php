<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function Register(RegistrationRequest $request)
    {

        $user = new User();
        $user->first_name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();
        Auth::login($user);

        return redirect()->route('home');
    }

    public function LogIn(Request $request)
    {
        $email = $request->input('email');
        $user = User::where(['email' => $email])->first();

        $password_is_correct = Hash::check($request->input('password'), $user->password);
//        echo '<pre>';
//        print_r($password);
//        echo '</pre>';
//        die;
        if ($user && $password_is_correct) {
            Auth::login($user);
        }


        return redirect()->route('home');
    }

    public function LogOut()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

}
