<?php

use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Client\Auth\ClientLoginController;
use App\Http\Controllers\Client\Auth\ClientRegisterController;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfClient;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', RedirectIfClient::class])->name('dashboard');

Route::middleware(['auth', RedirectIfClient::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest:client')->group(function () {
    Route::get('/client/login', [ClientLoginController::class, 'showLoginForm'])->name('client.login');
    Route::post('/client/login', [ClientLoginController::class, 'login'])->name('client.login.submit');
    Route::get('/client/register', [ClientRegisterController::class, 'showRegisterForm'])->name('client.register');
    Route::post('/client/register', [ClientRegisterController::class, 'register'])->name('client.register.submit');
});

Route::middleware('auth:client')->group(function () {
    Route::get('/client/dashboard', [ClientDashboardController::class, 'index'])->name('client.dashboard');
    Route::post('/client/tasks/{id}/complete', function ($id) {
        $task = \App\Models\Task::where('client_id', auth('client')->id())->findOrFail($id);
        $task->update(['is_complete' => true]);
        return back();
    })->name('client.tasks.complete');
    Route::post('/client/logout', function () {
        Auth::guard('client')->logout();
        return redirect()->route('client.login');
    })->name('client.logout');
});

Route::middleware(['auth', RedirectIfClient::class])->group(function () {
    Route::resource('tasks', TaskController::class);
});

require __DIR__ . '/auth.php';
