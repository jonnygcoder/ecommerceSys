<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');



// Admin ruta
Route::controller(AdminController::class)->group(function(){
    Route::get('/user/logout','destroySesion')->name('user.logout');
    //Route::get('/user/profile','userProfile')->name('user.profile');

});

// Categoría ruta
Route::controller(CategoryController::class)->group(function(){
    Route::get('/all/category','allCategory')->name('all.category');
    
    Route::get('/add/category','addCategory')->name('add.category');
    Route::post('/store/category','storeCategory')->name('store.category');

    Route::get('/edit/category/{id}','editCategory')->name('edit.category');
    //Route::post('/update/category/{id}','updateCategory')->name('update.category');

    Route::get('/delete/category/{id}','deleteCategory')->name('delete.category');
    
});



require __DIR__.'/auth.php';
