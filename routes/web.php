<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Livewire\{LinkPage, LuckyHistory};

Route::get('/', [RegisterController::class, 'showForm']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/link/{uuid}', LinkPage::class)->name('link.page');
Route::get('/link/{uuid}/history', LuckyHistory::class)->name('link.history');
