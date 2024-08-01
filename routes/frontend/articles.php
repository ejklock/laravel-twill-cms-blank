<?php

use App\Http\Controllers\Frontend\ArticlesController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'as' => 'articles.',
    'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {

    Route::get('/', [ArticlesController::class, 'index'])->name('index');
    Route::get('/{slug}', [ArticlesController::class, 'show'])->name('show');
});
