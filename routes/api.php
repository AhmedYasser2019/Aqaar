<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', [\App\Http\Controllers\Api\PostsController::class, 'getAllCategories']);
Route::get('articles-by-categoryID', [\App\Http\Controllers\Api\PostsController::class, 'getArticlesByCategoryID']);
Route::post('update-article-view-number', [\App\Http\Controllers\Api\PostsController::class, 'updateArticleViewNumber']);

