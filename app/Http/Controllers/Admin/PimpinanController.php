<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfileItem;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class PimpinanController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $pimpinanItems = ProfileItem::where('kategori', 'Tata Kelola & Pimpinan')
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        return view('admin.pages.pimpinan', compact('settings', 'pimpinanItems'));
    }

    public function updateHeader(Request $request)
    {
        $validated = $request->validate([
            'pimpinan_eyebrow' => 'required|string|max:150',
            'pimpinan_title' => 'required|string|max:200',
            'pimpinan_desc' => 'required|string|max:500',
        ]);

        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.pimpinan')->with('success', 'Header dan pengantar seksi Tata Kelola & Pimpinan berhasil diperbarui!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:150',
            'isi' => 'required|string|max:200',
            'keterangan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'foto_url' => 'nullable|url|max:500',
            'order' => 'nullable|integer',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('pimpinan', 'public');
            $fotoPath = '/storage/' . $path;
        } elseif ($request->filled('foto_url')) {
            $fotoPath = $request->foto_url;
        }

        ProfileItem::create([
            'kategori' => 'Tata Kelola & Pimpinan',
            'label' => $validated['label'],
            'isi' => $validated['isi'],
            'keterangan' => $validated['keterangan'] ?? null,
            'foto' => $fotoPath,
            'order' => $validated['order'] ?? ((ProfileItem::where('kategori', 'Tata Kelola & Pimpinan')->max('order') ?? 0) + 1),
        ]);

        return redirect()->route('admin.pimpinan')->with('success', 'Data pimpinan/dosen berhasil ditambahkan!');
    }

    public function update(Request $request, ProfileItem $pimpinan)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:150',
            'isi' => 'required|string|max:200',
            'keterangan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'foto_url' => 'nullable|url|max:500',
            'order' => 'nullable|integer',
        ]);

        $fotoPath = $pimpinan->foto;
        if ($request->hasFile('foto')) {
            if ($pimpinan->foto && str_starts_with($pimpinan->foto, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $pimpinan->foto);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('foto')->store('pimpinan', 'public');
            $fotoPath = '/storage/' . $path;
        } elseif ($request->filled('foto_url')) {
            $fotoPath = $request->foto_url;
        }

        $pimpinan->update([
            'label' => $validated['label'],
            'isi' => $validated['isi'],
            'keterangan' => $validated['keterangan'] ?? null,
            'foto' => $fotoPath,
            'order' => $validated['order'] ?? $pimpinan->order,
        ]);

        return redirect()->route('admin.pimpinan')->with('success', 'Data pimpinan berhasil diperbarui!');
    }

    public function destroy(ProfileItem $pimpinan)
    {
        if ($pimpinan->foto && str_starts_with($pimpinan->foto, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $pimpinan->foto);
            Storage::disk('public')->delete($oldPath);
        }

        $pimpinan->delete();

        return redirect()->route('admin.pimpinan')->with('success', 'Data pimpinan berhasil dihapus!');
    }
}
