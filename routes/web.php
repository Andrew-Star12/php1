<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
// Маршрут для отображения формы добавления сотрудника
Route::add('GET', '/employee/create', [Controller\Site::class, 'createEmployee']);
Route::add('POST', '/employee/create', [Controller\Site::class, 'storeEmployee']);
Route::add('GET', '/employees', [Controller\Site::class, 'listEmployees']);
Route::add('GET', '/department/create', [Controller\Site::class, 'createDepartment']);
Route::add('POST', '/department/create', [Controller\Site::class, 'storeDepartment']);
Route::add('GET', '/departments', [Controller\Site::class, 'listDepartments']);
Route::add('GET', '/disciplines/create', [Controller\Site::class, 'createDiscipline']);
Route::add('POST', '/disciplines/create', [Controller\Site::class, 'storeDiscipline']);
Route::add('GET', '/disciplines', [Controller\Site::class, 'listDisciplines']);
Route::add('GET', '/employee/edit/{id}', [Controller\Site::class, 'editEmployee']);
Route::add('POST', '/employee/update/{id}', [Controller\Site::class, 'updateEmployee']);
Route::add('GET', '/discipline/edit/{id}', [Controller\Site::class, 'editDiscipline']);
Route::add('POST', '/discipline/update/{id}', [Controller\Site::class, 'updateDiscipline']);
Route::add('GET', '/department/edit/{id}', [Controller\Site::class, 'editDepartment']);
Route::add('POST', '/department/update/{id}', [Controller\Site::class, 'updateDepartment']);





