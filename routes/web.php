<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;

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
// auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginVerify']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('admin')->group(function () {
   Route::get('/', [AdminController::class, 'index'])->name('admin-dashboard');
   
   // footer
   Route::get('/footer', [FooterController::class, 'footer'])->name('footer');
   Route::post('/footer', [FooterController::class, 'footerStore']);

   // pengurus
   Route::get('/teams', [TeamController::class, 'teams'])->name('pengurus');
   Route::post('/teams', [TeamController::class, 'teamStore']);
   Route::delete('/delete/team', [TeamController::class, 'teamDestroy'])->name('teamDelete');

   // visi misi
   Route::get('/visi-misi', [VisiMisiController::class, 'visiMisi'])->name('visi-misi');
   Route::post('/visi-misi', [VisiMisiController::class, 'visiMisiStore'])->name('visiMisiStore');

   // slider
   Route::get('/slider', [SliderController::class,'slider'])->name('slider');
   Route::post('/slider', [SliderController::class,'sliderStore']);
   Route::post('/slider/destroy', [SliderController::class,'destroy'])->name('slider.destroy');

   // about
   Route::get('/about', [AboutController::class, 'about'])->name('about');
   Route::post('/about', [AboutController::class, 'aboutStore'])->name('aboutStore');
   
   // contact
   Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
   Route::post('/contact', [ContactController::class, 'contactStore']);

   // users
   Route::get('/users', [AdminController::class, 'users'])->name('user');
   Route::post('/users', [AdminController::class, 'userStore']);
   Route::delete('/delete/user', [AdminController::class, 'userDestroy'])->name('userDelete');
});