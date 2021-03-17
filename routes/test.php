<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

use App\Utility\S3Image;
use Illuminate\Http\Request;

Route::name('test.')->group(function () {

    Route::get('/upload-form', function () {
        return view('test');
    })->name('upload_form');

    Route::post('/upload', function (Request $request) {
        $path =  Str::uuid() . '-' . $request->file('image')->getClientOriginalName();
        $uploadedUrl = S3Image::uploadFromRequest('image', $path);
        dd($uploadedUrl);
        return view('test');
    })->name('upload');
});
