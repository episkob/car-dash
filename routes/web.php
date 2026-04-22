<?php

use App\Models\Annuncio;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $annunci = Annuncio::latest()->get();
    return view('welcome', compact('annunci'));
});

Route::get('/annunci/{annuncio}', function (Annuncio $annuncio) {
    $annuncio->load('immagini');
    return view('annuncio', compact('annuncio'));
})->name('annunci.show');
