<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/todo/{id?}', [TodoController::class, 'show'])->name('todo.show');
Route::post('/todo/add', [TodoController::class, 'add'])->name('todo.add');
Route::put('/todo/update', [TodoController::class, 'update'])->name('todo.update');
Route::delete('/todo/delete/{id?}', [TodoController::class, 'delete'])->name('todo.delete');
