<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Abouts;
use App\Models\Contacts;
use App\Models\Footers;
use App\Models\Teams;
use App\Models\VisiMisies;
use App\Models\Sliders;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    public function index()
    {
        $about = Abouts::get()->last();
        $visimisi = VisiMisies::get()->last();
        $blogs = Blog::orderBy('created_at', 'desc')->limit(3)->get();
        $teams = Teams::orderBy('sort', 'asc')->get();
        $sliders = Sliders::orderBy('sort', 'asc')->get();
        return view('index', compact('about', 'visimisi', 'blogs', 'teams', 'sliders'));
    }
    
    public function about()
    {
        SEOTools::setTitle('Tentang Kami - Mentari Sehat Indonesia Kabupaten Sragen');
        SEOTools::setDescription('Mentari Sehat Indonesia Kabupaten Sragen');
        SEOTools::opengraph()->setUrl(url()->current());
        
        $about = Abouts::get()->last();
        return view('about', compact('about'));
    }

    public function teams()
    {
        $teams = Teams::orderBy('sort', 'asc')->get();
        return view('pengurus', compact('teams'));
    }

    public function blog()
    {
        SEOTools::setTitle('Berita dan Kegiatan');
        SEOTools::setDescription(
            'Berita dan Kegiatan Terbaru dari Mentari Sehat Indonesia Kabupaten Sragen'
        );
        SEOTools::opengraph()->setUrl(url()->current());

        $blogs = Blog::orderBy('created_at', 'desc')->paginate(6);
        return view('blog', compact('blogs'));
    }

    public function detailBlog(Blog $blog)
    {
        SEOTools::setTitle($blog->title);
        SEOTools::setDescription($blog->description);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage($blog->image);
        SEOTools::addImages(url('storage/'.$blog->image));
        
        return view('blog-detail', compact('blog'));
    
    }

    public function contact()
    {
        $contact = Contacts::get()->last();
        return view('contact', compact('contact'));
    }
}
