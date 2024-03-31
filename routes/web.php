<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/employer_list', [Controller\Site::class, 'employerList']);
Route::add(['GET', 'POST'], '/add_department', [Controller\Site::class, 'addDepartment']);
Route::add(['GET', 'POST'], '/add_position', [Controller\Site::class, 'addPosition']);
Route::add(['GET', 'POST'], '/add_discipline', [Controller\Site::class, 'addDiscipline']);
Route::add(['GET', 'POST'], '/add_deanery', [Controller\Site::class, 'addDeanery']);
Route::add(['GET', 'POST'], '/add_employer', [Controller\Site::class, 'addEmployer']);
Route::add(['GET', 'POST'], '/search_employer', [Controller\Site::class, 'search_employer']);
Route::add(['GET', 'POST'], '/search_department', [Controller\Site::class, 'search_department']);
Route::add(['GET', 'POST'], '/search_discipline', [Controller\Site::class, 'search_discipline']);