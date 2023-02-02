<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// frontend route start // frontend route start // frontend route start // frontend route start // frontend route start // frontend route start
Route::middleware(['auth'])->group(function () {
    Route::get('available-rooms/{checkin_date}', [App\Http\Controllers\Frontend\BookingController::class, 'available_rooms']);
    Route::post('/pay', [App\Http\Controllers\Frontend\BookingController::class, 'redirectToGateway']);
    Route::get('/payment/callback', [App\Http\Controllers\Frontend\BookingController::class, 'handleGatewayCallback'])->name('payment');
});

Route::get('book', [App\Http\Controllers\Frontend\FrontendController::class, 'booking']);
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin route // Admin route // Admin route // Admin route // Admin route // Admin route // Admin route // Admin route
Route::prefix('admin')->group(function () {
    Route::controller(App\Http\Controllers\Admin\RoomController::class)->group(function () {
        Route::get('room-image/{room_image_id}/delete', 'destroyImage');
    });
});
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('admin/dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index']);
    Route::get('roomtype', [App\Http\Controllers\Admin\RoomtypeController::class, 'index']);
    Route::get('create-roomtype', [App\Http\Controllers\Admin\RoomtypeController::class, 'create']);
    Route::post('store-roomtype', [App\Http\Controllers\Admin\RoomtypeController::class, 'store']);
    Route::get('show-roomtype/{id}', [App\Http\Controllers\Admin\RoomtypeController::class, 'show']);
    Route::get('edit-roomtype/{id}', [App\Http\Controllers\Admin\RoomtypeController::class, 'edit']);
    Route::put('update-roomtype/{id}', [App\Http\Controllers\Admin\RoomtypeController::class, 'update']);
    Route::get('delete-roomtype/{id}', [App\Http\Controllers\Admin\RoomtypeController::class, 'destroy']);

    Route::get('room', [App\Http\Controllers\Admin\RoomController::class, 'index']);
    Route::get('create-room', [App\Http\Controllers\Admin\RoomController::class, 'create']);
    Route::post('store-room', [App\Http\Controllers\Admin\RoomController::class, 'store']);
    Route::get('show-room/{id}', [App\Http\Controllers\Admin\RoomController::class, 'show']);
    Route::get('edit-room/{id}', [App\Http\Controllers\Admin\RoomController::class, 'edit']);
    Route::put('update-room/{id}', [App\Http\Controllers\Admin\RoomController::class, 'update']);
    Route::get('delete-room/{id}', [App\Http\Controllers\Admin\RoomController::class, 'destroy']);

    Route::get('department', [App\Http\Controllers\Admin\DepartmentController::class, 'index']);
    Route::get('create-department', [App\Http\Controllers\Admin\DepartmentController::class, 'create']);
    Route::post('store-department', [App\Http\Controllers\Admin\DepartmentController::class, 'store']);
    Route::get('show-department/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'show']);
    Route::get('edit-department/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'edit']);
    Route::put('update-department/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'update']);
    Route::get('delete-department/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'destroy']);

    Route::get('staff', [App\Http\Controllers\Admin\StaffdepartmentController::class, 'index']);
    Route::get('create-staff', [App\Http\Controllers\Admin\StaffdepartmentController::class, 'create']);
    Route::post('store-staff', [App\Http\Controllers\Admin\StaffdepartmentController::class, 'store']);
    Route::get('show-staff/{id}', [App\Http\Controllers\Admin\StaffdepartmentController::class, 'show']);
    Route::get('edit-staff/{id}', [App\Http\Controllers\Admin\StaffdepartmentController::class, 'edit']);
    Route::put('update-staff/{id}', [App\Http\Controllers\Admin\StaffdepartmentController::class, 'update']);
    Route::get('delete-staff/{id}', [App\Http\Controllers\Admin\StaffdepartmentController::class, 'destroy']);

    Route::get('payment/{id}', [App\Http\Controllers\Admin\StaffdepartmentController::class, 'index2']);
    Route::post('store-staffhistory/{id}', [App\Http\Controllers\Admin\StaffdepartmentController::class, 'store2']);
    Route::get('delete-staff/{id}', [App\Http\Controllers\Admin\StaffdepartmentController::class, 'destroy2']);

    Route::get('booking', [App\Http\Controllers\Admin\BookingController::class, 'index']);
    Route::get('create-booking', [App\Http\Controllers\Admin\BookingController::class, 'create']);
    Route::post('store-booking', [App\Http\Controllers\Admin\BookingController::class, 'store']);
    Route::get('booking/available-rooms/{checkin_date}', [App\Http\Controllers\Admin\BookingController::class, 'available_rooms']);
    Route::get('show-booking/{id}', [App\Http\Controllers\Admin\BookingController::class, 'show']);
    Route::get('edit-booking/{id}', [App\Http\Controllers\Admin\BookingController::class, 'edit']);
    Route::put('update-booking/{id}', [App\Http\Controllers\Admin\BookingController::class, 'update']);
    Route::get('delete-booking/{id}', [App\Http\Controllers\Admin\BookingController::class, 'destroy']);

    Route::get('transactions', [App\Http\Controllers\Admin\TranscationController::class, 'index']);

    Route::get('cron', [App\Console\Commands\Paymentupdate::class, 'handle']);
});
