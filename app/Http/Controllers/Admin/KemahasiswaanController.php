<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class KemahasiswaanController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.pages.kemahasiswaan', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value ?? '', 'group' => 'kemahasiswaan']
            );
        }

        return redirect()->route('admin.kemahasiswaan')->with('success', 'Konten Kemahasiswaan & HIMPAR berhasil diperbarui!');
    }
}
