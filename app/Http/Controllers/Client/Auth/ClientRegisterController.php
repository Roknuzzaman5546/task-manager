<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientRegisterController extends Controller
{
    public function showRegisterForm() {
    return view('client.auth.register');
}

public function register(Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:clients',
        'password' => 'required|confirmed|min:6',
    ]);

    $client = Client::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    Auth::guard('client')->login($client);

    return redirect()->route('client.dashboard');
}
}
