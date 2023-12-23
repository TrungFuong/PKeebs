<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManufacturerController;

Route::get ('admin/manufacturer/list', [ManufacturerController::class, "getAll"]);
Route::get ('admin/manufacturer/add', [ManufacturerController::class, "add"]);
Route::post('admin/manufacturer/save', [ManufacturerController::class, "save"]);
Route::get('admin/manufacturer/delete/{id}', [ManufacturerController::class, "delete"]);
Route::get('admin/manufacturer/edit/{id}', [ManufacturerController::class, "edit"]);
Route::post('admin/manufacturer/update/{id}', [ManufacturerController::class, "update"]);
