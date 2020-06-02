<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::get('/', 'HomeController@index')->name('admin.index');

    Route::prefix('plans')->group(function(){
        Route::get('/', 'PlanController@index')->name('plans.index');
        Route::any('search', 'PlanController@search')->name('plans.search');
        Route::get('create', 'PlanController@create')->name('plans.create');
        Route::post('store', 'PlanController@store')->name('plans.store');
        Route::get('show/{url}', 'PlanController@show')->name('plans.show');
        Route::get('edit/{url}', 'PlanController@edit')->name('plans.edit');
        Route::put('update/{url}', 'PlanController@update')->name('plans.update');
        Route::delete('destroy/{url}', 'PlanController@destroy')->name('plans.destroy');

        Route::prefix('details_plan')->group(function(){
            Route::get('/{url}', 'DetailPlanController@index')->name('details_plan.index');
            Route::any('/{url}/search', 'DetailPlanController@search')->name('details_plan.search');
            Route::get('/{url}/create', 'DetailPlanController@create')->name('details_plan.create');
            Route::post('/{url}/store', 'DetailPlanController@store')->name('details_plan.store');
            Route::get('/{url}/show/{id}', 'DetailPlanController@show')->name('details_plan.show');
            Route::get('/{url}/edit/{id}', 'DetailPlanController@edit')->name('details_plan.edit');
            Route::put('/{url}/update/{id}', 'DetailPlanController@update')->name('details_plan.update');
            Route::delete('/{url}/destroy/{id}', 'DetailPlanController@destroy')->name('details_plan.destroy');
        });
    });

    Route::prefix('permissions')->group(function(){
        Route::get('/', 'PermissionController@index')->name('permissions.index');
        Route::any('search', 'PermissionController@search')->name('permissions.search');
        Route::get('create', 'PermissionController@create')->name('permissions.create');
        Route::post('store', 'PermissionController@store')->name('permissions.store');
        Route::get('show/{id}', 'PermissionController@show')->name('permissions.show');
        Route::get('edit/{id}', 'PermissionController@edit')->name('permissions.edit');
        Route::put('update/{id}', 'PermissionController@update')->name('permissions.update');
        Route::delete('destroy/{id}', 'PermissionController@destroy')->name('permissions.destroy');
    });
    
    Route::prefix('profiles')->group(function(){
        Route::get('/', 'ProfileController@index')->name('profiles.index');
        Route::any('search', 'ProfileController@search')->name('profiles.search');
        Route::get('create', 'ProfileController@create')->name('profiles.create');
        Route::post('store', 'ProfileController@store')->name('profiles.store');
        Route::get('show/{id}', 'ProfileController@show')->name('profiles.show');
        Route::get('edit/{id}', 'ProfileController@edit')->name('profiles.edit');
        Route::put('update/{id}', 'ProfileController@update')->name('profiles.update');
        Route::delete('destroy/{id}', 'ProfileController@destroy')->name('profiles.destroy');
    });
});



Route::get('/', function () {
    return view('welcome');
});
