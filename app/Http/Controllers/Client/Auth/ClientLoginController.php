<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientLoginController extends Controller
{
    public function showLoginForm() {
    return view('client.auth.login');
}

public function login(Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::guard('client')->attempt($credentials)) {
        return redirect()->route('client.dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}
}
