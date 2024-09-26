<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;


Route::get('/', function () {
    return redirect()->route('songs.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('songs', SongController::class);
Route::patch('/songs/{song}/toggle-visibility', [SongController::class, 'toggleVisibility'])->name('songs.toggleVisibility');

