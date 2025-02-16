<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ThuctapController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

    Route::get('/', [ThuctapController::class, 'listThuctap'])->name('listThuctap');
    Route::post('add-thuctap', [ThuctapController::class, 'addPostThuctap'])->name('addPostThuctap');
    Route::put('update-thuctap/{id}', [ThuctapController::class, 'updatePutThuctap'])->name('updatePutThuctap');
    Route::delete('delete-thuctap/{id}', [ThuctapController::class, 'deleteThuctap'])->name('deleteThuctap');

    Route::get('/users', [UserController::class, 'getUsers']);
    Route::post('/users', [UserController::class, 'createUser']);

