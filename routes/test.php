<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

use App\Utility\ImageModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

Route::name('test.')->group(function () {

    Route::get('/upload-form', function () {
        return view('test');
    })->name('upload_form');

    Route::post('/upload', function (Request $request) {
        $path =  Str::uuid() . '-' . $request->file('image')->getClientOriginalName();
        $uploadedPath = ImageModule::uploadFromRequest('image', $path);
        dd(ImageModule::urlFromPath($uploadedPath));
        return view('test');
    })->name('upload');
});
