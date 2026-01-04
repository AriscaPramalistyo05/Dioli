@extends('admin.adminmaster')

@section('content')
    <div class="container">
        <h1>Edit Menu</h1>
        <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $menu->title }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $menu->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $menu->harga }}"
                    required>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" id="kategori" name="kategori" required>
                    <option value="Murah" {{ $menu->kategori == 'Murah' ? 'selected' : '' }}>Murah
                    </option>
                    <option value="Ekonomi" {{ $menu->kategori == 'Ekonomi' ? 'selected' : '' }}>Ekonomi
                    </option>
                    <option value="Premium" {{ $menu->kategori == 'Premium' ? 'selected' : '' }}>Premium
                    </option>
                    <option value="Snack" {{ $menu->kategori == 'Snack' ? 'selected' : '' }}>Snack</option>
                    <option value="Minuman" {{ $menu->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->title }}" style="width: 100px;">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
