<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/teams', [HomeController::class, 'teams']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/blog-detail/{id}', [HomeController::class, 'detailBlog']);
Route::get('/contact', [HomeController::class, 'contact']);

Route::prefix('admin')->group(function () {
   Route::get('/', [AdminController::class, 'index'])->name('admin-dashboard');
   // auth
   Route::get('/login', [AuthController::class, 'login'])->name('login');
   Route::post('/login', [AuthController::class, 'loginVerify']);

   // footer
   Route::get('/footer', [AdminController::class, 'footer'])->name('footer');
   Route::post('/footer', [AdminController::class, 'footerStore']);

   // pengurus
   Route::get('/teams', [AdminController::class, 'teams'])->name('pengurus');
   Route::post('/teams', [AdminController::class, 'teamStore']);

   // visi misi
   Route::get('/visi-misi', [AdminController::class, 'visiMisi'])->name('visi-misi');
   Route::post('/visi-misi', [AdminController::class, 'visiMisiStore'])->name('visiMisiStore');

   // slider
   Route::get('/slider', [AdminController::class,'slider'])->name('slider');
   Route::post('/slider', [AdminController::class,'sliderStore']);

   // about
   Route::get('/about', [AdminController::class, 'about'])->name('about');
   Route::post('/about', [AdminController::class, 'aboutStore'])->name('aboutStore');   
});