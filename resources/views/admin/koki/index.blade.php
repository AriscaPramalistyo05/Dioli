@extends('admin.adminmaster')

@section('content')
    <div class="container">
        <h1>Data Koki</h1>
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createChefModal">
                Tambah Koki
            </button>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Foto</th>
                    <th>Instagram</th>
                    <th>Facebook</th>
                    <th>X</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kokis as $koki)
                    <tr>
                        <td>{{ $koki->nama }}</td>
                        <td>{{ $koki->jabatan }}</td>
                        <td>
                            @if ($koki->foto)
                                <img src="{{ asset($koki->foto) }}" alt="Foto Koki" style="width: 100px; height: auto;">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>{{ $koki->instagram }}</td>
                        <td>{{ $koki->facebook }}</td>
                        <td>{{ $koki->x }}</td>
                        <td>
                            <a href="{{ route('admin.koki.edit', ['id' => $koki->id]) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.koki.delete', ['id' => $koki->id]) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus koki ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Modal Create -->
    <div class="modal fade" id="createChefModal" tabindex="-1" role="dialog" aria-labelledby="createChefModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createChefModalLabel">Tambah Koki</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.koki.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram">
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook">
                        </div>
                        <div class="form-group">
                            <label for="x">X (Pengganti Twitter)</label>
                            <input type="text" class="form-control" id="x" name="x">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
