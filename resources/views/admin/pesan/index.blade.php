<!-- resources/views/admin/pesan/index.blade.php -->
@extends('admin.adminmaster')

@section('content')
    <div class="container mt-5">
        <h2>Daftar Pesan</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesans as $pesan)
                    <tr>
                        <td>{{ $pesan->id }}</td>
                        <td>{{ $pesan->user->name }}</td>
                        <td>{{ $pesan->user->email }}</td>
                        <td>{{ $pesan->phone }}</td>
                        <td>{{ $pesan->date }}</td>
                        <td>{{ $pesan->time }}</td>
                        <td>{{ $pesan->note }}</td>
                        <td>
                            <form action="{{ route('pesan.destroy', $pesan->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada pesan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
