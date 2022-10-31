<?php

use App\Http\Controllers\AdminProfile;
use App\Http\Controllers\CategoryController;
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
Route::get('/category', [FrontendController::class, 'category'])->name('category');
Route::get('/post', [FrontendController::class, 'post'])->name('post');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::post('/post/subcategorylist', [PostController::class, 'getSubCategory'])->name('subcategorylist');
    Route::resource('post', PostController::class);
    Route::resource('tags', TagsController::class);
});
require __DIR__ . '/backend_auth.php';
