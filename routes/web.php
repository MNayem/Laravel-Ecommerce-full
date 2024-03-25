<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

//Route::get('/', function () {
    //return view('welcome');
//});


Auth::routes();

/* Frontend Routes Start*/

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function (){
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');

    Route::get('/new-arraivals', 'newArraivals');
    Route::get('/featured-products', 'featuredProducts');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('/cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('/checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);

    Route::get('/orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('/orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);
});

Route::get('/thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankYou']);

/* Frontend Routes End*/

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

/* Row Content */

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
});

/* Categry Routes Start */

Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
//Create Category
Route::get('create_category', [App\Http\Controllers\Admin\CategoryController::class, 'createCategory']);
//Add
Route::post('categoryAdd', [App\Http\Controllers\Admin\CategoryController::class, 'categoryStore']);
//Edit
Route::get('editCategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'categryEdit']);
Route::put('editCategoryProcess/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'categryEditProcess']);
//Delete
Route::get('/deleteCategory/{id}', [App\Http\Controllers\Admin\CategoryController::class,'categoryDelete' ]) ;

/* Category Routes End */

/* Brand Routes Start */

Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

/* Brands Routes End*/

/* Produt Routes Start */

Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function (){
    Route::get('/products', 'index');
    Route::get('/products/create', 'create');
    Route::post('/addProducts', 'storeProduct');
    Route::get('/products/{product}/edit', 'edit');
    Route::put('/products/{product}', 'update');
    Route::get('/products/{product}/delete', 'destroy');

    Route::get('/product-image/{product_image_id}/delete', 'destroyImage');

    Route::post('/product-color/{product_color_id}', 'updateProductColorQty');
    Route::get('/product-color/{product_color_id}/delete', 'deleteProductColorQty');
});

/* Produt Routes End */

/* Color Routes Start */

Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function (){
    Route::get('/colors', 'index');
    Route::get('/colors/create', 'create');
    Route::post('/colors/create', 'store');
    Route::get('/colors/{color}/edit', 'edit');
    Route::put('/colors/{color_id}', 'update');
    Route::get('/colors/{color_id}/delete', 'destroy');
});

/* Color Routes End */

/* Slider Routes Start */

Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function (){
    Route::get('/sliders', 'index');
    Route::get('/sliders/create', 'create');
    Route::post('/sliders/create', 'store');
    Route::get('/sliders/{slider}/edit', 'edit');
    Route::put('/sliders/{slider}', 'update');
    Route::get('/sliders/{slider}/delete', 'destroy');
});

/* Slider Routes End */

/* Orders Control Admin Start */

Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function (){
    Route::get('/ordersAdmin', 'index');
    Route::get('/orderAdmin/{orderId}', 'show');
    Route::put('/orderAdmin/{orderId}', 'updateOrderStatus');

    /* Invoice Routes Start */

    Route::get('/invoice/{orderId}', 'viewInvoice');
    Route::get('/invoice/{orderId}/generate', 'generateInvoice');

    /* Invoice Routes End */
});

/* Orders Control Admin End  */

/* Site Settings Admin Start */

Route::controller(App\Http\Controllers\Admin\SettingController::class)->group(function (){
    Route::get('/site-settings', 'index');
    Route::post('/site-settings', 'store');
});

/* Site Settings Admin End  */
