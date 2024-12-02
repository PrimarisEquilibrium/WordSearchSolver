<?php

use App\Http\Controllers\UploadController;
use App\Livewire\Process;
use Illuminate\Support\Facades\Route;

Route::get("/", [UploadController::class, "showForm"])->name("home");

Route::post("upload", [UploadController::class, "upload"])->name("upload");

Route::get("process/{imagename}/{words}", Process::class)->name("process");