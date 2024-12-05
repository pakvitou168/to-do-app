<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return redirect()->route('todos.index');
});

Route::resource('todos', TodoController::class)
    ->except(['show'])
    ->names([
        'index' => 'todos.index',
        'create' => 'todos.create',
        'store' => 'todos.store',
        'edit' => 'todos.edit',
        'update' => 'todos.update',
        'destroy' => 'todos.destroy',
    ]);

Route::patch('/todos/{todo}/toggle', [TodoController::class, 'toggleComplete'])
    ->name('todos.toggle');
