<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\HeroSlide;
use App\Models\Curriculum;
use App\Models\ProfileItem;
use App\Models\LandingElement;
use App\Models\Setting;

class PublicController extends Controller
{
    public function home()
    {
        $slides = HeroSlide::where('is_active', true)->orderBy('order')->get();
        $latestNews = News::where('is_published', true)->latest()->take(3)->get();
        $landingElements = LandingElement::where('status', 'Aktif')->get()->keyBy('parameter');

        return view('pages.home', compact('slides', 'latestNews', 'landingElements'));
    }

    public function profil()
    {
        $profileItems = ProfileItem::orderBy('order')->get();
        return view('pages.profil', compact('profileItems'));
    }

    public function akademik()
    {
        $curricula = Curriculum::orderBy('semester')->orderBy('kode')->get();
        return view('pages.akademik', compact('curricula'));
    }

    public function kemahasiswaan()
    {
        return view('pages.kemahasiswaan');
    }

    public function berita()
    {
        $newsList = News::where('is_published', true)->latest()->paginate(9);
        return view('pages.berita', compact('newsList'));
    }

    public function detailBerita(string $slug)
    {
        $news = News::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $relatedNews = News::where('id', '!=', $news->id)
            ->where('is_published', true)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.detail-berita', compact('news', 'relatedNews'));
    }

    public function kontak()
    {
        return view('pages.kontak');
    }

    public function link()
    {
        return view('pages.link');
    }

    public function spmb()
    {
        return view('pages.spmb');
    }
}
