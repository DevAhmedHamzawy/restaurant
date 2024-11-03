<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DrinkController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\SideController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SubTagController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Temp Then I'll remove
Auth::routes();

Route::get('/', function () {
    return redirect('admin/login');
});

// DON'T Put it inside the '/admin' Prefix , Otherwise you'll never get the page due to assign.guard that will redirect you too many times
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm']);
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['assign.guard:admin,admin/login'] , 'prefix' => 'admin'],function(){

    route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    route::resource('users', AdminUserController::class);
    Route::get('users/{user}/delete', [AdminUserController::class, 'destroy'])->name('users.delete');
    route::get('users/{user}/status', [AdminUserController::class, 'setStatus'])->name('users.set_status');

    Route::resource('admins', AdminController::class);
    Route::get('admins/{admin}/delete', [AdminController::class, 'destroy'])->name('admins.delete');

    Route::resource('offers', OfferController::class);
    Route::get('offers', [OfferController::class, 'indexTwo'])->name('offers.index');
    Route::get('offers_index', [OfferController::class, 'index'])->name('offers.indextwo');
    Route::get('offers/{offer}/delete', [OfferController::class, 'destroy'])->name('offers.delete');

    Route::resource('categories', CategoryController::class);
    Route::get('categories', [CategoryController::class, 'indexTwo'])->name('categories.index');
    Route::get('categories_index', [CategoryController::class, 'index'])->name('categories.indextwo');
    Route::get('categories/{category}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');

    Route::resource('restaurants', RestaurantController::class);
    Route::get('restaurants', [RestaurantController::class, 'indexTwo'])->name('restaurants.index');
    Route::get('restaurants_index', [RestaurantController::class, 'index'])->name('restaurants.indextwo');
    Route::get('restaurants/{restaurant}/delete', [RestaurantController::class, 'destroy'])->name('restaurants.delete');
    Route::get('list_restaurants/{id}', [RestaurantController::class, 'list'])->name('list_restaurants');


    Route::resource('restaurants/{restaurant}/meals', MealController::class);
    Route::get('restaurants/{restaurant}/meals', [MealController::class, 'indexTwo'])->name('meals.index');
    Route::get('restaurants/{restaurant}/meals_index', [MealController::class, 'index'])->name('meals.indextwo');
    Route::get('restaurants/{restaurant}/meals/{meal}/delete', [MealController::class, 'destroy'])->name('meals.delete');
    Route::get('restaurants/{restaurant}/meals/{meal}/upload', [MealController::class, 'upload'])->name('meals.upload');
    Route::post('restaurants/{restaurant}/meals/{meal}/upload', [MealController::class, 'uploadMedia'])->name('meals.upload_media');
    Route::get('restaurants/{restaurant}/meals/{meal}/getMedia', [MealController::class, 'getMedia'])->name('meals.get_media');
    Route::get('list_meals/{id}', [MealController::class, 'list'])->name('list_meals');

    Route::post('search', [SearchController::class, 'getFilters'])->name('search');

    Route::resource('tags', TagController::class);
    Route::get('tags', [TagController::class, 'indexTwo'])->name('tags.index');
    Route::get('tags_index', [TagController::class, 'index'])->name('tags.indextwo');
    Route::get('tags/{tag}/delete', [TagController::class, 'destroy'])->name('tags.delete');

    Route::resource('tags/{tag}/subtags', SubTagController::class);
    Route::get('tags/{tag}/subtags', [SubTagController::class, 'indexTwo'])->name('subtags.index');
    Route::get('tags/{tag}/subtags_index', [SubTagController::class, 'index'])->name('subtags.indextwo');
    Route::get('tags/{tag}/subtags/{subtag}/delete', [SubTagController::class, 'destroy'])->name('subtags.delete');
    Route::get('list_subtags/{id}', [SubTagController::class, 'list'])->name('list_subtags');

    Route::get('features/{feature}', [FeatureController::class, 'destroy'])->name('features.delete');
    Route::get('ingredients/{ingredient}', [IngredientController::class, 'destroy'])->name('ingredients.delete');
    Route::get('sizes/{size}', [SizeController::class, 'destroy'])->name('sizes.delete');
    Route::get('options/{option}', [OptionController::class, 'destroy'])->name('options.delete');
    Route::get('drinks/{drink}', [DrinkController::class, 'destroy'])->name('drinks.delete');
    Route::get('sides/{side}', [SideController::class, 'destroy'])->name('sides.delete');

});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
});
