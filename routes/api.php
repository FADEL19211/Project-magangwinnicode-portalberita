<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\CommentApiController;

Route::get('/news', [NewsApiController::class, 'index']);
Route::get('/news/{id}', [NewsApiController::class, 'show']);
Route::post('/news', [NewsApiController::class, 'store']);
Route::put('/news/{id}', [NewsApiController::class, 'update']);
Route::delete('/news/{id}', [NewsApiController::class, 'destroy']);

Route::get('/users', [UserApiController::class, 'index']);
Route::get('/users/{id}', [UserApiController::class, 'show']);
Route::get('/users/total', [UserApiController::class, 'total']);

Route::get('/comments', [CommentApiController::class, 'index']);
Route::get('/comments/{id}', [CommentApiController::class, 'show']);
Route::get('/comments/total', [CommentApiController::class, 'total']);

Route::get('/news/total', [NewsApiController::class, 'total']);
Route::get('/news/category-stats', [NewsApiController::class, 'categoryStats']);
