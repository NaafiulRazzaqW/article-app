<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function LoginPage()
    {
        return view('loginPage');
    }

    public function RegisterPage()
    {
        return view('registerPage');
    }

    //Register Logic
    public function Register(AuthRequest $request)
    {
        $validated = $request->validated();

        $register = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);

        if (!$register)
            return redirect()->route('registerPage')->withErrors($validated, 'registerError');
        return redirect()->route('loginPage')->with('success', 'Your Account already registered, please login.');
    }

    public function Login(AuthRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!$user)
            return redirect()->route('loginPage')->withErrors('Account Not Registered!');
        $checkpassword = Hash::check($validated['password'], $user->password);
        if (!$checkpassword)
            return redirect()->route('loginPage')->withErrors('Password wrong!');
        session()->put('user', ['name' => $user->name, 'email' => $user->email, 'password' => $user->password]);
        return redirect()->route('articlePage')->with('success', 'Login success');
    }

    public function Logout(Request $request){
        $request->session()->forget('user');
        return redirect()->route('articlePage')->with('success', 'Logout Successfull');
    }
}
