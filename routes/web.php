<?php


use Illuminate\Http\Request;
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
Route::get('/', [\App\Http\Controllers\BlogController::class, 'AllBlogs'])->name('all-blogs');

Route::get('/login', function () {
    return view('login');
})->name('login')
    ->middleware('guest');

Route::get('/register', function () {
    return view('register');
})->name('register')
    ->middleware('guest');

Route::post('/register/user', [\App\Http\Controllers\MainController::class, 'Register'])->name('register-user')
    ->middleware('guest');

Route::get('/home', function () {
    return view('home');
})->name('home')
    ->middleware('auth');

Route::post('log-in', [\App\Http\Controllers\MainController::class, 'LogIn'])->name('log-in')
    ->middleware('guest');

Route::get('log-out', [\App\Http\Controllers\MainController::class, 'LogOut'])->name('log-out')
    ->middleware('auth');


Route::name('blog.')->group(function () {
    Route::get('/myblogs', [\App\Http\Controllers\BlogController::class, 'MyBlogs'])->name('my')->middleware('auth');

    Route::get('/blog/{slug}', [\App\Http\Controllers\BlogController::class, 'BlogView'])->name('blog-view');

    Route::get('/blog-update', [\App\Http\Controllers\BlogController::class, 'ShowBlogForm'])->name('blog-form')
        ->middleware('auth');

    Route::match(['GET', 'POST'], 'blog/update/{slug}', [\App\Http\Controllers\BlogController::class, 'BlogUpdate'])->name('blog-update')
        ->middleware('auth');

    Route::post('/new-blog/create', [\App\Http\Controllers\BlogController::class, "CreateBlog"])->name('blog-create')
        ->middleware('auth');

});






