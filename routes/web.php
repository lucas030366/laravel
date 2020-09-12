<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
  return "olá";
})->name("product.index");

/*
Route::get("/produtos/create", "Product\ProductController@create")->name("product.create");
Route::get("/produtos", "Product\ProductController@index")->name("product.index");
Route::post("/produtos", "Product\ProductController@store")->name("product.store");
Route::get("/produtos/{id}", "Product\ProductController@show")->name("product.show");
Route::get("/produtos/{id}/edit", "Product\ProductController@edit")->name("product.edit");
Route::put("/produtos/{id}", "Product\ProductController@update")->name("product.update");
Route::delete("/produtos/{id}", "Product\ProductController@destroy")->name("product.destroy");
*/

Route::get("/login", function(){
  return "Login";
})->name("login");

Route::resource("produtos", "Product\ProductController")->middleware([]);
//php artisan make:controller ProductController --resource