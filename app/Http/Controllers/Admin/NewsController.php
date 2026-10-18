<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $newsList = News::latest()->get();
        return view('admin.pages.berita', compact('newsList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'image' => 'nullable|string',
            'image_file' => 'nullable|image|max:2048',
            'summary' => 'required|string',
            'content' => 'required|string',
            'tags' => 'nullable|string',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('news', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        if (empty($validated['image'])) {
            $validated['image'] = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1200&q=80';
        }

        unset($validated['image_file']);
        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);
        $validated['date_text'] = now()->translatedFormat('d F Y');
        $validated['is_published'] = true;

        News::create($validated);

        return redirect()->route('admin.berita')->with('success', 'Berita baru berhasil ditambahkan!');
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'image' => 'nullable|string',
            'image_file' => 'nullable|image|max:2048',
            'summary' => 'required|string',
            'content' => 'required|string',
            'tags' => 'nullable|string',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('news', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        unset($validated['image_file']);
        if ($news->title !== $validated['title']) {
            $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);
        }

        $news->update($validated);

        return redirect()->route('admin.berita')->with('success', 'Perubahan berita berhasil disimpan!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus!');
    }
}
