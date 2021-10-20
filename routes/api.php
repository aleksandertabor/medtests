<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\API\Categories\Controllers\CategoryController;
use App\API\BloodTests\Controllers\BloodTestController;
use App\API\BloodTests\Controllers\BloodTestCategoryController;

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


Route::apiResources([
    'blood-tests' => BloodTestController::class,
    'categories' => CategoryController::class,
]);

Route::get('/blood-tests/category/{category:id}', BloodTestCategoryController::class);
