<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\CategoriesController;
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

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
Route::middleware('auth')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/welcome', function() {
    return view('commons.pages.news', ['title'=>'xxx']);
});

// Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
// Route::middleware('auth')->group(function (){
//     Route::get('/', [HomeController::class, 'index'])->name('home');
// });

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// books
Route::get('books', [BooksController::class, 'index']);
Route::get('books/create', [BooksController::class, 'create']);
Route::get('books/{id}', [BooksController::class, 'show']);
Route::post('books', [BooksController::class, 'store']);

// authors
Route::get('authors', [AuthorsController::class, 'index']);
Route::get('authors/create', [AuthorsController::class, 'create']);
Route::get('authors/{id}', [AuthorsController::class, 'show']);
Route::post('authors', [AuthorsController::class, 'store']);

// publishers
Route::get('publishers', [PublishersController::class, 'index']);
Route::get('publishers/create', [PublishersController::class, 'create']);
Route::get('publishers/{id}', [PublishersController::class, 'show']);
Route::post('publishers', [PublishersController::class, 'store']);

// categories
Route::get('categories', [CategoriesController::class, 'index']);
Route::get('categories/create', [CategoriesController::class, 'create']);
Route::get('categories/{id}', [CategoriesController::class, 'show']);
Route::post('categories', [CategoriesController::class, 'store']);
