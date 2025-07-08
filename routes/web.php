<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\Admin\MaterialAdminController;
use App\Http\Controllers\Admin\NoteController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['login' => true, 'register' => false]);

Route::get('/register-admin', [RegisterController::class, 'showAdminRegisterForm'])->name('register.admin');
Route::post('/register-admin', [RegisterController::class, 'registerAdmin'])->name('register.admin.post');

Route::get('/register-user', [RegisterController::class, 'showUserRegisterForm'])->name('register.user');
Route::post('/register-user', [RegisterController::class, 'registerUser'])->name('register.user.post');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/user/waiting', function () {
    return view('user.waiting');
})->name('user.waiting');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::post('/admin/approve/{id}', [HomeController::class, 'approveUser'])->name('admin.approve');
    Route::resource('videos', VideoController::class);
    Route::put('/videos/{id}/restore', [VideoController::class, 'restore'])->name('videos.restore');
    Route::delete('/videos/{id}/force-delete', [VideoController::class, 'forceDelete'])->name('videos.forceDelete');

    Route::get('/admin/materials', [MaterialAdminController::class, 'index'])->name('admin.materials.index');
    Route::get('/admin/materials/create', [MaterialAdminController::class, 'create'])->name('admin.materials.create');
    Route::post('/admin/materials', [MaterialAdminController::class, 'store'])->name('admin.materials.store');
    Route::get('/admin/materials/{material}/edit', [MaterialAdminController::class, 'edit'])->name('admin.materials.edit');
    Route::put('/admin/materials/{material}', [MaterialAdminController::class, 'update'])->name('admin.materials.update');
    Route::delete('/admin/materials/{material}', [MaterialAdminController::class, 'destroy'])->name('admin.materials.destroy');

    Route::get('/admin/notes', [NoteController::class, 'index'])->name('admin.notes.index');
    Route::get('/admin/notes/create', [NoteController::class, 'create'])->name('admin.notes.create');
    Route::post('/admin/notes', [NoteController::class, 'store'])->name('admin.notes.store');
    Route::get('/admin/notes/{note}/edit', [NoteController::class, 'edit'])->name('admin.notes.edit');
    Route::put('/admin/notes/{note}', [NoteController::class, 'update'])->name('admin.notes.update');
    Route::delete('/admin/notes/{note}', [NoteController::class, 'destroy'])->name('admin.notes.destroy');
});

Route::middleware(['auth', 'checkUser'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MaterialController::class, 'index'])->name('user.dashboard');
    Route::get('/materials', [MaterialController::class, 'userMaterials'])->name('materials.user');
    Route::get('/materials/{material}', [MaterialController::class, 'show'])->name('materials.show');
    Route::get('/materials/{material}/download', [MaterialController::class, 'download'])->name('materials.download');
    Route::resource('grades', GradeController::class)->middleware('auth');
    Route::resource('curricula', CurriculumController::class)->middleware('auth');
});