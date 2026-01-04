<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Menampilkan daftar menu.
     */
    public function index()
    {
        $menus = Menu::all()->groupBy('kategori');
        return view('admin.menu.index-tailwind', compact('menus'));
    }

    /**
     * Menampilkan form untuk menambahkan menu baru.
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Menyimpan menu baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048', // maksimal 2MB
            ],
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'kategori' => 'required|string|in:Murah,Ekonomi,Premium,Snack,Minuman'
        ], [
            'gambar.required' => 'Gambar harus diunggah.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'title.required' => 'Judul harus diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'harga.required' => 'Harga harus diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'kategori.required' => 'Kategori harus dipilih.',
            'kategori.in' => 'Kategori tidak valid.',
        ]);

        // Simpan gambar
        $gambarPath = $request->file('gambar')->store('public/images/menu');

        Menu::create([
            'gambar' => $gambarPath,
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.menu.index')->with('success', 'Menu added successfully');
    }

    /**
     * Menampilkan form untuk mengedit menu.
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit-tailwind', compact('menu'));
    }

    /**
     * Memperbarui menu yang sudah ada di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'kategori' => 'required|string|in:Murah,Ekonomi,Premium,Snack,Minuman'
        ]);

        $menu = Menu::findOrFail($id);

        // Update gambar jika ada perubahan
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            Storage::delete($menu->gambar);

            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('public/images/menu');
            $menu->gambar = $gambarPath;
        }

        $menu->title = $request->title;
        $menu->deskripsi = $request->deskripsi;
        $menu->harga = $request->harga;
        $menu->kategori = $request->kategori;
        $menu->save();

        return redirect()->route('admin.menu.index')->with('success', 'Menu updated successfully');
    }

    /**
     * Menghapus menu dari database.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        // Hapus gambar dari storage
        Storage::delete($menu->gambar);

        $menu->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Menu deleted successfully');
    }
}
