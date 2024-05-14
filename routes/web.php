<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos',[App\Http\Controllers\TodoController::class,'index'])->name('view.todos');

Route::get('/todos-create', function () {
    return view('admin.manage-todos.create');
})->name('todos.create');

Route::get('/todos/{todos}/edit',[App\Http\Controllers\TodoController::class,'edit'])->name('todos.edit');




Route::post('/todos-create', [App\Http\Controllers\TodoController::class,'store'])->name('todos.add');
Route::put('/todos/{todos}/update',[App\Http\Controllers\TodoController::class,'update'])->name('todos.update');
Route::delete('/todos/{todos}/delete',[App\Http\Controllers\TodoController::class,'distroy'])->name('todos.delete');

