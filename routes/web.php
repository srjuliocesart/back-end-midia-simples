<?php

use App\Http\Controllers\ShortLinkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', [ShortLinkController::class,'index'])->name('dashboard');
    Route::post('/generate-shorten-link', [ShortLinkController::class,'store'])->name('generate.shorten.link.post');
    Route::get('{code}', [ShortLinkController::class,'shortenLink'])->name('shorten.link');
    Route::get('shortLink/{id}', [ShortLinkController::class,'edit'])->name('shorten.link.edit');
    Route::put('shortLink/{id}', [ShortLinkController::class,'save'])->name('shorten.link.save');
    Route::delete('shortLink/{id}', [ShortLinkController::class,'delete'])->name('shorten.link.delete');
});
