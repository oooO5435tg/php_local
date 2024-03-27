<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/employer_list', [Controller\Site::class, 'employerList']);
Route::add('GET', '/add_department', [Controller\Site::class, 'addDepartment']);
Route::add('GET', '/add_position', [Controller\Site::class, 'addPosition']);
Route::add('GET', '/add_discipline', [Controller\Site::class, 'addDiscipline']);