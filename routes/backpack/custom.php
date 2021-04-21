<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () {
    Route::crud('links', 'LinkCrudController');
    Route::crud('banks', 'BankCrudController');
    Route::crud('texts', 'TextCrudController');
    Route::crud('withdrawals', 'WithdrawalCrudController');
    Route::crud('offers', 'OffersCrudController');

    Route::get('links/moderate', 'LinkCrudController@generate');
    Route::get('moneyboard', 'AdminController@moneyboard');
    Route::get('charts/weekly-users', 'Charts\WeeklyUsersChartController@response')->name('charts.weekly-users.index');

    Route::get('links/stat/{id}', 'LinkCrudController@stat');
});
