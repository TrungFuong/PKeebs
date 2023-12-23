<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('admin/user/list', [UserController::class, "getAll"]);
Route::get('admin/user/add', [UserController::class, "add"]);
Route::post('admin/user/save', [UserController::class, "save"]);
Route::get('admin/user/delete/{id}', [UserController::class, "delete"]);
Route::get('admin/user/edit/{id}', [UserController::class, "edit"]);
Route::post('admin/user/update/{id}', [UserController::class, "update"]);

