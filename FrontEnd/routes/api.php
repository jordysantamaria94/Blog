<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MainController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\CategoriaController;

use App\Http\Controllers\API\Admin\AdminPostController;
use App\Http\Controllers\API\Admin\AdminCategoriaController;
use App\Http\Controllers\API\Admin\AdminSubcategoriaController;

use App\Http\Controllers\API\FridaSegurosController;

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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'signUp']);

Route::get('last-news', [MainController::class, 'lastNews']);
Route::post('post', [PostController::class, 'getPost']);
Route::post('categoria', [CategoriaController::class, 'lastNews']);

Route::middleware('auth:sanctum')->group( function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'user']);

    Route::resources([
        'admin/posts' => AdminPostController::class,
        'admin/categorias' => AdminCategoriaController::class,
        'admin/series' => AdminSubcategoriaController::class
    ]);
});

Route::post('uploadCuestionario', [FridaSegurosController::class, 'uploadCuestionario']);