<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
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

Route::get('/',[AgendaController::class, 'index']);
Route::get('/agenda/create',[AgendaController::class, 'create']);
Route::get('/agenda', function() {});
Route::get('/agenda/{id}', function ($id = null) {
    return view('agenda',['id'=>$id]);
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
