{{-- @extends('admin.master')
@section('content')
    <div class="col-xxl-4 col-xl-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Pengguna</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (Auth::user()->usertype == '1')
                                        @if ($user->usertype == '0')
                                            <a href="{{ route('delete.user', ['id' => $user->id]) }}"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"
                                                class="btn btn-sm btn-danger">Hapus</a>
                                        @else
                                            Tidak Bisa Hapus
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>



    </div>
@endsection --}}
