<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HealthController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\PersonalInfoController;
use App\Http\Controllers\Api\TuberculosisController;
use App\Http\Controllers\Api\UserAllHealthController;
use App\Http\Controllers\Api\SocialNetworkController;
use App\Http\Controllers\Api\UserSocialNetworksController;
use App\Http\Controllers\Api\DiscloserAndSuppotController;
use App\Http\Controllers\Api\SocialNetworkUsersController;
use App\Http\Controllers\Api\LivelyhoodAndJobSearchController;
use App\Http\Controllers\Api\PerarEducationPersDvpmntController;
use App\Http\Controllers\Api\UserLivelyhoodAndJobSearchesController;
use App\Http\Controllers\Api\UserPerarEducationPersDvpmntsController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('users', UserController::class);

        // User All Health
        Route::get('/users/{user}/all-health', [
            UserAllHealthController::class,
            'index',
        ])->name('users.all-health.index');
        Route::post('/users/{user}/all-health', [
            UserAllHealthController::class,
            'store',
        ])->name('users.all-health.store');

        // User Perar Education Pers Dvpmnts
        Route::get('/users/{user}/perar-education-pers-dvpmnts', [
            UserPerarEducationPersDvpmntsController::class,
            'index',
        ])->name('users.perar-education-pers-dvpmnts.index');
        Route::post('/users/{user}/perar-education-pers-dvpmnts', [
            UserPerarEducationPersDvpmntsController::class,
            'store',
        ])->name('users.perar-education-pers-dvpmnts.store');

        // User Livelyhood And Job Searches
        Route::get('/users/{user}/livelyhood-and-job-searches', [
            UserLivelyhoodAndJobSearchesController::class,
            'index',
        ])->name('users.livelyhood-and-job-searches.index');
        Route::post('/users/{user}/livelyhood-and-job-searches', [
            UserLivelyhoodAndJobSearchesController::class,
            'store',
        ])->name('users.livelyhood-and-job-searches.store');

        // User Social Networks
        Route::get('/users/{user}/social-networks', [
            UserSocialNetworksController::class,
            'index',
        ])->name('users.social-networks.index');
        Route::post('/users/{user}/social-networks/{socialNetwork}', [
            UserSocialNetworksController::class,
            'store',
        ])->name('users.social-networks.store');
        Route::delete('/users/{user}/social-networks/{socialNetwork}', [
            UserSocialNetworksController::class,
            'destroy',
        ])->name('users.social-networks.destroy');

        Route::apiResource(
            'discloser-and-suppots',
            DiscloserAndSuppotController::class
        );

        Route::apiResource('all-education', EducationController::class);

        Route::apiResource('all-health', HealthController::class);

        Route::apiResource(
            'livelyhood-and-job-searches',
            LivelyhoodAndJobSearchController::class
        );

        Route::apiResource(
            'perar-education-pers-dvpmnts',
            PerarEducationPersDvpmntController::class
        );

        Route::apiResource('personal-infos', PersonalInfoController::class);

        Route::apiResource('social-networks', SocialNetworkController::class);

        // SocialNetwork Users
        Route::get('/social-networks/{socialNetwork}/users', [
            SocialNetworkUsersController::class,
            'index',
        ])->name('social-networks.users.index');
        Route::post('/social-networks/{socialNetwork}/users/{user}', [
            SocialNetworkUsersController::class,
            'store',
        ])->name('social-networks.users.store');
        Route::delete('/social-networks/{socialNetwork}/users/{user}', [
            SocialNetworkUsersController::class,
            'destroy',
        ])->name('social-networks.users.destroy');

        Route::apiResource('tuberculoses', TuberculosisController::class);
    });
