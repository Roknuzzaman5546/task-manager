<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function index() {
    $tasks = auth('client')->user()->tasks()->latest()->get();
    // dd($tasks);
    return view('client.dashboard', compact('tasks'));
}
}
