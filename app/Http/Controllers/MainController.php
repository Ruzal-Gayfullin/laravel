<?php

namespace App\Http\Controllers;


use App\Http\Requests\auth\LogInRequest;
use App\Http\Requests\auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    /**
     * @param RegistrationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Register(RegistrationRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::create($request->validated());
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
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return redirect(route('login'))->with('error','Email or Password is wrong');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function LogOut(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }

}
