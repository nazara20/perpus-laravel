<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\BookshelfController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    // route user
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}/edit', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    // book route
    Route::get('/book', [BookController::class, 'index'])->name('book.index');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/book/{book}/edit', [BookController::class, 'update'])->name('book.update');
    Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('book.destroy');

    // facility route
    Route::get('/facility', [FacilityController::class, 'index'])->name('facility.index');
    Route::get('/facility/create', [FacilityController::class, 'create'])->name('facility.create');
    Route::post('/facility', [FacilityController::class, 'store'])->name('facility.store');
    Route::get('/facility/{facility}/edit', [FacilityController::class, 'edit'])->name('facility.edit');
    Route::put('/facility/{facility}/edit', [FacilityController::class, 'update'])->name('facility.update');
    Route::delete('/facility/{facility}', [FacilityController::class, 'destroy'])->name('facility.destroy');

    // category route
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}/edit', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // bookshelf route
    Route::get('/bookshelf', [BookshelfController::class, 'index'])->name('bookshelf.index');
    Route::get('/bookshelf/create', [BookshelfController::class, 'create'])->name('bookshelf.create');
    Route::post('/bookshelf', [BookshelfController::class, 'store'])->name('bookshelf.store');
    Route::get('/bookshelf/{bookshelf}/edit', [BookshelfController::class, 'edit'])->name('bookshelf.edit');
    Route::put('/bookshelf/{bookshelf}/edit', [BookshelfController::class, 'update'])->name('bookshelf.update');
    Route::delete('/bookshelf/{bookshelf}', [BookshelfController::class, 'destroy'])->name('bookshelf.destroy');

    // visit route
    Route::get('/visit', [VisitController::class, 'index'])->name('visit.index');
    Route::get('/visit/create', [VisitController::class, 'create'])->name('visit.create');
    Route::post('/visit', [VisitController::class, 'store'])->name('visit.store');
    Route::get('/visit/{visit}/edit', [VisitController::class, 'edit'])->name('visit.edit');
    Route::put('/visit/{visit}/edit', [VisitController::class, 'update'])->name('visit.update');
    Route::delete('/visit/{visit}', [VisitController::class, 'destroy'])->name('visit.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
