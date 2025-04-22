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