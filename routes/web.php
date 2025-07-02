<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AdminInfoController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\StatistikController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::post('/news/{id}/comment', [CommentController::class, 'store'])->middleware('auth')->name('news.comment');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    $credentials = request(['email', 'password']);
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        return $user->is_admin ? redirect()->route('admin.dashboard') : redirect()->route('home');
    }
    return back()->withErrors(['email' => 'password atau email salah']);
})->name('login.post');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function () {
    $data = request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    $data['password'] = bcrypt($data['password']);
    $data['is_admin'] = 0; // Set as regular user
    \App\Models\User::create($data);

    return redirect()->route('login')->with('success', 'Registration successful. Please login.');
})->name('register.post');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.dashboard');
Route::resource('/admin/news', NewsController::class)->middleware('auth')->names([
    'index' => 'admin.news.index',
    'create' => 'admin.news.create',
    'store' => 'admin.news.store',
    'edit' => 'admin.news.edit',
    'update' => 'admin.news.update',
    'destroy' => 'admin.news.destroy',
]);

Route::resource('/admin/notes', NoteController::class)->middleware('auth')->names([
    'index' => 'admin.notes.index',
    'store' => 'admin.notes.store',
    'update' => 'admin.notes.update',
    'destroy' => 'admin.notes.destroy',
]);

Route::get('/admin/profile/edit', [AdminProfileController::class, 'edit'])->middleware('auth')->name('admin.profile.edit');
Route::post('/admin/profile/update', [AdminProfileController::class, 'update'])->middleware('auth')->name('admin.profile.update');
Route::get('/admin/profile', [App\Http\Controllers\AdminProfileController::class, 'show'])->middleware('auth')->name('admin.profile.show');

Route::middleware('auth')->group(function () {
    Route::get('/admin/informasi/edit', [AdminInfoController::class, 'edit'])->name('admin.informasi.edit');
    Route::post('/admin/informasi/update', [AdminInfoController::class, 'update'])->name('admin.informasi.update');
});

Route::get('/admin/users', [AdminUserController::class, 'index'])->middleware('auth')->name('admin.users.index');
Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->middleware('auth')->name('admin.users.destroy');
Route::get('/admin/statistik', [StatistikController::class, 'index'])->middleware('auth')->name('admin.statistik');
