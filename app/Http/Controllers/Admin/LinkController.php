<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::orderBy('order')->orderBy('id')->get();
        return view('admin.pages.link', compact('links'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'url' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'order' => 'nullable|integer',
        ]);

        if (!isset($validated['order'])) {
            $validated['order'] = (Link::max('order') ?? 0) + 1;
        }

        $validated['is_active'] = true;

        Link::create($validated);

        return redirect()->route('admin.link')->with('success', 'Tautan direktori baru berhasil ditambahkan!');
    }

    public function update(Request $request, Link $link)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'url' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'order' => 'nullable|integer',
        ]);

        $link->update($validated);

        return redirect()->route('admin.link')->with('success', 'Perubahan tautan berhasil disimpan!');
    }

    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('admin.link')->with('success', 'Tautan direktori berhasil dihapus!');
    }
}
