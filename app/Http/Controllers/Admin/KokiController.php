<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Koki;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class KokiController extends Controller
{
    /**
     * Menampilkan daftar koki.
     */
    public function index()
    {
        $kokis = Koki::all();
        return view('admin.koki.index', compact('kokis'));
    }

    /**
     * Menyimpan koki baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
        ]);

        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('public/images/koki', $namaFoto); // Simpan foto ke storage

            Koki::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'foto' => '/storage/images/koki/' . $namaFoto,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'x' => $request->x,
            ]);

            return redirect()->route('admin.koki.index')->with('success', 'Data koki berhasil ditambahkan.');
        }

        return redirect()->back()->withInput()->withErrors(['foto' => 'Foto harus diunggah.']);
    }

    /**
     * Menampilkan form untuk mengedit data koki.
     */
    public function edit($id)
    {
        $koki = Koki::findOrFail($id);
        return view('admin.koki.edit', compact('koki'));
    }

    /**
     * Menyimpan perubahan data koki ke dalam database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
        ]);

        $koki = Koki::findOrFail($id);

        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('public/images/koki', $namaFoto); // Simpan foto ke storage

            // Hapus foto lama jika ada
            if ($koki->foto) {
                Storage::delete($koki->foto);
            }

            $koki->foto = '/storage/images/koki/' . $namaFoto;
        }

        $koki->nama = $request->nama;
        $koki->jabatan = $request->jabatan;
        $koki->instagram = $request->instagram;
        $koki->facebook = $request->facebook;
        $koki->x = $request->x;
        $koki->save();

        return redirect()->route('admin.koki.index')->with('success', 'Data koki berhasil diperbarui.');
    }

    /**
     * Menghapus data koki dari database.
     */
    public function destroy($id)
    {
        $koki = Koki::findOrFail($id);

        // Hapus foto koki jika ada
        if ($koki->foto) {
            Storage::delete($koki->foto);
        }

        $koki->delete();

        return redirect()->route('admin.koki.index')->with('success', 'Data koki berhasil dihapus.');
    }
}
