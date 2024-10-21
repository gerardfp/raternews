<?php

use App\Http\Controllers\ProfileController;
use App\Http\Requests\NoticiaStoreRequest;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/noticias', function () {
    return view('noticias')->with('noticias', Noticia::all());
});

Route::get('/enviar', function() {
    return view('enviar');
});

Route::post('/store', function(NoticiaStoreRequest $noticiaStoreRequest){
    $noticia = new Noticia;
    $noticia->fill($noticiaStoreRequest->validated());

    $noticia->user_id = Auth::id();

    $noticia->save();

    return redirect('/noticias');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
