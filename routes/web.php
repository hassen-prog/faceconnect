<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


Route::middleware(['auth','user-role:0'])->group(function () {
    Route::get('/user', [App\Http\Controllers\PostController::class, 'index'])->name('user');

// List all posts
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
// Create a new post (show form)
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
// Store a new post
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
// Edit a post (show edit form)
Route::get('/posts/{id}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
// Update a post
Route::put('/posts/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
// Delete a post
Route::delete('/posts/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class , 'show'])->name('posts.show');



Route::get('/profile/create', [App\Http\Controllers\ProfileController::class , 'create'])->name('profile.create');
Route::post('/create', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
Route::get('/profile/{id}/edit', [App\Http\Controllers\ProfileController::class , 'edit'])->name('profile.edit');
Route::post('/profile/{id}/update', [App\Http\Controllers\ProfileController::class , 'update'])->name('profile.update');
Route::delete('/profile/{id}', [App\Http\Controllers\ProfileController::class , 'destroy'])->name('profile.destroy');

Route::get('/comments', [App\Http\Controllers\PostCommentController::class , 'create'])->name('comments.create');
Route::post('/commentsp/{id}', [App\Http\Controllers\PostCommentController::class, 'storee'])->name('comments.storee');
Route::get('/comments/{id}/edit', [App\Http\Controllers\PostCommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{id}', [App\Http\Controllers\PostCommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{id}', [App\Http\Controllers\PostCommentController::class, 'destroy'])->name('comments.destroy');


});

Route::middleware(['auth','isAdmin'])->group(function () {
 Route::get('/admin/posts', [App\Http\Controllers\PostAdminController::class, 'indexPosts'])->name('admin.post');;
Route::delete('/admin/posts/{id}', [App\Http\Controllers\PostAdminController::class, 'deletePost'])->name('admin.deletepost');;
    
Route::get('/admin/profiles', [App\Http\Controllers\ProfileAdminController::class , 'indexProfiles'])->name('admin.profile');;
Route::delete('/admin/profiles/{id}', [App\Http\Controllers\ProfileAdminController::class, 'deleteProfile'])->name('admin.deleteprofile');;
Route::get('/admin/profiles/{id}', [App\Http\Controllers\ProfileAdminController::class , 'showPosts'])->name('admin.profile.posts');;

    });
    


Route::resource('/messages', App\Http\Controllers\MessageController::class);
Route::resource('/chatt', App\Http\Controllers\ConversationController::class);

Route::resource('/commentss', App\Http\Controllers\CommentController::class);
// Skander
Route::middleware(['auth','user-role:0'])->group(function () {


    
});



Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    

    Route::get('', [App\Http\Controllers\AdminController::class, 'index']);

});



