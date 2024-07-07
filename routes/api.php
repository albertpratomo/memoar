<?php

use App\Http\Controllers\TributeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('tributes', TributeController::class)->only([
    'store'
]);
