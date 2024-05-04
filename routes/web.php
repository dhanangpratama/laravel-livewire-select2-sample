<?php

use App\Http\Controllers\Select2UserListController;
use App\Livewire\Select2;
use Illuminate\Support\Facades\Route;

Route::get('/select2/users', Select2UserListController::class);
Route::get('/', Select2::class);
