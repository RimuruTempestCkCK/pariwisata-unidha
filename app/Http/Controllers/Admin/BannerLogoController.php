<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSlide;
use App\Models\Setting;

class BannerLogoController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::orderBy('order')->get();
        $headerTheme = Setting::get('header_theme', 'Midnight Blue');

        return view('admin.pages.banner-logo', compact('slides', 'headerTheme'));
    }

    public function updateSlide(Request $request, HeroSlide $slide)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'eyebrow' => 'nullable|string|max:100',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|string',
            'image_file' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('slides', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        unset($validated['image_file']);
        $slide->update($validated);

        return redirect()->route('admin.banner-logo')->with('success', 'Slide banner berhasil diperbarui!');
    }

    public function updateTheme(Request $request)
    {
        $validated = $request->validate([
            'header_theme' => 'required|string',
        ]);

        Setting::set('header_theme', $validated['header_theme'], 'visual');

        return redirect()->route('admin.banner-logo')->with('success', 'Tema header berhasil diperbarui!');
    }
}
