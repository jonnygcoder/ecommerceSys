<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\OrdenCompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Models\OrdenCompra;

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

// Categoría 
Route::controller(CategoryController::class)->group(function(){
    Route::get('/all/category','allCategory')->name('all.category');
    
    Route::get('/add/category','addCategory')->name('add.category');
    Route::post('/store/category','storeCategory')->name('store.category');

    Route::get('/edit/category/{id}','editCategory')->name('edit.category');
    Route::post('/update/category/{id}','updateCategory')->name('update.category');

    Route::get('/delete/category/{id}','deleteCategory')->name('delete.category');
    
});

// Proveedor
Route::controller(ProveedorController::class)->group(function(){
    Route::get('/all/provider','allProvider')->name('all.provider');
    
    Route::get('/add/provider','addProvider')->name('add.provider');
    Route::post('/store/provider','storeProvider')->name('store.provider');

    Route::get('/edit/provider/{id}','editProvider')->name('edit.provider');
    Route::post('/update/provider/{id}','updateProvider')->name('update.provider');

    Route::get('/delete/provider/{id}','deleteProvider')->name('delete.provider');
    
});


// Productos
Route::controller(ProductoController::class)->group(function(){
    Route::get('/all/product','allProduct')->name('all.product');
    
    Route::get('/add/product','addProduct')->name('add.product');
    Route::post('/store/product','storeProduct')->name('store.product');

    Route::get('/edit/product/{id}','editProduct')->name('edit.product');
    Route::post('/update/product/{id}','updateProduct')->name('update.product');

    Route::get('/delete/product/{id}','deleteProduct')->name('delete.product');
    
});


// Órdenes de compra
Route::controller(OrdenCompraController::class)->group(function(){
    Route::get('/all/orderBuyPen','allOrderBuyPen')->name('all.orderBuyPen');
    Route::get('/all/orderBuyApro','allOrderBuyApro')->name('all.orderBuyApro');
    Route::get('/all/orderBuyCan','allOrderBuyCan')->name('all.orderBuyCan');

    Route::get('/update/orderBuyPen/{id}','updateOrderBuyPen')->name('update.order');
    Route::get('/cancel/orderBuyPen/{id}','cancelOrderBuyPen')->name('cancel.order');

});



Route::controller(MessengerController::class)->group(function(){
    Route::get('/sendMessageWsp','sendMessageWsp')->name('sendMessageWsP');
});


//Route::get('messenger/{phone}', 'App\Http\Controllers\MessengerController@show');
//Route::get('messenger/{phone}', 'App\Http\Controllers\MessengerController@show');



require __DIR__.'/auth.php';
