<?php

namespace App\Http\Controllers;


use App\Http\Requests\auth\LogInRequest;
use App\Http\Requests\auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    /**
     * @param RegistrationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Register(RegistrationRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::create($request->validationData());
        if ($user) {
            Auth::login($user);
            return redirect()->route('home');
        }

        return redirect(route('register'))->with('error','Something went wrong');
    }

    /**
     * @param LogInRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function LogIn(LogInRequest $request)
    {
        $fields = $request->only(['email', 'password']);

        if (Auth::attempt($fields, $request->has('remember'))) {
            return redirect()->route('home');
        }

        return redirect(route('login'))->with('error','Email or Password is wrong');
    }

    public function LogOut()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
