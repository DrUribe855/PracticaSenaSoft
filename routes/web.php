<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\LoginController;
use App\Http\Controllers\DispatcherController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\OrderController;
use App\Models\Order;

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

// Route::get('/', [LoginController::class, 'index' ]);

Route::get('/', [ DispatcherController::class, 'index' ]);
Route::get('/Store/index', [ StoreController::class, 'index' ]);
Route::get('/Store/generalShow', [ StoreController::class, 'generalShow' ]);

