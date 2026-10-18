<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfileItem;

class ProfilController extends Controller
{
    public function index()
    {
        $profileItems = ProfileItem::orderBy('order')->orderBy('id')->get();
        return view('admin.pages.profil', compact('profileItems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:100',
            'label' => 'required|string|max:150',
            'isi' => 'required|string',
            'keterangan' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        if (!isset($validated['order'])) {
            $validated['order'] = (ProfileItem::max('order') ?? 0) + 1;
        }

        ProfileItem::create($validated);

        return redirect()->route('admin.profil')->with('success', 'Butir data profil berhasil ditambahkan!');
    }

    public function update(Request $request, ProfileItem $profil)
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:100',
            'label' => 'required|string|max:150',
            'isi' => 'required|string',
            'keterangan' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $profil->update($validated);

        return redirect()->route('admin.profil')->with('success', 'Perubahan profil berhasil disimpan!');
    }

    public function destroy(ProfileItem $profil)
    {
        $profil->delete();
        return redirect()->route('admin.profil')->with('success', 'Butir data profil berhasil dihapus!');
    }
}
