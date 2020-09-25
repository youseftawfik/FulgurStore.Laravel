<?php

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

                    //  ************** Dashboard ************* //
Route::get('/','AdminController@login');
Route::get('/loginout','AdminController@login');
Route::get('/registration','AdminController@registration');
Route::get('/dashboard','AdminController@admin');
Route::get('/add-category','AdminController@addcategory');
Route::get('/add-subcategory','AdminController@addsubcategory');
Route::get('/add-producttype','AdminController@addproducttype');

Route::post('/post-login','AuthController@login');
Route::post('/register','AuthController@register');


Route::post('/add-category','CategoryController@save_category');
Route::get('/categories','CategoryController@categories');
Route::post('/update_category','CategoryController@update_category');
Route::get('/unactivate_category/{id}','CategoryController@unactivate_category');
Route::get('/activate_category/{id}','CategoryController@activate_category');
Route::get('/delete_category/{id}','CategoryController@delete_category');
Route::get('/edit_category/{id}','CategoryController@edit_category');


Route::post('/add-subcategory','SubcategoryController@save_subcategory');
Route::post('/update_subcategory','SubcategoryController@update_subcategory');
Route::get('/Subcategory','SubcategoryController@Subcategory');
Route::get('/unactivate_subcategory/{id}','SubcategoryController@unactivate_subcategory');
Route::get('/activate_subcategory/{id}','SubcategoryController@activate_subcategory');
Route::get('/delete_subcategory/{id}','SubcategoryController@delete_subcategory');
Route::get('/edit_subcategory/{id}','SubcategoryController@edit_subcategory');



Route::post('/add-producttype','ProducttypeController@save_producttype');
Route::post('/update_producttype','ProducttypeController@update_producttype');
Route::get('/producttypes','ProducttypeController@producttype');
Route::get('/unactivate_producttype/{id}','ProducttypeController@unactivate_producttype');
Route::get('/activate_producttype/{id}','ProducttypeController@activate_producttype');
Route::get('/delete_producttype/{id}','ProducttypeController@delete_producttype');
Route::get('/edit_producttype/{id}','ProducttypeController@edit_producttype');





