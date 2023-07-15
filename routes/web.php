<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;

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
    return redirect('/register');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create')->middleware('auth');

Route::post("/profile", [ProfileController::class, 'store'])->name('profile.store')->middleware(['auth']);

Route::get("/profile/edit/{profile:username}", [ProfileController::class, 'edit'])->name('profile.edit')->middleware(['auth','profile.completed']);

Route::get("/profile/{profile:username}", [ProfileController::class, 'show'])->name('profile.show')->middleware(['auth','profile.completed']);

Route::get('/profile/search/{name}', [ProfileController::class, 'search'])->name('profile.search');


Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware(['auth','profile.completed']);;
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware(['auth','profile.completed']);
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware(['auth','profile.completed']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Route::get('/comments/{postId}', [CommentController::class, 'index'])->name('comments.index');