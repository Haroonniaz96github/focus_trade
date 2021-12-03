<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Auth\AdminResetPasswordController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\UsersController;

use App\Http\Controllers\User\UserController;


Route::get('/clear',function(){
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
});
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('logout', [LoginController::class, 'logout']);
//Route::get('register', [Auth\RegisterController::class, 'reg']);

Route::group([
    'middleware'    => ['auth'],
    'prefix'        => 'user',
    'namespace'     => 'User'
], function ()
{
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile-setting', [UserController::class, 'profileSetting'])->name('user.profile');
    Route::post('/profile-setting', [UserController::class, 'updateProfile'])->name('user.profile');
    Route::get('/cache-clear', [UserController::class, 'configCache'])->name('user.cache_clear');

    Route::get('/notifications', [UserController::class, 'notifications'])->name('user.notifications');
});

Route::group([
    'prefix'        => 'admin',
    'namespace'     => 'Admin'
], function () {
    Route::get('/login',  [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // Password reset routes
    Route::post('/password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('/password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/password/reset', [AdminResetPasswordController::class, 'reset'])->name('admin.password.update');
    Route::get('/password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
});
Route::group([
    'middleware'    => ['auth:admin'],
    'prefix'        => 'admin',
    'namespace'     => 'Admin'
], function ()
{
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile',  [AdminController::class, 'edit'])->name('admin-profile');
    Route::post('/admin-update',  [AdminController::class, 'update'])->name('admin-update');


    //Setting Routes
    Route::resource('/setting', 'SettingController');
    Route::get('/cache-clear', [AdminController::class,'configCache'])->name('admin.cache_clear');

    //User Routes
    Route::resource('/users', 'UsersController');
    Route::get('users/edit/{id}', [UsersController::class,'edit'])->name('admin-edit');
    Route::post('get-users',  [UsersController::class,'getUsers'])->name('admin.getUsers');
    Route::post('get-user', [UsersController::class,'userDetail'])->name('admin.getUser');
    Route::get('users/delete/{id}',  [UsersController::class,'destroy'])->name('user-delete');
    Route::post('delete-selected-users',  [UsersController::class,'DeleteSelectedUsers'])->name('delete-selected-users');
    Route::get('edit-profile/{id}',  [UsersController::class,'show'])->name('edit-profile');


    //User Routes

    Route::resource('/messages', 'MessageController');
    Route::get('messages/edit/{id}', [MessageController::class,'edit'])->name('admin.edit_message');
    Route::post('get-messages',  [MessageController::class,'getMessages'])->name('admin.getMessages');
    Route::post('get-message', [MessageController::class,'messageDetail'])->name('admin.getMessage');
    Route::get('messages/delete/{id}',  [MessageController::class,'destroy'])->name('admin.deleteMessage');
    Route::post('delete-selected-messages',  [MessageController::class,'deleteSelectedMessages'])->name('admin.deleteSelectedMessages');
});

