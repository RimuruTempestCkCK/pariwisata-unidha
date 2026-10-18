<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Curriculum;
use App\Models\HeroSlide;
use App\Models\LandingElement;
use App\Models\ProfileItem;

class DashboardController extends Controller
{
    public function index()
    {
        $totalNews = News::count();
        $totalCurricula = Curriculum::count();
        $totalSlides = HeroSlide::count();
        $recentNews = News::latest()->take(5)->get();

        return view('admin.pages.dashboard', compact(
            'totalNews',
            'totalCurricula',
            'totalSlides',
            'recentNews'
        ));
    }
}
