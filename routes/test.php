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
        $path = Str::uuid() . '-' . $request->file('image')->getClientOriginalName();
//        $uploadedPath = ImageModule::uploadFromRequest('image', $path);
//        dd($request->file('image')->getContent());
        $uploadedPath = ImageModule::upload('test 123.jpg', $request->file('image')->getContent());
        dd($uploadedPath, ImageModule::urlFromPath($uploadedPath));
//        return view('test');
    })->name('upload');

    Route::get('/errors/{code}', function ($code) {
        abort($code, "Error found");
    })->name('500');

});
