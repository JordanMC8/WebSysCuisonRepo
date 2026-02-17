<?php

use Illuminate\Support\Facades\Route;

Route::get('/evaluation', function () {
    return view('evaluation', [
        'name'    => request('name'),
        'prelim'  => request('prelim'),
        'midterm' => request('midterm'),
        'final'   => request('final'),
    ]);
});