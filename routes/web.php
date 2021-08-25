<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Cast\String_;

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
})->name('welcome.hi')->middleware('auth');;

use App\Http\Controllers\PersonaController;

Route::get('/nombre/{nombre?}', [PersonaController::class, 'mostrarNombre']
)->where('nombre', '[A-Za-zñÑ]+');

Route::get('/numero/{identificacion?}', function ($identificacion = null){
    if (!$identificacion) {
        return "Debe enviar una identificación";
    }
        return "Identificación:" .number_format($identificacion);
})->where('numero', '[0-9a-zA-ZñÑ]+');

Route::get('/Id/{variable?}', function ($variable = null){
    if(is_null($variable)){
        return "Debe enviar una identificación";
    }
    return "Id :".number_format($variable ,0,",",".");
})->where('variable', '[0-9]+');

// use Illuminate\Support\Facades\DB;
// Route::get('/products', function(){
//     $products = DB::table('products')->get();
//     $products
//     return dd($products);

// });

use App\Http\Controllers\ProductController;
Route::get('/products', [ProductController::class, "show"])->name('product.hi');

Route::get('/product/delete/{id}',[ProductController::class, 'delete'])->name('product.delete');

Route::get('/product/form/{id?}',[ProductController::class, 'form'])->name('product.form');

Route::post('/product/save',[ProductController::class, 'save'])->name('product.save');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\BrandController;
Route::get('/brand', [BrandController::class, "show"])->name('brand.hi');

Auth::routes();

Route::get('/brand/delete/{id}',[BrandController::class, 'delete'])->name('productBrand.delete');

Route::get('/brand/form/{id?}',[BrandController::class, 'form'])->name('brand.form');

Route::post('/brand/save',[BrandController::class, 'save'])->name('brand.save');

use App\Http\Controllers\CategoryController;
Route::get('/category', [CategoryController::class, "show"])->name('category.hi');

Auth::routes();

Route::get('/category/delete/{id}',[CategoryController::class, 'delete'])->name('category.delete');

Route::get('/category/form/{id?}',[CategoryController::class, 'form'])->name('category.form');

Route::post('/category/save',[CategoryController::class, 'save'])->name('category.save');
