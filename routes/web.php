<?php

use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/", [UploadController::class, "showForm"])->name("home");

Route::post("upload", [UploadController::class, "upload"])->name("upload");

Route::get("process/{filename}", [UploadController::class, "process"])->name("process");