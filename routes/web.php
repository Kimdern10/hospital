<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BlogTopicController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\AppointmentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/doctors/search', [DoctorsController::class, 'search'])->name('doctors.search');

Route::get('/about-us', [UserController::class, 'index'])->name('about');

Route::get('/doctors', [UserController::class, 'doctors'])->name('doctor');

Route::get('/doctors/{slug}', [UserController::class, 'doctorDetail'])->name('doctors.detail');


Route::get('/blog', [UserController::class, 'blog'])->name('blogs');
Route::get('/blog-details/{slug}', [UserController::class, 'show'])->name('blog.details');


Route::get('/departments', [UserController::class, 'departments'])->name('departments');
Route::get('/departments/{slug}', [UserController::class, 'departmentDetails'])->name('departments.details');



// User submits appointment
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');



// register view
Route::get('/sign-up', [UserController::class, 'signUp'])->name('sign-up');

// submit registration from route
Route::post('/create-user', [UserController::class, 'createUser'])->name('create-user');


Route::get('/verify.otp/{email}', [UserController::class, 'showOtpForm'])->name('verify.otp');

Route::post('/verify.otp/{email}/submit', [UserController::class, 'submitOtp'])->name('verify.otp.submit'); // email is fetching from verify otp get it from url

Route::get('/resend.otp/{email}/resend', [UserController::class, 'resendOtp'])->name('resend.otp');


// forgot password view
Route::get('forget-password', [ForgotPasswordController::class, 'forgetPassword'])->name('forgetPassword');

Route::post('forgotpassword', [ForgotPasswordController::class, 'forgotPassword'])->name('forgotPassword.email');

Route::get('confirm-code', [ForgotPasswordController::class, 'confirmCode'])->name('confirmCode.email');

Route::post('submit-password-reset-code', [ForgotPasswordController::class, 'submitPasswordResetCode'])->name('submitPasswordResetCode');

Route::get('/password-reset', [ForgotPasswordController::class, 'passwordReset'])->name('password-reset');


Route::post('/create-new-password', [ForgotPasswordController::class, 'createNewPassword'])->name('create.new-password');

Route::get('/resend.code/{email}/resend', [ForgotPasswordController::class, 'resendCode'])->name('resend.code');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
Route::get('dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');

    
Route::get('blog/posts', [BlogPostController::class, 'index'])->name('blog.posts.index');
Route::get('blog/posts/create', [BlogPostController::class, 'create'])->name('blog.posts.create');
Route::post('blog/posts', [BlogPostController::class, 'store'])->name('blog.posts.store');

// Edit / Update
Route::get('blog/posts/{id}/edit', [BlogPostController::class, 'edit'])->name('blog.posts.edit');
Route::put('blog/posts/{id}', [BlogPostController::class, 'update'])->name('blog.posts.update');

// Soft Delete
Route::delete('blog/posts/{id}', [BlogPostController::class, 'destroy'])->name('blog.posts.destroy');

// Trash Management
Route::get('blog/posts/trash', [BlogPostController::class, 'trash'])->name('blog.posts.trash');
Route::post('blog/posts/{id}/restore', [BlogPostController::class, 'restore'])->name('blog.posts.restore');
Route::delete('blog/posts/{id}/force-delete', [BlogPostController::class, 'forceDelete'])->name('blog.posts.forceDelete');


     Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // Trash
    Route::get('/contacts/trash', [ContactController::class, 'trash'])->name('contacts.trash');
    Route::post('/contacts/{id}/restore', [ContactController::class, 'restore'])->name('contacts.restore');
    Route::delete('/contacts/{id}/force-delete', [ContactController::class, 'forceDelete'])->name('contacts.forceDelete');
  
    
