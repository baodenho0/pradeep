<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\TrustSmeController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\HomePageSettingController;
use App\Http\Controllers\BrandDetailsSettingController;
use App\Http\Controllers\GeneralContentSettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'index']);
        Route::post('/', [MenuController::class, 'store']);
        Route::put('/{menu}', [MenuController::class, 'update']);
        Route::delete('/{menu}', [MenuController::class, 'destroy']);
    });

    Route::prefix('pages')->group(function () {
        Route::get('/', [PageController::class, 'index']);
        Route::post('/', [PageController::class, 'store']);
        Route::get('/{slug}', [PageController::class, 'show']);
        Route::put('/{page}', [PageController::class, 'update']);
        Route::delete('/{page}', [PageController::class, 'destroy']);
    });

    Route::prefix('settings')->group(function () {
        Route::prefix('brand-details')->group(function () {
            Route::get('/', [BrandDetailsSettingController::class, 'index']);
            Route::put('/', [BrandDetailsSettingController::class, 'update']);
        });

        Route::prefix('general-content')->group(function () {
            Route::get('/', [GeneralContentSettingController::class, 'index']);
            Route::put('/', [GeneralContentSettingController::class, 'update']);
        });

        Route::prefix('home-page')->group(function () {
            Route::get('/', [HomePageSettingController::class, 'index']);
            Route::put('/', [HomePageSettingController::class, 'update']);
        });
    });

    Route::prefix('features')->group(function () {
        Route::get('/', [FeatureController::class, 'index']);
        Route::post('/', [FeatureController::class, 'store']);
        Route::get('/{feature}', action: [FeatureController::class, 'show']);
        Route::put('/{feature}', [FeatureController::class, 'update']);
        Route::delete('/{feature}', [FeatureController::class, 'destroy']);
    });

    Route::prefix('marketplaces')->group(function () {
        Route::get('/', [MarketplaceController::class, 'index']);
        Route::post('/', [MarketplaceController::class, 'store']);
        Route::get('/{marketplace}', action: [MarketplaceController::class, 'show']);
        Route::put('/{marketplace}', [MarketplaceController::class, 'update']);
        Route::delete('/{marketplace}', [MarketplaceController::class, 'destroy']);
    });

    Route::prefix('trust-smes')->group(function () {
        Route::get('/', [TrustSmeController::class, 'index']);
        Route::post('/', [TrustSmeController::class, 'store']);
        Route::get('/{trustSme}', action: [TrustSmeController::class, 'show']);
        Route::put('/{trustSme}', [TrustSmeController::class, 'update']);
        Route::delete('/{trustSme}', [TrustSmeController::class, 'destroy']);
    });
    Route::prefix('testimonials')->group(function () {
        Route::get('/', [TestimonialController::class, 'index']);
        Route::post('/', [TestimonialController::class, 'store']);
        Route::get('/{testimonial}', action: [TestimonialController::class, 'show']);
        Route::put('/{testimonial}', [TestimonialController::class, 'update']);
        Route::delete('/{testimonial}', [TestimonialController::class, 'destroy']);
    });

});
