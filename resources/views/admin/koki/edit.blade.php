@extends('admin.adminmaster')

@section('content')
    <div class="container mt-4">
        <h1>Edit Koki</h1>
        <form action="{{ route('admin.koki.update', ['id' => $koki->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $koki->nama }}" required>
            </div>
            <div class="form-group">
                <label for="position">Jabatan</label>
                <input type="text" class="form-control" id="position" name="position" value="{{ $koki->jabatan }}"
                    required>
            </div>
            <div class="form-group">
                <label for="photo">Foto</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $koki->instagram }}">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $koki->facebook }}">
            </div>
            <div class="form-group">
                <label for="x">X (Pengganti Twitter)</label>
                <input type="text" class="form-control" id="x" name="x" value="{{ $koki->x }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.koki.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
