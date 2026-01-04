@extends('admin.adminmaster')

@section('content')
    <div class="container mt-4">
        <h1>Users</h1>
        <div class="d-flex justify-content-end mb-3">
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->usertype == 1 ? 'Admin' : 'User' }}</td>
                        <td>
                            <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            @if ($user->usertype == '0')
                                <a href="{{ route('admin.user.delete', ['id' => $user->id]) }}"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"
                                    class="btn btn-sm btn-danger">Hapus</a>
                            @else
                                Tidak Bisa Hapus
                            @endif

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
