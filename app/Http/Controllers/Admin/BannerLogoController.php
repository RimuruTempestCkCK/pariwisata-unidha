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
        $siteLogo = Setting::get('site_logo', null);

        return view('admin.pages.banner-logo', compact('slides', 'headerTheme', 'siteLogo'));
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

    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo_file' => 'nullable|image|max:2048',
            'logo_url' => 'nullable|string',
        ]);

        if ($request->hasFile('logo_file')) {
            $path = $request->file('logo_file')->store('branding', 'public');
            Setting::set('site_logo', '/storage/' . $path, 'branding');
        } elseif ($request->filled('logo_url')) {
            Setting::set('site_logo', $request->input('logo_url'), 'branding');
        }

        return redirect()->route('admin.banner-logo')->with('success', 'Logo website berhasil diperbarui!');
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
