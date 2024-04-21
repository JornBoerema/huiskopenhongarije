<?php

use Illuminate\Support\Facades\Route;
use App\Models\House;

Route::get('/', function () {
    return view('home');
});

Route::get('/woningaanbod', function () {
    $houses = House::query()->where("is_published", "=", 1)->get();

    return view('woningaanbod', [ "houses" => $houses ]);
});

Route::get('/woningaanbod/{id}', function ($id) {
    $house = House::find($id);

    return view('woning-details', [ "house" => $house ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
