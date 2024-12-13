<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/messages', function () {
//     $messages = \App\Models\Message::all();
//     return view('messages', ['messages' => $messages]);
// });
Route::get("/messages", [MessageController::class, 'showMessages'])->name("show");


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Ruta para administradores, a dashboard
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Crea y guarda el formulario del nuevo mensaje
Route::get("/messages/create", [MessageController::class, 'createMessage'])->name("create"); // Formulario
Route::post("/messages/save", [MessageController::class, 'saveMessage'])->name("save");

//Elimina un mensaje
Route::delete("/messages/{id}", [MessageController::class, 'destroyMessage'])->name("destroy");

// Editar y guardar la información de un mensaje
Route::get("/messages/{id}/edit", [MessageController::class, 'editMessage'])->name("edit");
Route::put("/messages/{id}/update", [MessageController::class, 'updateMessage'])->name("update");
