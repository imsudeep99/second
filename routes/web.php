<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Indexcontroller;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\Logoutcontroller;
use App\Http\Controllers\Registercontroller;
use App\Http\Controllers\Changepasswordcontroller;
//Indexcontroller
//Route::get('/', [Indexcontroller::class, 'index'])->name('home');
Route::get('/', [Indexcontroller::class, 'dashboard'])->name('dashboard');
//Route::get('/category', [Indexcontroller::class, 'add_category'])->name('add_category');



//Changepasswordcontroller
Route::get('/change_pass', [Changepasswordcontroller::class, 'index_pass'])->name('change_pass');
Route::post('/change_password', [Changepasswordcontroller::class, 'update_pass'])->name('change_password');

//Logoutcontroller
Route::get('/logout', [Logoutcontroller::class, 'index'])->name('logout');

//Registercontroller
Route::get('/register', [Registercontroller::class, 'index'])->name('register');
Route::post('/register', [Registercontroller::class, 'registration'])->name('register');

//Logincontroller
Route::get('/login', [Logincontroller::class, 'index'])->name('login');
Route::post('/login', [Logincontroller::class, 'login'])->name('login');

//Admincontroller
//Route::get('/admin', [Admincontroller::class, 'admin'])->name('admin');
Route::get('/admin/add_category', [Admincontroller::class, 'add_category'])->name('admin.add_category');
Route::post('/admin/store_category', [Admincontroller::class, 'store'])->name('admin.store_category');
Route::get('/admin/updateshow/{id}', [Admincontroller::class, 'show'])->name('admin.update-page_category');
Route::post('/admin/update/{id}', [Admincontroller::class, 'update'])->name('admin.update-category');
Route::get('/admin/delete/{id}', [Admincontroller::class, 'delete'])->name('admin.delete_category');




//add_sub_category
Route::get('/admin/add_sub_category', [Admincontroller::class, 'add_sub_category'])->name('admin.add_sub_category');
Route::post('/admin/add_store_sub', [Admincontroller::class, 'sub_store'])->name('admin.add_store_sub');
Route::get('/admin/editshow/{id}', [Admincontroller::class, 'editshow'])->name('admin.edit-pagesub_category');
Route::post('/admin/edit/{id}', [Admincontroller::class, 'edit'])->name('admin.edit-subcategory');
Route::get('/admin/destory/{id}', [Admincontroller::class, 'destory'])->name('admin.destory_sub-cat');





//add_product
Route::get('/admin/add_product', [Admincontroller::class, 'add_product'])->name('admin.add_product');
Route::post('/admin/post_product', [Admincontroller::class, 'post_product'])->name('admin.post_product');
Route::get('/admin/pro_editshow/{id}', [Admincontroller::class, 'pro_editshow'])->name('admin.product_editpage');
Route::post('/admin/pro_edit/{id}', [Admincontroller::class, 'pro_edit'])->name('admin.prodict-edit');

Route::get('/admin/pro_delete/{id}', [Admincontroller::class, 'pro_delete'])->name('admin.pro_delete');



