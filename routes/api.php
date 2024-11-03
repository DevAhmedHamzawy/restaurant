<?php

use App\Http\Controllers\Api\AddressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\MealController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\TagController;
use App\Models\Restaurant;

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

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function(){

    Route::post('logout', [UserController::class, 'logout']);

    Route::post('check-otp',[UserController::class, 'checkOtp']);
    Route::post('user-details', [UserController::class, 'userDetails']);
    Route::post('update-profile', [ProfileController::class, 'update']);
    Route::resource('addresses', AddressController::class);
    Route::get('default_address', [AddressController::class, 'defaultAddress']);

    Route::post('check-otp-for-email', [UserController::class , 'checkOtpForEmail']);
    Route::post('reset-password', [UserController::class, 'resetPassword']);

    Route::get('home', [HomeController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);

    Route::get('restaurants/{category}', [RestaurantController::class, 'index']);
    Route::get('restaurants/restaurant/{restaurant}', [RestaurantController::class, 'show']);

    Route::get('tags/{tag}', [TagController::class, 'show']);

    // Get Meals By SubTag
    Route::get('meals/{restaurant}/{subTag}', [MealController::class, 'index']);

    // Get Meal Details
    Route::get('meals/{meal}', [MealController::class, 'show']);

    // Get Recommended Meals By Restaurant Id
    Route::get('get_meals_recommended/{category}', [MealController::class, 'recommended']);

    // Get Offer Meals By Restaurant Id
    Route::get('get_meals_offers/{category}', [MealController::class, 'mealOffers']);

    Route::get('offers', [OfferController::class, 'index']);

    Route::resource('cart', CartController::class);
    Route::post('update_cart_qty', [CartController::class, 'updateQty']);

    Route::resource('orders', OrderController::class);
    Route::post('assign_driver_to_order/{order}', [OrderController::class, 'assignToDriver']);
    Route::post('get_order_delivery_time/{order}', [OrderController::class, 'getOrderDeliveryTime']);
    Route::get('get_orders_history/{status}', [OrderController::class, 'getOrderHistory']);

    Route::get('statuses', [StatusController::class, 'index']);

    Route::get('favorites/{sort}', [FavoriteController::class, 'index']);
    Route::post('meal_favorite/{meal}', [MealController::class, 'addToFavorite']);
    Route::post('restaurant_favorite/{restaurant}', [RestaurantController::class, 'addToFavorite']);

    Route::get('get_popular_restaurants' , [RestaurantController::class, 'popularRestaurants']);
    Route::get('get_fast_delivery', [RestaurantController::class, 'fastDelivery']);
    Route::get('nearest_restaurants', [RestaurantController::class, 'nearestRestaurants']);
    Route::get('get_popular_meals', [MealController::class, 'popularMeals']);

});

Route::post('check-email', [Usercontroller::class, 'checkEmail']);
Route::post('resend-otp', [Usercontroller::class, 'resendOtp']);
Route::get('/login/{provider}', [AuthController::class,'redirectToProvider']);
Route::get('/login/{provider}/callback', [AuthController::class,'handleProviderCallback']);

Route::post('/message', [MessageController::class, 'broadcast']);


