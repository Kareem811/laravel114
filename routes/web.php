<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::view('/form', 'Products.form');
// Route::post('/addproduct', [ProductController::class, 'addproduct'])->middleware(TestMiddleware::class);
// Route::get('/showproducts', [ProductController::class, "showproducts"]);
// Route::get('/products/{productId}', [ProductController::class, 'singleproduct']);
// Route::post('/update/{productId}', [ProductController::class, 'updateproduct']);
// Route::get('/delete/{id}', [ProductController::class, 'delete']);
// Route::get('/products/{id}', [ProductController::class, 'singleproducts']);
// Route::post('/products/update/{id}', [ProductController::class, 'updateproduct']);
// Route::get('/products', [ProductController::class, 'getform']);
// Route::post('/products/add', [ProductController::class, 'addproduct']);
// Route::get('/products/show', [ProductController::class, 'showproducts']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
// Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/user', [UserController::class, 'user']);
});
Route::view('/x', 'users.userform');
