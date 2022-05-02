<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'contatos'], function () {
    Route::get('', [ContactController::class, 'index'])->name('index_contacts');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('criar-contato', [ContactController::class, 'create'])->name('create_contact');
        Route::post('salvar-contato', [ContactController::class, 'store'])->name('store_contact');

        Route::get('editar-contato/{id}', [ContactController::class, 'edit'])->name('edit_contact');
        Route::put('atualizar-contato/{id}', [ContactController::class, 'update'])->name('update_contact');

        Route::delete('/{id}', [ContactController::class, 'destroy'])->name('delete_contact');
    });
});
