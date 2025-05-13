<?php

use App\Controllers\HomeController;
use Framework\Routing\Route;

    Route::get('/', [HomeController::class, 'Index']);