// Departments
Route::get('departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('departments', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

// Trash + Restore + Force delete
Route::get('departments/trash', [DepartmentController::class, 'trash'])->name('departments.trash');
Route::post('departments/{id}/restore', [DepartmentController::class, 'restore'])->name('departments.restore');
Route::delete('departments/{id}/force-delete', [DepartmentController::class, 'forceDelete'])->name('departments.forceDelete');


    Route::get('/doctors', [DoctorController::class, 'index'])->name('index');
    Route::get('/doctors-create', [DoctorController::class, 'create'])->name('create');
    Route::post('/doctors-store', [DoctorController::class, 'store'])->name('store');
    Route::get('/doctors-edit/{id}', [DoctorController::class, 'edit'])->name('edit');
    Route::put('/doctors-update/{id}', [DoctorController::class, 'update'])->name('update');

    // Soft delete
   Route::delete('/{id}', [DoctorController::class, 'destroy'])->name('destroy');
    Route::get('/trashed', [DoctorController::class, 'trashed'])->name('trashed');
    Route::post('/doctors-restore/{id}', [DoctorController::class, 'restore'])->name('restore');
    Route::delete('/doctors-delete/{id}', [DoctorController::class, 'forceDelete'])->name('forceDelete');


  Route::get('specialities', [SpecialityController::class, 'index'])->name('admin.specialities.index');
    Route::get('specialities/create', [SpecialityController::class, 'create'])->name('admin.specialities.create');
    Route::post('specialities', [SpecialityController::class, 'store'])->name('admin.specialities.store');

    // Edit & Update
    Route::get('specialities/{speciality}/edit', [SpecialityController::class, 'edit'])->name('admin.specialities.edit');
    Route::put('specialities/{speciality}', [SpecialityController::class, 'update'])->name('admin.specialities.update');

    // Soft Delete
    Route::delete('specialities/{speciality}', [SpecialityController::class, 'destroy'])->name('admin.specialities.destroy');

    // Trash List
    Route::get('specialities/trash', [SpecialityController::class, 'trash'])->name('admin.specialities.trash');

    // Restore
    Route::post('specialities/{id}/restore', [SpecialityController::class, 'restore'])->name('admin.specialities.restore');

    // Force Delete
    Route::delete('specialities/{id}/force-delete', [SpecialityController::class, 'forceDelete'])->name('admin.specialities.forceDelete');


Route::get('/about', [AboutUsController::class, 'index'])->name('about.index');
Route::get('/about/create', [AboutUsController::class, 'create'])->name('about.create');
Route::post('/about', [AboutUsController::class, 'store'])->name('about.store');
Route::get('/about/{id}/edit', [AboutUsController::class, 'edit'])->name('about.edit');
Route::put('/about/{id}', [AboutUsController::class, 'update'])->name('about.update');
Route::delete('/about/{id}', [AboutUsController::class, 'destroy'])->name('about.destroy');

// Trash, Restore & Force Delete
Route::get('/about/trashed', [AboutUsController::class, 'trashed'])->name('about.trashed');
Route::post('/about/{id}/restore', [AboutUsController::class, 'restore'])->name('about.restore');
Route::delete('/about/{id}/force-delete', [AboutUsController::class, 'forceDelete'])->name('about.forceDelete');
    // Admin views appointments
Route::get('/admin/appointments', [AppointmentsController::class, 'index'])->name('admin.appointments.index');


 Route::get('/topics', [BlogTopicController::class, 'index'])->name('admin.topics.index');

    // Create + Store
    Route::get('/topics/create', [BlogTopicController::class, 'create'])->name('admin.topics.create');
    Route::post('/topics', [BlogTopicController::class, 'store'])->name('admin.topics.store');

    // Edit + Update
    Route::get('/topics/{id}/edit', [BlogTopicController::class, 'edit'])->name('admin.topics.edit');
    Route::put('/topics/{id}', [BlogTopicController::class, 'update'])->name('admin.topics.update');

    // Destroy (soft delete)
    Route::delete('/topics/{id}', [BlogTopicController::class, 'destroy'])->name('admin.topics.destroy');

    // Trash (list of soft deleted topics)
    Route::get('/topics/trash', [BlogTopicController::class, 'trash'])->name('admin.topics.trash');

    // Restore a soft-deleted topic
    Route::post('/topics/{id}/restore', [BlogTopicController::class, 'restore'])->name('admin.topics.restore');

    // Force delete
    Route::delete('/topics/{id}/force-delete', [BlogTopicController::class, 'forceDelete'])->name('admin.topics.forceDelete');

        Route::get('/users', [AdminController::class, 'userList'])->name('user.list');
    Route::patch('user/{user}/ban', [AdminController::class, 'ban'])->name('user.ban');
    Route::patch('user/{user}/unban', [AdminController::class, 'unban'])->name('user.unban');

    Route::get('/users/trashed', [AdminController::class, 'trashedUsers'])->name('users.trashed');


    Route::delete('/users/{user}/delete', [AdminController::class, 'deleteUser'])->name('user.delete');
    Route::patch('/users/{id}/restore', [AdminController::class, 'restoreUser'])->name('user.restore');
    Route::delete('/users/{id}/force-delete', [AdminController::class, 'forceDeleteUser'])->name('user.forceDelete');

});




Route::middleware(['auth'])->prefix('user')->group(function () {
Route::get('dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');




});