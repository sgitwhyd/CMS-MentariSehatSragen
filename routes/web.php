<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Models\Blog;
use Illuminate\Support\Carbon;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

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
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('habout');
Route::get('/pengurus', [HomeController::class, 'teams'])->name('teams');
Route::get('/blogs', [HomeController::class, 'blog'])->name('blogs');
Route::get('/blog/{blog:slug}', [HomeController::class, 'detailBlog']);
Route::get('/kontak-kami', [HomeController::class, 'contact'])->name('hcontact');

// auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginVerify']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    // footer
    Route::get('/footer', [FooterController::class, 'footer'])->name('footer');
    Route::post('/footer', [FooterController::class, 'footerStore']);

    // pengurus
    Route::get('/pengurus', [TeamController::class, 'teams'])->name('pengurus');
    Route::post('/pengurus', [TeamController::class, 'teamStore']);
    Route::get('/edit-team', [TeamController::class, 'edit'])->name('edit-team');
    Route::put('/update-team', [TeamController::class, 'update'])->name('update-team');
    Route::delete('/delete/team', [TeamController::class, 'teamDestroy'])->name('teamDelete');

    // visi misi
    Route::get('/visi-misi', [VisiMisiController::class, 'visiMisi'])->name('visi-misi');
    Route::post('/visi-misi', [VisiMisiController::class, 'visiMisiStore'])->name('visiMisiStore');

    // slider
    Route::get('/slider', [SliderController::class,'slider'])->name('slider');
    Route::post('/slider', [SliderController::class,'sliderStore']);
    Route::get('/slider-edit', [SliderController::class,'edit'])->name('edit-slider');
    Route::put('/slider-update', [SliderController::class,'update'])->name('slider-update');
    Route::post('/slider/destroy', [SliderController::class,'destroy'])->name('slider.destroy');

    // about
    Route::get('/tentang-kami', [AboutController::class, 'about'])->name('about');
    Route::post('/tentang-kami', [AboutController::class, 'aboutStore'])->name('aboutStore');
   
    // contact
    Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
    Route::post('/contact', [ContactController::class, 'contactStore']);


    // berita dan kegiatan
    Route::get('/berita-dan-kegiatan', [BlogController::class, 'index'])->name('berita-dan-kegiatan');
    Route::get('/berita-dan-kegiatan/create', [BlogController::class, 'create'])->name('berita-dan-kegiatan-create');
    Route::post('/berita-dan-kegiatan/create', [BlogController::class, 'store'])->name('berita-dan-kegiatan-store');
    Route::delete('/berita-dan-kegiatan-delete/{blog:id}', [BlogController::class, 'destroy'])->name('berita-dan-kegiatan-delete');
    Route::get('/berita-dan-kegiatan/edit/{blog:id}', [BlogController::class, 'edit'])->name('berita-dan-kegiatan-edit');
    Route::post('/berita-dan-kegiatan/edit/{id}', [BlogController::class, 'update'])->name('berita-dan-kegiatan-update');

    // profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/update-password', [ProfileController::class, 'changePassword'])->name('change-pass');
});

Route::get('/sitemap', function () {
    $blog = Blog::all();
    $sitemap = SitemapGenerator::create(env('APP_URL'))
   ->getSitemap()
   ->add(Url::create(env('APP_URL'))
        ->setLastModificationDate(Carbon::yesterday())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        ->setPriority(0.1));

    foreach ($blog as $b) {
        $sitemap->add(Url::create("/blog/". $b->slug)
          ->setLastModificationDate(Carbon::yesterday())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        ->setPriority(0.1));
    }
   
    $sitemap->writeToFile(public_path('sitemap.xml'));



    $url = url('sitemap.xml');

    return redirect($url);
});