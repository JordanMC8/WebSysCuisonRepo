<?php

use Illuminate\Support\Facades\Route;

Route::get('/student/{id}/{name}', function ($id, $name) {
    return view('student', compact('id', 'name'));
});


Route::get('/course/{course}/{year?}', function ($course, $year = 'Not Specified') {
    return view('course', compact('course', 'year'));
});


Route::get('/ojt/{company}/{city}/{allowance?}', function ($company, $city, $allowance = 'No') {
    return view('ojt', compact('company', 'city', 'allowance'));
});


Route::get('/event/{event}/{name}/{year}', function ($event, $name, $year) {
    return view('event', compact('event', 'name', 'year'));
});
