<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get ('admin/product/list', [ProductController::class, "getAll"]);

Route::get ('admin/product/add', [ProductController::class, "add"]);

Route::post('admin/product/save', [ProductController::class, "save"]);

Route::get('admin/product/delete/{id}', [ProductController::class, "delete"]);

Route::get('admin/product/delete-permanent/{id}', [ProductController::class, "deletePermanent"]);

Route::get('admin/product/edit/{id}', [ProductController::class, "edit"]);

Route::post('admin/product/update/{id}', [ProductController::class, "update"]);

Route::get('admin/product/{id}', [ProductController::class, "detail"]);

Route::get('admin/product/restore/{id}', [ProductController::class, "restore"]);
