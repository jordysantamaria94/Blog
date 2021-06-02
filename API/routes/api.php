<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminCategoriaController;
use App\Http\Controllers\Admin\AdminSubcategoriaController;

use App\Http\Controllers\FridaSegurosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([ 'prefix' => 'auth' ], function () {

    Route::post('login', [AuthController::class, 'login']);

    Route::group([ 'middleware' => 'auth:api' ], function() {

        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);

        Route::resources([
            'admin/posts' => AdminPostController::class,
            'admin/categorias' => AdminCategoriaController::class,
            'admin/series' => AdminSubcategoriaController::class
        ]);
    });
});

Route::post('uploadCuestionario', [FridaSegurosController::class, 'uploadCuestionario']);