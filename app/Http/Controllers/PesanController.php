<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use Carbon\Carbon;

class PesanController extends Controller
{
    // Menampilkan daftar pesan
    public function index()
    {
        $pesans = Pesan::all(); // Ambil semua pesan dari database
        return view('admin.pesan.index', compact('pesans'));
    }

    // Menampilkan form untuk membuat pesan baru
    public function create()
    {
        return view('admin.pesan.create');
    }

    // Menyimpan data pesan baru dan mengarahkan ke WhatsApp
    public function store(Request $request)
    {
        $rules = [
            'phone' => 'required',
            'date' => 'required|date_format:m/d/Y',
            'time' => 'required|date_format:H:i',
            'note' => 'required',
        ];

        $messages = [
            'phone.required' => 'Nomor telepon wajib diisi!',
            'date.required' => 'Tanggal wajib diisi!',
            'date.date_format' => 'Format tanggal tidak valid!',
            'time.required' => 'Waktu wajib diisi!',
            'time.date_format' => 'Format waktu tidak valid!',
            'note.required' => 'Catatan wajib diisi!',
        ];

        $validatedData = $request->validate($rules, $messages);

        // Mengonversi format tanggal dari MM/DD/YYYY ke YYYY-MM-DD
        $validatedData['date'] = Carbon::createFromFormat('m/d/Y', $validatedData['date'])->format('Y-m-d');

        // Simpan data pesan ke database
        Pesan::create($validatedData + ['user_id' => $request->user_id]);

        // Buat URL WhatsApp dengan data pesan
        $whatsappUrl = 'https://api.whatsapp.com/send?phone=6285789173041&text=' .
            urlencode('Halo Schizo, saya ingin melakukan reservasi dengan detail berikut:') . '%0A' .
            urlencode('Nama: ' . ($request->user_id ? auth()->user()->name : '')) . '%0A' .
            urlencode('Email: ' . ($request->user_id ? auth()->user()->email : '')) . '%0A' .
            urlencode('Phone: ' . $validatedData['phone']) . '%0A' .
            urlencode('Date: ' . $validatedData['date']) . '%0A' .
            urlencode('Time: ' . $validatedData['time']) . '%0A' .
            urlencode('Note: ' . $validatedData['note']) . '%0A' .
            urlencode('Mohon dibantu, terimakasih.');

        // Redirect ke URL WhatsApp
        return redirect()->to($whatsappUrl);
    }

    // Menampilkan detail pesan
    public function show($id)
    {
        $pesan = Pesan::findOrFail($id);
        return view('admin.pesan.show', compact('pesan'));
    }

    // Menampilkan form untuk mengedit pesan
    public function edit($id)
    {
        $pesan = Pesan::findOrFail($id);
        return view('admin.pesan.edit', compact('pesan'));
    }

    // Memperbarui data pesan
    public function update(Request $request, $id)
    {
        $pesan = Pesan::findOrFail($id);

        $rules = [
            'phone' => 'required',
            'date' => 'required|date_format:m/d/Y',
            'time' => 'required|date_format:H:i',
            'note' => 'required',
        ];

        $messages = [
            'phone.required' => 'Nomor telepon wajib diisi!',
            'date.required' => 'Tanggal wajib diisi!',
            'date.date_format' => 'Format tanggal tidak valid!',
            'time.required' => 'Waktu wajib diisi!',
            'time.date_format' => 'Format waktu tidak valid!',
            'note.required' => 'Catatan wajib diisi!',
        ];

        $validatedData = $request->validate($rules, $messages);

        // Mengonversi format tanggal dari MM/DD/YYYY ke YYYY-MM-DD
        $validatedData['date'] = Carbon::createFromFormat('m/d/Y', $validatedData['date'])->format('Y-m-d');

        // Update data pesan
        $pesan->update($validatedData);

        return redirect()->route('pesan.index')->with('success', 'Data berhasil diperbarui');
    }

    // Menghapus pesan
    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();

        return redirect()->route('pesan.index')->with('success', 'Data berhasil dihapus');
    }
}
