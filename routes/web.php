<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Home\HomeController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Front\Chat\ChatController;
use App\Http\Controllers\Admin\Admin\AdminController;
use App\Http\Controllers\Admin\Doctor\DoctorController;
use App\Http\Controllers\Admin\Booking\BookingController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Symptom\SymptomController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\FAQ\FAQController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Medicine\MedicineController;
use App\Http\Controllers\Admin\SubCategory\SubCategoryController;
use App\Http\Controllers\Doctor\Auth\AuthController as AuthAuthController;
use App\Http\Controllers\Doctor\Booking\BookingController as DoctorBookingBookingController;
use App\Http\Controllers\Doctor\Dashboard\DashboardController as DashboardDashboardController;
use App\Http\Controllers\Doctor\Profile\ProfileController as DoctorProfileProfileController;
use App\Http\Controllers\Front\Auth\UserAuthController;
use App\Http\Controllers\Front\Home\HomeController as HomeeController;
use App\Http\Controllers\User\Booking\BookingController as BookingBookingController;
use App\Http\Controllers\User\Dashboard\DashboardController;
use App\Http\Controllers\User\Profile\ProfileController as ProfileProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard-admin/login', [AuthController::class, 'index'])
    ->name('auth.index')
    ->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])
    ->name('auth.login');

Route::group([
    'middleware' => ['auth', 'admin'],
    'prefix' => 'admin'
], function () {
    Route::get('/home', [HomeController::class, 'home'])
        ->name('admin.home');
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('auth.logout');
    Route::controller(ProfileController::class)
        ->group(function () {
            Route::get('/update-profile', 'index')
                ->name('admin.profile');
            Route::post('/update-profile', 'update')
                ->name('admin.update_profile');
        });
    Route::controller(CategoryController::class)
        ->group(function () {
            Route::get('/categories', 'index')
                ->name('categories.index');
            Route::get('/categories/show/{category}', 'show')
                ->name('categories.show');
            Route::get('/categories/create', 'create')
                ->name('categories.create');
            Route::post('/categories/store', 'store')
                ->name('categories.store');
            Route::get('/categories/{category}/edit', 'edit')
                ->name('categories.edit');
            Route::post('/categories/{category}/update', 'update')
                ->name('categories.update');
            Route::delete('/categories-delete/{category}', 'destroy')
                ->name('categories.destroy');
        });
    Route::controller(SubCategoryController::class)
        ->group(function () {
            Route::get('/sub-categories', 'index')
                ->name('sub-categories.index');
            Route::get('/sub-categories/show/{subCategory}', 'show')
                ->name('sub-categories.show');
            Route::get('/sub-categories/create', 'create')
                ->name('sub-categories.create');
            Route::post('/sub-categories/store', 'store')
                ->name('sub-categories.store');
            Route::get('/sub-categories/{subCategory}/edit', 'edit')
                ->name('sub-categories.edit');
            Route::post('/sub-categories/{subCategory}/update', 'update')
                ->name('sub-categories.update');
            Route::delete('/sub-categories-delete/{subCategory}', 'destroy')
                ->name('sub-categories.destroy');
        });
    Route::controller(SymptomController::class)
        ->group(function () {
            Route::get('/symptoms', 'index')
                ->name('symptoms.index');
            Route::get('/symptoms/create', 'create')
                ->name('symptoms.create');
            Route::post('/symptoms/store', 'store')
                ->name('symptoms.store');
            Route::get('/symptoms/{symptom}/edit', 'edit')
                ->name('symptoms.edit');
            Route::post('/symptoms/{symptom}/update', 'update')
                ->name('symptoms.update');
            Route::delete('/symptoms-delete/{symptom}', 'destroy')
                ->name('symptoms.destroy');
            Route::post('/symptoms-control-medicine/{symptom}', 'controlMedicine')
                ->name('symptoms.controlMedicine');
        });
    Route::controller(MedicineController::class)
        ->group(function () {
            Route::get('/medicines', 'index')
                ->name('medicines.index');
            Route::get('/medicines/create', 'create')
                ->name('medicines.create');
            Route::post('/medicines/store', 'store')
                ->name('medicines.store');
            Route::get('/medicines/{medicine}/edit', 'edit')
                ->name('medicines.edit');
            Route::post('/medicines/{medicine}/update', 'update')
                ->name('medicines.update');
            Route::delete('/medicines-delete/{medicine}', 'destroy')
                ->name('medicines.destroy');
        });
    Route::controller(DoctorController::class)
        ->group(function () {
            Route::get('/doctors', 'index')
                ->name('doctors.index');
            Route::get('/doctors/create', 'create')
                ->name('doctors.create');
            Route::post('/doctors/store', 'store')
                ->name('doctors.store');
            Route::get('/doctors/{id}/edit', 'edit')
                ->name('doctors.edit');
            Route::post('/doctors/{id}/update', 'update')
                ->name('doctors.update');
            Route::delete('/doctors-delete/{id}', 'destroy')
                ->name('doctors.destroy');
        });
    Route::controller(UserController::class)
        ->group(function () {
            Route::get('/users', 'index')
                ->name('users.index');
            Route::get('/users/create', 'create')
                ->name('users.create');
            Route::post('/users/store', 'store')
                ->name('users.store');
            Route::get('/users/{id}/edit', 'edit')
                ->name('users.edit');
            Route::post('/users/{id}/update', 'update')
                ->name('users.update');
            Route::delete('/users-delete/{id}', 'destroy')
                ->name('users.destroy');
        });
    Route::controller(GalleryController::class)
        ->group(function () {
            Route::get('/galleries', 'index')
                ->name('galleries.index');
            Route::get('/galleries/create', 'create')
                ->name('galleries.create');
            Route::post('/galleries/store', 'store')
                ->name('galleries.store');
            Route::get('/galleries/{gallery}/edit', 'edit')
                ->name('galleries.edit');
            Route::post('/galleries/{gallery}/update', 'update')
                ->name('galleries.update');
            Route::delete('/galleries-delete/{gallery}', 'destroy')
                ->name('galleries.destroy');
        });
    Route::controller(FAQController::class)
        ->group(function () {
            Route::get('/faqs', 'index')
                ->name('faqs.index');
            Route::get('/faqs/create', 'create')
                ->name('faqs.create');
            Route::post('/faqs/store', 'store')
                ->name('faqs.store');
            Route::get('/faqs/{id}/edit', 'edit')
                ->name('faqs.edit');
            Route::post('/faqs/{id}/update', 'update')
                ->name('faqs.update');
            Route::delete('/faqs-delete/{id}', 'destroy')
                ->name('faqs.destroy');
        });
    Route::controller(AdminController::class)
        ->group(function () {
            Route::get('/admins', 'index')
                ->name('admins.index');
            Route::get('/admins/create', 'create')
                ->name('admins.create');
            Route::post('/admins/store', 'store')
                ->name('admins.store');
            Route::get('/admins/{id}/edit', 'edit')
                ->name('admins.edit');
            Route::post('/admins/{id}/update', 'update')
                ->name('admins.update');
            Route::delete('/admins-delete/{id}', 'destroy')
                ->name('admins.destroy');
        });

    Route::controller(ContactController::class)
        ->group(function () {
            Route::get('/messages', 'index')
                ->name('messages.index');
            Route::post('/reply-message', 'replyMessage')
                ->name('messages.reply');
            Route::delete('/messages-delete/{contact}', 'delete')
                ->name('messages.delete');
        });
    Route::controller(BookingController::class)
        ->group(function () {
            Route::get('/bookings', 'index')
                ->name('bookings.index');
            Route::delete('/bookings-delete/{booking}', 'destroy')
                ->name('bookings.destroy');
        });
});

