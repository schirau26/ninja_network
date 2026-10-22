<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ninjacontroller;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ninjas', [Ninjacontroller::class , "index"])->name("ninjas.index");
Route::get('/ninjas/create', [Ninjacontroller::class, "create"])->name("ninjas.create");
Route::get('/ninjas/{ninja}', [Ninjacontroller::class, "show"])->name("ninjas.show");
Route::post('/ninjas', [Ninjacontroller::class, "store"])->name("ninjas.store");
Route::delete('/ninjas/{ninja}', [Ninjacontroller::class, "destroy"])->name("ninjas.destroy");
Route::put('/ninjas/{ninja}', [Ninjacontroller::class, "update"])->name("ninjas.update");
Route::get('/ninjas/{ninja}/edit', [Ninjacontroller::class, "edit"])->name("ninjas.edit");