<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\SearchController;

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

Route::get('/', [MainController::class, 'index'])->name('welcome');
Route::get('/post/{id}/{url}', [PostController::class, 'index'])->name('post');
Route::get('/categoria/{name}', [CategoriaController::class, 'index'])->name('category');
Route::get('/serie/{name}/{id}', [SerieController::class, 'index'])->name('serie');
Route::get('/busqueda', [SearchController::class, 'index'])->name('search');
Route::view('/contactame', 'about_me', [
    'metas' => [
        'title' => '¿Quien soy? | Jordy Santamaria',
        'description' => 'Conoce un poco más sobre mi, soy Ingeniero de Software y alguien que le gustan mucho los videojuegos...',
        'url' => 'https://www.jordysantamaria.com/',
        'image' => 'https://www.jordysantamaria.com/images/logo/wallpaper.jpg',
        'keywords' => 'blog, gameplay, vlog, cursos, tutoriales, courses, videojuegos, programación, angular, php'
    ]
]);

//Auth::routes();
