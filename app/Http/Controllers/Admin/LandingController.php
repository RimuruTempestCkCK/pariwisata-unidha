<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingElement;

class LandingController extends Controller
{
    public function index()
    {
        $elements = LandingElement::all();
        return view('admin.pages.landing', compact('elements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'seksi' => 'required|string|max:100',
            'parameter' => 'required|string|max:150',
            'konten' => 'required|string',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
        ]);

        LandingElement::create($validated);

        return redirect()->route('admin.landing')->with('success', 'Elemen landing page baru berhasil ditambahkan!');
    }

    public function update(Request $request, LandingElement $element)
    {
        $validated = $request->validate([
            'seksi' => 'required|string|max:100',
            'parameter' => 'required|string|max:150',
            'konten' => 'required|string',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
        ]);

        $element->update($validated);

        return redirect()->route('admin.landing')->with('success', 'Perubahan elemen landing page berhasil disimpan!');
    }

    public function destroy(LandingElement $element)
    {
        $element->delete();
        return redirect()->route('admin.landing')->with('success', 'Elemen landing page berhasil dihapus!');
    }
}
