<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function(){
    Route::get('/', 'HomeController@index')->name('admin.index');

    Route::get('teste', function () {
        // dd(auth()->user()->isAdmin()); // verifica se o usuário é um administrador
        // dd(auth()->user()->hasPermission('Permissão 6')); // verifica se o usuário ter ou não permissão 
        // dd(auth()->user()->permissions()); // verifica quais permissões o usuário tem...
    });

    /**
     * Product x Categories
     */
    Route::get('products/{idProfile}/categories', 'CategoryProductController@categories')->name('products.categories');
    Route::any('products/{idProfile}/categories/create', 'CategoryProductController@create')->name('products.categories.create');
    Route::post('products/{idProfile}/categories/store', 'CategoryProductController@store')->name('products.categories.store');
    Route::get('products/{idProfile}/categories/{idPermission}/delete', 'CategoryProductController@delete')->name('products.categories.delete');

    /**
     * Role x User
     */
    Route::get('users/{id}/role/{idRole}/detach', 'RoleUserController@detachRoleUser')->name('users.role.detach');
    Route::post('users/{id}/roles', 'RoleUserController@attachRolesUser')->name('users.roles.attach');
    Route::any('users/{id}/roles/create', 'RoleUserController@rolesAvailable')->name('users.roles.available');
    Route::get('users/{id}/roles', 'RoleUserController@roles')->name('users.roles');
    Route::get('roles/{id}/users', 'RoleUserController@users')->name('roles.users');

    /**
     * Permission x Role
     */
    Route::get('roles/{id}/permission/{idPermission}/detach', 'PermissionRoleController@detachPermissionRole')->name('roles.permission.detach');
    Route::post('roles/{id}/permissions', 'PermissionRoleController@attachPermissionsRole')->name('roles.permissions.attach');
    Route::any('roles/{id}/permissions/create', 'PermissionRoleController@permissionsAvailable')->name('roles.permissions.available');
    Route::get('roles/{id}/permissions', 'PermissionRoleController@permissions')->name('roles.permissions');
    Route::get('permissions/{id}/role', 'PermissionRoleController@roles')->name('permissions.roles');

    /**
     * Profile x Permission
     */
    Route::get('profiles/{idProfile}/permissions', 'PermissionProfileController@permissions')->name('profiles.permissions');
    Route::any('profiles/{idProfile}/permissions/create', 'PermissionProfileController@create')->name('profiles.permissions.create');
    Route::post('profiles/{idProfile}/permissions/store', 'PermissionProfileController@store')->name('profiles.permissions.store');
    Route::get('profiles/{idProfile}/permissions/{idPermission}/delete', 'PermissionProfileController@delete')->name('profiles.permissions.delete');

    /**
     * Permission x Profile
     */
    Route::get('permissions/{idPermission}/profiles', 'PermissionProfileController@profiles')->name('permissions.profiles');

    /**
     * Profile x Plan
     */
    Route::get('profiles/{idProfile}/plans', 'PlanProfileController@plans')->name('profiles.plans');
    Route::any('profiles/{idProfile}/plans/create', 'PlanProfileController@create')->name('profiles.plans.create');
    Route::post('profiles/{idProfile}/plans/store', 'PlanProfileController@store')->name('profiles.plans.store');
    Route::get('profiles/{idProfile}/plans/{idPlan}/delete', 'PlanProfileController@delete')->name('profiles.plans.delete');

    /**
     * Plan x Profile
     */
    Route::get('plans/{id}/profile/{idProfile}/detach', 'PlanProfileController@detachProfilePlan')->name('plans.profile.detach');
    Route::post('plans/{id}/profiles', 'PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', 'PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', 'PlanProfileController@profiles')->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'PlanProfileController@plans')->name('profiles.plans');

    /**
     * Route Users
     */
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');

    /**
     * Route Catogories
     */
    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');

    /**
     * Route Products
     */
    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');

    /**
     * Route Tenants
     */
    Route::any('tenants/search', 'TenantController@search')->name('tenants.search');
    Route::resource('tenants', 'TenantController');

    /**
     * Routes roles
     */
    Route::any('roles/search', 'RoleController@search')->name('roles.search');
    Route::resource('roles', 'RoleController');

    /**
     * Route Products
     */
    Route::any('tables/search', 'TableController@search')->name('tables.search');
    Route::resource('tables', 'TableController');

    /**
     * Routes Plans
     */
    Route::prefix('plans')->group(function(){
        Route::get('/', 'PlanController@index')->name('plans.index');
        Route::any('search', 'PlanController@search')->name('plans.search');
        Route::get('create', 'PlanController@create')->name('plans.create');
        Route::post('store', 'PlanController@store')->name('plans.store');
        Route::get('show/{url}', 'PlanController@show')->name('plans.show');
        Route::get('edit/{url}', 'PlanController@edit')->name('plans.edit');
        Route::put('update/{url}', 'PlanController@update')->name('plans.update');
        Route::delete('destroy/{url}', 'PlanController@destroy')->name('plans.destroy');

        /**
         * Routes Detais of Plan
         */
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

    /**
     *  Routes Permissions
     */
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
    
    /**
     * Routes Profiles
     */
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



Route::get('/', 'Site\SiteController@index')->name('site');
Route::get('/plan/{url}', 'Site\SiteController@plan')->name('site.plan');


Auth::routes();