Route::get('/', [HomeeController::class, 'index'])
    ->name('front.home');
Route::get('/get-medicine/{category?}', [HomeeController::class, 'getMedicine'])
    ->name('get.medicine');
    Route::get('/get-symptoms', [HomeeController::class, 'getSymptoms'])
    ->name('getSymptoms');
    Route::get('/get-medicines', [HomeeController::class, 'getMedicines'])
    ->name('getMedicines');
Route::get('/get-sub-categories', [HomeeController::class, 'getSub'])
    ->name('getSub');
Route::get('/get-doctors', [HomeeController::class, 'getDoctors'])
    ->name('getDoctors');
Route::post('/submit-appointment', [HomeeController::class, 'submit'])
    ->name('submitAppointment');
Route::post('/submit-contact', [HomeeController::class, 'contactSubmit'])
    ->name('contactSubmit');



Route::controller(UserAuthController::class)->group(function () {
    Route::get('/login-form', 'index')->name('front.users.login');
    Route::post('/user-login-submit', 'loginSubmit')->name('front.users.loginSubmit');
    Route::get('/register-form', 'register')->name('front.users.register');
    Route::post('/register-submit', 'registerSubmit')->name('front.users.registerSubmit');
    Route::get('/forget-password', 'forgetPassword')->name('front.users.forgetPassword');
    Route::post('/forget-password-submit', 'forgetPasswordSubmit')->name('front.users.forgetPasswordSubmit');
    Route::get('/reset-password', 'resetPassword')->name('front.users.resetPassword');
    Route::post('/reset-password-submit', 'resetPasswordSubmit')->name('front.users.resetPasswordSubmit');
    Route::post('/user-logout-submit', 'logoutSubmit')->name('front.users.logoutSubmit');
});


Route::group([
    'middleware' => ['auth', 'user'],
    'prefix' => 'user'
], function () {
    Route::get('/home', [DashboardController::class, 'index'])
        ->name('user.dashboard.home');
    Route::get('/bookings', [BookingBookingController::class, 'index'])
        ->name('user.bookings.index');
    Route::controller(ProfileProfileController::class)
        ->group(function () {
            Route::get('/my-profile', 'index')
                ->name('user.profile.index');
            Route::post('/update-my-profile', 'update')
                ->name('user.profile.update');
        });
});


Route::controller(AuthAuthController::class)
    ->group(function () {
        Route::get('dashboard-doctor/login', 'login')
            ->name('doctor.auth.login');
        Route::post('/login-submit', 'loginSubmit')
            ->name('doctor.auth.loginSubmit');
        Route::post('/logout-submit', 'logoutSubmit')
            ->middleware('auth', 'doctor')
            ->name('doctor.auth.logoutSubmit');
    });

Route::group([
    'middleware' => ['auth', 'doctor'],
    'prefix' => 'doctor'
], function () {
    Route::get('/home', [DashboardDashboardController::class, 'index'])
        ->name('doctor.dashboard.home');
    Route::controller(DoctorBookingBookingController::class)
        ->group(function () {
            Route::get('/bookings',  'index')
                ->name('doctor.bookings.index');
            Route::post('/reply', 'reply')
                ->name('doctor.bookings.reply');
            Route::delete('/bookings-delete/{booking}', 'destroy')
                ->name('doctor.bookings.destroy');
        });
    Route::controller(DoctorProfileProfileController::class)
        ->group(function () {
            Route::get('/my-profile', 'index')
                ->name('doctor.profile.index');
            Route::post('/update-my-profile', 'update')
                ->name('doctor.profile.update');
        });
});
