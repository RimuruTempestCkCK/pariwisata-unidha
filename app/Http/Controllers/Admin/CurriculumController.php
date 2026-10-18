<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curriculum;

class CurriculumController extends Controller
{
    public function index()
    {
        $curricula = Curriculum::orderBy('semester')->orderBy('kode')->get();
        return view('admin.pages.kurikulum', compact('curricula'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:50|unique:curricula,kode',
            'nama' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:10',
            'semester' => 'required|integer|min:1|max:8',
            'konsentrasi' => 'required|string|max:100',
            'sifat' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
        ]);

        Curriculum::create($validated);

        return redirect()->route('admin.kurikulum')->with('success', 'Mata kuliah baru berhasil ditambahkan!');
    }

    public function update(Request $request, Curriculum $kurikulum)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:50|unique:curricula,kode,' . $kurikulum->id,
            'nama' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:10',
            'semester' => 'required|integer|min:1|max:8',
            'konsentrasi' => 'required|string|max:100',
            'sifat' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
        ]);

        $kurikulum->update($validated);

        return redirect()->route('admin.kurikulum')->with('success', 'Perubahan mata kuliah berhasil disimpan!');
    }

    public function destroy(Curriculum $kurikulum)
    {
        $kurikulum->delete();
        return redirect()->route('admin.kurikulum')->with('success', 'Mata kuliah berhasil dihapus!');
    }
}
