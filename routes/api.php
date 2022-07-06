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

Route::get('login', 'App\Http\Controllers\UsersController@authenticate');

// Routes with jwt
Route::group(['middleware' => ['jwt.verify']], function() {
    
    // Categories
    Route::get('categories', 'App\Http\Controllers\CategoriesController@get');
    Route::get('categories/{id}', 'App\Http\Controllers\CategoriesController@details');
    Route::post('categories/insert', 'App\Http\Controllers\CategoriesController@create');
    Route::put('categories/{id}/update', 'App\Http\Controllers\CategoriesController@update');
    Route::delete('categories/{id}/delete', 'App\Http\Controllers\CategoriesController@delete');

    // Projects
    Route::get('projects', 'App\Http\Controllers\ProjectsController@get');
    Route::get('projects/catergory/{catid}', 'App\Http\Controllers\ProjectsController@category');
    Route::get('projects/{id}', 'App\Http\Controllers\ProjectsController@details');
    Route::post('projects/insert', 'App\Http\Controllers\ProjectsController@create');
    Route::put('projects/{id}/update', 'App\Http\Controllers\ProjectsController@update');
    Route::delete('projects/{id}/delete', 'App\Http\Controllers\ProjectsController@delete');

    // ProjectTypes
    Route::get('projects/types', 'App\Http\Controllers\ProjectTypesController@get');
    Route::get('projects/{projectid}/types', 'App\Http\Controllers\ProjectTypesController@project');
    Route::get('projects/type/{id}', 'App\Http\Controllers\ProjectTypesController@details');
    Route::post('projects/types/insert', 'App\Http\Controllers\ProjectTypesController@create');
    Route::put('projects/type/{id}/update', 'App\Http\Controllers\ProjectTypesController@update');
    Route::delete('projects/type/{id}/delete', 'App\Http\Controllers\ProjectTypesController@delete');

    // ProjectAssets
    Route::get('projects/assets', 'App\Http\Controllers\ProjectAssetsController@get');
    Route::get('projects/{projectid}/assets', 'App\Http\Controllers\ProjectAssetsController@project');
    Route::get('projects/asset/{id}', 'App\Http\Controllers\ProjectAssetsController@details');
    Route::post('projects/assets/insert', 'App\Http\Controllers\ProjectAssetsController@create');
    Route::put('projects/asset/{id}/update', 'App\Http\Controllers\ProjectAssetsController@update');
    Route::delete('projects/asset/{id}/delete', 'App\Http\Controllers\ProjectAssetsController@delete');

    // ProjectTags
    Route::get('projects/tags', 'App\Http\Controllers\ProjectTagsController@get');
    Route::get('projects/{projectid}/tags', 'App\Http\Controllers\ProjectTagsController@project');
    Route::get('projects/tag/{id}', 'App\Http\Controllers\ProjectTagsController@details');
    Route::post('projects/tags/insert', 'App\Http\Controllers\ProjectTagsController@create');
    Route::put('projects/tag/{id}/update', 'App\Http\Controllers\ProjectTagsController@update');
    Route::delete('projects/tag/{id}/delete', 'App\Http\Controllers\ProjectTagsController@delete');

    // ProjectFields
    Route::get('projects/fields', 'App\Http\Controllers\ProjectFieldsController@get');
    Route::get('projects/{projectid}/fields', 'App\Http\Controllers\ProjectFieldsController@project');
    Route::get('projects/field/{id}', 'App\Http\Controllers\ProjectFieldsController@details');
    Route::post('projects/fields/insert', 'App\Http\Controllers\ProjectFieldsController@create');
    Route::put('projects/field/{id}/update', 'App\Http\Controllers\ProjectFieldsController@update');
    Route::delete('projects/field/{id}/delete', 'App\Http\Controllers\ProjectFieldsController@delete');

    // Tags
    Route::get('tags', 'App\Http\Controllers\TagsController@get');
    Route::get('tags/category/{id}', 'App\Http\Controllers\TagsController@category');
    Route::get('tags/{id}', 'App\Http\Controllers\TagsController@project');
    Route::post('tags/insert', 'App\Http\Controllers\TagsController@create');
    Route::put('tags/{id}/update', 'App\Http\Controllers\TagsController@update');
    Route::delete('tags/{id}/delete', 'App\Http\Controllers\TagsController@delete');

    // AssetsTypes
    Route::get('assets/types', 'App\Http\Controllers\AssetsTypesController@get');
    Route::get('assets/{id}', 'App\Http\Controllers\AssetsTypesController@details');
    Route::post('assets/insert', 'App\Http\Controllers\AssetsTypesController@create');
    Route::put('assets/{id}/update', 'App\Http\Controllers\AssetsTypesController@update');
    Route::delete('assets/{id}/delete', 'App\Http\Controllers\AssetsTypesController@delete');

    // FieldTypes
    Route::get('fields/types', 'App\Http\Controllers\FieldsTypesController@get');
    Route::get('fields/{id}', 'App\Http\Controllers\FieldsTypesController@details');
    Route::post('fields/insert', 'App\Http\Controllers\FieldsTypesController@create');
    Route::put('fields/{id}/update', 'App\Http\Controllers\FieldsTypesController@update');
    Route::delete('fields/{id}/delete', 'App\Http\Controllers\FieldsTypesController@delete');
    
});
