<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $fotoNama = time() . '.' . $foto->getClientOriginalExtension();
            $lokasiFoto = storage_path('app/public/images/blog');
            $foto->move($lokasiFoto, $fotoNama);
            $fotoPath = 'storage/' . $fotoNama;
        }

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => date('Y-m-d', strtotime($request->date)),
            'foto' => $fotoPath ?: 'default.jpg', // memberikan nilai default jika $fotoPath kosong
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog entry added successfully.');
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog entry updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog entry deleted successfully.');
    }
}
