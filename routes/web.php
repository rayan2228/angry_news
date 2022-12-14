<?php

use App\Http\Controllers\AddUserController;
use App\Http\Controllers\AdminProfile;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

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
// frontend routes 
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/authors', [FrontendController::class, 'authors'])->name('authors');
Route::get('/author/{id}', [FrontendController::class, 'single_author'])->name('author');
Route::get('/search', [FrontendController::class, 'search'])->name('search');
Route::get('/archive', [FrontendController::class, 'archive'])->name('archive');
Route::get('/post_details/{slug}', [FrontendController::class, 'post_details'])->name('post_details');
Route::get('/maintenance', [FrontendController::class, 'maintenance'])->name('maintenance');
Route::resource('/comment',CommentsController::class);


Route::get('/dashboard', function () {
    return view('frontend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(["prefix" => "admin", "middleware" => ["auth:admin"], "as" => "admin."], function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');
    Route::get('/subcategory/{subcategory}', [CategoryController::class, 'subEdit'])->name('subCategory.edit');
    Route::put('/subcategory/{subcategory}', [CategoryController::class, 'subUpdate'])->name('subCategory.update');
    Route::get('/subcategory/trash/{subcategory}', [CategoryController::class, 'subDelete'])->name('subCategory.trash');
    Route::get('/subcategory/restore/{subcategory}', [CategoryController::class, 'subRestore'])->name('subCategory.restore');
    Route::delete('/subcategory/{subcategory}', [CategoryController::class, 'subDestroy'])->name('subCategory.delete');
    Route::get('/category/trash/{category}', [CategoryController::class, 'trash'])->name('category.trash');
    Route::get('/category/restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::resource('category', CategoryController::class);
    Route::get('/profile',  [AdminProfile::class, 'index'])->name('profile.index');
    Route::post('/profile/update/{profile_id}',  [AdminProfile::class, 'update'])->name('profile.update');
    Route::post('/profile/updatepassowrd/{profile_id}',  [AdminProfile::class, 'updatepassowrd'])->name('profile.updatepassowrd');
    Route::post('/post/subcategorylist', [PostController::class, 'getSubCategory'])->name('subcategorylist');
    Route::get('/post/trash/{post}', [PostController::class, 'trash'])->name('post.trash');
    Route::get('/post/restore/{post}', [PostController::class, 'restore'])->name('post.restore');
    Route::resource('post', PostController::class);
    Route::resource('tags', TagsController::class);
    Route::resource('user', AddUserController::class);
});
require __DIR__ . '/backend_auth.php';
