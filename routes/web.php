<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\DiscountController;

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

Route::get('/', [UserController::class, 'index']);

//Admin
//Dashboard
Route::middleware(['isAdmin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Product
    Route::get('admin/products',[ProductController::class,'index'])->name('product.index');
    Route::get('admin/create-product',[ProductController::class,'create'])->name('product.create');
    Route::post('admin/store-product',[ProductController::class,'store'])->name('product.store');
    Route::get('admin/edit-product/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('admin/update-product/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('admin/delete-product/{id}',[ProductController::class,'destroy'])->name('product.delete');
    Route::get('admin/search-product',[ProductController::class,'search'])->name('product.search');
    Route::get('admin/status-product/{id}',[ProductController::class,'status'])->name('product.status');
    Route::get('admin/trending-product/{id}',[ProductController::class,'trending'])->name('product.trending');
    Route::get('admin/add-discount/{id}',[ProductController::class,'add_discount'])->name('product.add_discount');
    Route::post('admin/store-discount/{id}',[ProductController::class,'store_discount'])->name('product.store_discount');
    Route::get('admin/remove-discount/{id}',[ProductController::class,'remove_discount'])->name('product.remove_discount');

    // Category
    Route::get('admin/categories',[CategoryController::class,'index'])->name('category.index');
    Route::get('admin/create-category',[CategoryController::class,'create'])->name('category.create');
    Route::post('admin/store-category',[CategoryController::class,'store'])->name('category.store');
    Route::get('admin/edit-category/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('admin/update-category/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('admin/delete-category/{id}',[CategoryController::class,'destroy'])->name('category.delete');

    // SubCategory
    Route::get('admin/subcategories',[SubcategoryController::class,'index'])->name('subcategory.index');
    Route::get('admin/create-subcategory',[SubcategoryController::class,'create'])->name('subcategory.create');
    Route::post('admin/store-subcategory',[SubcategoryController::class,'store'])->name('subcategory.store');
    Route::get('admin/edit-subcategory/{id}',[SubcategoryController::class,'edit'])->name('subcategory.edit');
    Route::post('admin/update-subcategory/{id}',[SubcategoryController::class,'update'])->name('subcategory.update');
    Route::get('admin/delete-subcategory/{id}',[SubcategoryController::class,'destroy'])->name('subcategory.delete');

    // Discount
    Route::get('admin/discounts',[DiscountController::class,'index'])->name('discount.index');
    Route::get('admin/create-discounts',[DiscountController::class,'create'])->name('discount.create');
    Route::post('admin/store-discounts',[DiscountController::class,'store'])->name('discount.store');
    Route::get('admin/edit-discounts/{id}',[DiscountController::class,'edit'])->name('discount.edit');
    Route::post('admin/update-discounts/{id}',[DiscountController::class,'update'])->name('discount.update');
    Route::get('admin/delete-discounts/{id}',[DiscountController::class,'destroy'])->name('discount.delete');

});


//User
//Index
Route::get('/index', [UserController::class, 'index']);

//Cart
Route::get('/cart', [UserController::class, 'cart']);

//Checkout
Route::post('/checkout', [UserController::class, 'checkout']);

//wishlist
Route::get('/wishlist', [UserController::class, 'wishlist']);

//contact
Route::get('/contact', [UserController::class, 'contact']);

//About
Route::get('/about', [UserController::class, 'about']);

//Submit contact
Route::post('/submit-contact', [UserController::class, 'submit_contact'])->name('submit.contact');

//feedback
Route::get('/feedback', [UserController::class, 'feedback']);
//Submit feedback
Route::post('/submit-feedback', [UserController::class, 'submit_feedback'])->name('submit.feedback');

//Products
Route::get('/products', [UserController::class, 'products']);
Route::get('/products/category/{name}', [UserController::class, 'products_by_categories']);
Route::get('/products/subcategory/{subcategory}', [UserController::class, 'products_by_subcategories']);
Route::get('/products/{category}/{subcategory}', [UserController::class, 'products_by_cat_subcat']);

//contact
Route::get('/product/{id}', [UserController::class, 'product_details']);

//User
Route::get('/user', [UserController::class, 'user_details']);

//Order
Route::get('/orders', [UserController::class, 'order']);

//Update User
Route::post('/update-user-profile', [UserController::class, 'update_user_profile']);
//Disable User Account
Route::post('/disable-user-profile', [UserController::class, 'disable_user_profile']);

//Apis

// cart Api Routes
Route::post('thrift/get-cart',[ApiController::class,'getCartAPI'])->name('cart.getCartAPI');
Route::post('thrift/add-cart',[ApiController::class,'addCartAPI'])->name('cart.addCartAPI');
Route::post('thrift/delete-cart',[ApiController::class,'deleteCartAPI'])->name('cart.deleteCartAPI');
Route::post('thrift/deleteall-cart',[ApiController::class,'deleteAllCartAPI'])->name('cart.deleteAllCartAPI');

Route::get('thrift/getcartcount-wishlist',[ApiController::class,'getCartCountAPI'])->name('cart.getCartCountAPI');
// wishlist api routes
Route::post('thrift/update-add-cart',[ApiController::class,'updateAddCartAPI'])->name('cart.updateAddCartAPI');
Route::post('thrift/update-remove-cart',[ApiController::class,'updateRemoveCartAPI'])->name('cart.updateRemoveCartAPI');

Route::get('thrift/get-wishlist',[ApiController::class,'getWishlistAPI'])->name('cart.getWishlistAPI');
Route::get('thrift/add-wishlist',[ApiController::class,'addWishlistAPI'])->name('cart.addWishlistAPI');
Route::get('thrift/delete-wishlist',[ApiController::class,'deleteWishlistAPI'])->name('cart.deleteWishlistAPI');
// checkout api routes
Route::get('thrift/checkout',[ApiController::class,'checkoutAPI'])->name('cart.checkoutAPI');

//order api routes
Route::post('thrift/order',[ApiController::class,'addOrderAPI'])->name('cart.addOrderAPI');
Route::get('thrift/get-order',[ApiController::class,'getOrderAPI'])->name('order.getOrderAPI');
Route::get('thrift/get-order-detail/{id}',[ApiController::class,'getOrderDetailAPI'])->name('order.getOrderDetailAPI');
Route::get('thrift/get-order-count',[ApiController::class,'getOrderCountAPI'])->name('order.getOrderCountAPI');
Route::post('thrift/cancel-order',[ApiController::class,'cancelOrderAPI']);

//fetch api routes
Route::get('thrift/get-order-items',[ApiController::class,'getOrderItemsAPI'])->name('order.getOrderItemsAPI');
Route::post('/api/fetch-subcategory', [ApiController::class, 'fetchSubcategoryApi']);

//searchItem
Route::get('thrift/search',[ApiController::class,'searchProduct']);

Route::get('thrift/delete-product-image/{id}',[ProductController::class,'deleteImage'])->name('product.deleteImage');
Route::get('/admin/userlist', [AdminController::class, 'userlist'])->name('admin.userlist');
Route::get('/admin/userlist_delete/{id}', [AdminController::class, 'userdelete'])->name('admin.userdelete');
Route::get('/admin/feedbacklist', [AdminController::class, 'feedbacklist'])->name('admin.feedbacklist');
Route::get('/admin/orderlist', [AdminController::class, 'orderlist'])->name('admin.orderlist');
Route::get('/admin/orderlist_delete/{id}', [AdminController::class, 'orderdelete'])->name('admin.orderdelete');

Route::get('/admin/orderlist_cancel/{id}', [AdminController::class, 'orderstatus_cancel'])->name('admin.orderstatus_cancel');
Route::get('/admin/orderlist_deliver/{id}', [AdminController::class, 'orderstatus_deliver'])->name('admin.orderstatus_deliver');
Route::get('/admin/form_cancel', [AdminController::class, 'form_cancel'])->name('admin.form_cancel');


require __DIR__.'/auth.php';
