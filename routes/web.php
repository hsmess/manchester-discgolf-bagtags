<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Bagtag;
use App\Http\Resources\Bagtag as BagtagResource;
use App\Http\Resources\User as UserResource;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    ray(Bagtag::all());
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'tags' => BagtagResource::collection(Bagtag::all()),
        'users' => UserResource::collection(\App\Models\User::where('paid_2021',true)->get()->sortBy('name'))
    ]);
});
//Route::redirect('/','/register');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/buy', function () {
    return Inertia::render('Pay');
})->name('buy');
