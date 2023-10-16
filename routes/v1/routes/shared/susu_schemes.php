<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Shared\SusuScheme\SusuSchemeCollectionController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'susu/schemes',
    'as' => 'susu.schemes.',
], function (): void {
    Route::group([
        'middleware' => 'auth:customer',
    ], function (): void {
        Route::get(
            uri: '',
            action: SusuSchemeCollectionController::class
        )->name(
            name: 'collection'
        );
    });
});