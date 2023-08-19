<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\IndexUserController;
use App\Http\Controllers\CartController;
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
Route::get('/admin/login',[AdminUsersController::class,'index'])->name('login');
Route::get('/logout',[AdminUsersController::class,'logout'])->name('logout');
Route::get('/forgotpassword',[AdminUsersController::class,'forgotpassword'])->name('forgotpassword');
Route::post('/signup',[AdminUsersController::class,'signup'])->name('signup');
Route::post('/forgotpassword/email',[AdminUsersController::class,'forgot'])->name('email.forgotpassword');
Route::post('/checktoken',[AdminUsersController::class,'checktoken'])->name('email.checktoken');
Route::post('/reset/{id}',[AdminUsersController::class,'resetpassword'])->name('resetpassword');

//Login Admin
Route::post('/login',[AdminUsersController::class,'login'])->name('login.user');
//post
Route::group(['middleware'=>'checkadminlogin'],function(){
Route::get('/admin/listpost',[AdminProductController::class,'index'])->name('admin.index');
Route::get('/admin/create_post',[AdminProductController::class,'create_post'])->name('create.post');
Route::get('/admin/delete_post/{id}',[AdminProductController::class,'delete_post'])->name('delete.post');
Route::get('/admin/update_post/{id}',[AdminProductController::class,'update_post'])->name('update.post');
Route::post('/admin/create_post',[AdminProductController::class,'add_post'])->name('add.post');
Route::post('/admin/edit_post/{id}',[AdminProductController::class,'edit_post'])->name('edit.post');
Route::get('/admin/list_cate_post',[AdminProductController::class,'list_cate_post'])->name('list.cate.post');
Route::get('/admin/create_cate_post',[AdminProductController::class,'create_cate_post'])->name('create.cate.post');
Route::get('/admin/delete_cate_post/{id}',[AdminProductController::class,'delete_cate_post'])->name('delete.cate.post');
Route::post('/admin/create_cate_post',[AdminProductController::class,'add_cate_post'])->name('add.cate.post');
//Route Category
Route::get('/admin/list_category',[AdminProductController::class,'list_category'])->name('list.category');
Route::get('/admin/create_category',[AdminProductController::class,'create_category']);
Route::get('/admin/delete_category/{id}',[AdminProductController::class,'delete_category'])->name('delete.category');
Route::post('/admin/create_category',[AdminProductController::class,'add_category'])->name('create_category');
//Route Brand
Route::get('/admin/list_brand',[AdminProductController::class,'list_brand'])->name('list.brand');
Route::get('/admin/create_brand',[AdminProductController::class,'create_brand'])->name('create.brand');
Route::post('/admin/create_brand',[AdminProductController::class,'add_brand'])->name('add.brand');
Route::get('/admin/delete_brand/{id}',[AdminProductController::class,'delete_brand'])->name('delete.brand');
//Route Product
Route::get('/admin/list_product',[AdminProductController::class,'list_product'])->name('list.product');
Route::get('/admin/create_product',[AdminProductController::class,'create_product'])->name('create.product');
Route::post('/admin/add_product',[AdminProductController::class,'add_product'])->name('add.product');
Route::get('/admin/delete_product/{id}',[AdminProductController::class,'delete_product'])->name('delete.product');
Route::get('/admin/update_product/{id}',[AdminProductController::class,'update_product'])->name('update.product');
Route::post('/admin/edit_product/{id}',[AdminProductController::class,'edit_product'])->name('edit.product');
Route::get('/admin/create_product_thumbnail',[AdminProductController::class,'add_thumbnail'])->name('create.product_thumbnail');
Route::post('/admin/add_product_thumbnail',[AdminProductController::class,'add_image'])->name('add.image');

//order
Route::get('/admin/list_order',[AdminProductController::class,'order_list'])->name('list.order');
Route::get('/admin/order_detail/{id}',[AdminProductController::class,'order_detail'])->name('order.detail');
Route::post('/admin/edit_customer/{id}',[AdminProductController::class,'edit_customer'])->name('edit.customer');
Route::get('/admin/list_customer',[AdminProductController::class,'customer_list'])->name('list.customer');
Route::get('/admin/update_cutomer/{id}',[AdminProductController::class,'update_customer'])->name('update.customer');
Route::get('/admin/delete_customer/{id}',[AdminProductController::class,'delete_customer'])->name('delete.customer');
Route::get('/admin/delete/{id}',[AdminProductController::class,'delete_order'])->name('delete.order');
Route::post('/admin/edit/status/{id}',[AdminProductController::class,'edit_status_order'])->name('edit.status.order');
//slider
Route::get('/admin/list_slider',[AdminProductController::class,'list_slider'])->name('list.slider');
Route::get('/admin/create_slider',[AdminProductController::class,'create_slider'])->name('create.slider');
Route::get('/admin/delete_slider/{id}',[AdminProductController::class,'delete_slider'])->name('delete.slider');
Route::post('/admin/create_slider',[AdminProductController::class,'add_slider'])->name('add.slider');
//comment
Route::get('/admin/list_comment',[AdminProductController::class,'list_comment'])->name('list.comment');
Route::get('/admin/delete_comment/{id}',[AdminProductController::class,'delete_comment'])->name('delete.comment');
});
//shipper
Route::group(['middleware'=>'checkshipperlogin'],function(){
Route::get('/admin/shipper',[AdminProductController::class,'list_shipper'])->name('list.shipper');
Route::get('/admin/update/shipper/{id}',[AdminProductController::class,'update_shipper'])->name('update.shipper');
Route::post('/admin/edit/shipper/{id}',[AdminProductController::class,'edit_shipper'])->name('edit.shipper');
});
//start layout user
Route::get('/blog',[IndexUserController::class,'blog'])->name('blog');
Route::get('/blog/detail/{id}',[IndexUserController::class,'blog_detail'])->name('blog.detail');
Route::get('/',[IndexUserController::class,'home'])->name('home');
Route::get('/product',[IndexUserController::class,'product'])->name('product');
Route::get('/contact',[IndexUserController::class,'contact'])->name('contact');

