<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DokumenController;

Route::get('/dokumen/download/{pengajuan}', [DokumenController::class, 'download'])->name('dokumen.download');
