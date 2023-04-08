<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganizationMemberController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('organizations')->group(function () {
    Route::post('/create', [OrganizationController::class, 'create']);
    Route::patch('/update/{id}', [OrganizationController::class, 'edit']);
    Route::get('{id}/all', [OrganizationController::class, 'get_all']);
    Route::get('/{id}/sensors/all', [OrganizationController::class, 'get_sensor']);
    Route::get('/{id}/assets/all', [OrganizationController::class, 'get_asset']);
    Route::get('/{id}/roles/all', [OrganizationController::class, 'get_role']);
    Route::get('/{id}/users/all', [OrganizationController::class, 'get_user']);
    Route::post('/{id}/users/edit_role', [OrganizationMemberController::class, 'edit_role']);
    Route::post('/{id}', [OrganizationController::class, 'profile']);
});