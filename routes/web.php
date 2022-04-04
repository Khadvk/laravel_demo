<?php

use App\Http\Controllers\User\Auth\UserController;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;
// admin
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\AuthorsController;
use App\Http\Controllers\Admin\PublishersController;
use App\Http\Controllers\Admin\CategoriesController;
// user
use App\Http\Controllers\User\UserBooksController;
use App\Http\Controllers\User\UserAuthorsController;
use App\Http\Controllers\User\UserPublishersController;
use App\Http\Controllers\User\UserCategoriesController;
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
Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','admin.auth.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/home', [AdminController::class,'index'])->name('home');
        Route::get('/', [AdminController::class,'index'])->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::get('/massupdate', [BooksController::class,'massupdate'])->name('massupdate');
        Route::resource('books', BooksController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('authors', AuthorsController::class);
        Route::resource('publishers', PublishersController::class);
    });

});

Route::get("search",[BooksController::class,'search']);
Route::get('books/popup/{id}', [BooksController::class, 'popup'])->name('book.popup');
Route::get('authors/popup/{id}', [AuthorsController::class, 'popup'])->name('author.popup');
Route::get('categories/popup/{id}', [CategoriesController::class, 'popup'])->name('category.popup');
Route::get('publishers/popup/{id}', [PublishersController::class, 'popup'])->name('publisher.popup');

Route::get('books/delete/{id}', [BooksController::class, 'delete'])->name('book.delete');
Route::get('authors/delete/{id}', [AuthorsController::class, 'delete'])->name('author.delete');
Route::get('categories/delete/{id}', [CategoriesController::class, 'delete'])->name('category.delete');
Route::get('publishers/delete/{id}', [PublishersController::class, 'delete'])->name('publisher.delete');

Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','auth.login')->name('login');
          Route::view('/register','auth.register')->name('register');
          Route::post('/create',[UserController::class,'store'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        // Route::view('/home', 'auth.home')->name('home');
        // Route::view('/','auth.home')->name('home');
        Route::get('/home', [UserController::class,'index'])->name('home');
        Route::get('/', [UserController::class,'index'])->name('home');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');

        Route::resource('categories', UserCategoriesController::class)->only('show', 'index');
        Route::resource('authors', UserAuthorsController::class)->only('show', 'index');
        Route::resource('publishers', UserPublishersController::class)->only('show', 'index');
        Route::resource('books', UserBooksController::class)->only('show', 'index');
    });

});

/* User Section 
Route::middleware('web')->group(function () {
    Route::resource('categories', CategoriesController::class)->except('show', 'index');
    Route::resource('authors', AuthorsController::class)->except('show', 'index');
    Route::resource('publishers', PublishersController::class)->except('show', 'index');
    Route::resource('books', BooksController::class)->except('show', 'index');
});

/*
// books
Route::get('books', [BooksController::class, 'index']);
Route::get('books/create', [BooksController::class, 'create'])->middleware('admin');
Route::get('books/{id}', [BooksController::class, 'show']);
Route::post('books', [BooksController::class, 'store']);

// publishers
Route::get('publishers', [PublishersController::class, 'index']);
Route::get('publishers/create', [PublishersController::class, 'create'])->middleware('admin');
Route::get('publishers/{id}', [PublishersController::class, 'show']);
Route::post('publishers', [PublishersController::class, 'store']);


// categories
Route::get('categories', [CategoriesController::class, 'index']);
Route::get('categories/create', [CategoriesController::class, 'create'])
    ->where('name', '[A-Za-z]+')
    ->middleware('admin');

Route::get('categories/record={category:id}', [CategoriesController::class, 'show']);
Route::get('categories/{category:id}/edit', [CategoriesController::class, 'edit'])->middleware('admin');
Route::post('categories', [CategoriesController::class, 'store']);

// Admin Section 
Route::middleware('web')->group(function () {
    Route::resource('categories', CategoriesController::class);
    Route::resource('authors', AuthorsController::class);
    Route::resource('publishers', PublishersController::class);
    Route::resource('books', BooksController::class);
});
*/