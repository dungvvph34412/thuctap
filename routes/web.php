<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThuctapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
    Route::get('/', [ThuctapController::class, 'listThuctap'])->name('listThuctap');
    Route::get('add-thuctap', [ThuctapController::class, 'addThuctap'])->name('addThuctap');
    Route::post('add-thuctap', [ThuctapController::class, 'addPostThuctap'])->name('addPostThuctap');
    Route::get('update-thuctap/{id}', [ThuctapController::class, 'updateThuctap'])->name('updateThuctap');
    Route::put('update-thuctap/{id}', [ThuctapController::class, 'updatePutThuctap'])->name('updatePutThuctap');
    Route::delete('delete-thuctap/{id}', [ThuctapController::class, 'deleteThuctap'])->name('deleteThuctap');


    

