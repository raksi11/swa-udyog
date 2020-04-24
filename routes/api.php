<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Jobs
    Route::post('jobs/media', 'JobsApiController@storeMedia')->name('jobs.storeMedia');
    Route::apiResource('jobs', 'JobsApiController');

    // Proposals
    Route::post('proposals/media', 'ProposalsApiController@storeMedia')->name('proposals.storeMedia');
    Route::apiResource('proposals', 'ProposalsApiController');

    // Payments
    Route::apiResource('payments', 'PaymentApiController');

    // Faq Categories
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq Questions
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

});
