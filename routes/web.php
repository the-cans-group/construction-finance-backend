<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/projects', function () {
    return view('projects');
});
Route::get('/contractors', function () {
    return view('contractors');
});

Route::get('/reports', function () {
    return view('reports');
});