Route::get('/product/detail/{id}',[IndexUserController::class,'product_detail'])->name('product.detail');
Route::post('/product/detail/comment/{id}',[IndexUserController::class,'add_comment'])->name('add.comment');
Route::post('/product/add_cart/{id}',[CartController::class,'add_cart'])->name('add.cart');

Route::get('/product/show_cart',[CartController::class,'show_cart'])->name('show.cart');
Route::get('/product/remove_cart/{rowId}',[CartController::class,'remove_cart'])->name('remove.cart');
Route::get('/product/destroy_cart',[CartController::class,'destroy_cart'])->name('destroy.cart');
Route::post('/product/edit_cart',[CartController::class,'update_cart'])->name('update.cart');

//check login user
Route::group(['middleware'=>'checkuserlogin'],function(){
Route::get('/product/checkout',[CartController::class,'checkout'])->name('checkout');
Route::post('/product/add_checkout',[CartController::class,'add_checkout'])->name('add.checkout');
Route::get('/info_account/{id}',[IndexUserController::class,'info'])->name('info_account');
Route::post('/update/{id}',[IndexUserController::class,'update_user'])->name('update.user');
Route::get('/change/password/{id}',[IndexUserController::class,'change_password'])->name('change.password');
Route::post('/update_password/{id}',[IndexUserController::class,'update_password'])->name('change_password.user');
Route::get('/order_history/{id}',[IndexUserController::class,'history'])->name('history');
Route::get('/order_history/detail/{id}',[IndexUserController::class,'history_detail'])->name('order.history.detail');
Route::get('/order_history/delete/{id}',[IndexUserController::class,'delete_history'])->name('delete_order_history');
});