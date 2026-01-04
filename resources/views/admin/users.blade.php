@extends('admin.adminmaster')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">

                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <main id="main" class="main">
                    <div class="pagetitle">
                        <h1>Data Pengguna</h1>
                    </div>
                    <!-- End Page Title -->

                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-3">

                                            <h5 class="card-title">Datatables</h5>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#createUserModal">
                                                Tambah Pengguna
                                            </button>
                                        </div>
                                        <p>
                                            Add lightweight datatables to your project with using the
                                            <a href="https://github.com/fiduswriter/Simple-DataTables"
                                                target="_blank">Simple DataTables</a>
                                            library. Just add <code>.datatable</code> class name to any
                                            table you wish to conver to a datatable. Check for
                                            <a href="https://fiduswriter.github.io/simple-datatables/demos/"
                                                target="_blank">more examples</a>.
                                        </p>

                                        <!-- Table with stripped rows -->
                                        <table class="table table-striped table-hover datatable">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">User Type</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>
                                                            @if ($user->usertype == 1)
                                                                Admin
                                                            @elseif ($user->usertype == 0)
                                                                User
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('edit.user', ['id' => $user->id]) }}"
                                                                class="btn btn-sm btn-warning">Edit</a>
                                                            @if (Auth::user()->usertype == 1)
                                                                @if ($user->usertype == 0)
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
                        </div>
                    </section>
                </main>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Tambah Pengguna Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--  --}}
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="usertype">User Type</label>
                            <select class="form-control" id="usertype" name="usertype" required>
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#createUserModal').on('hidden.bs.modal', function() {
            location.reload();
        });
    });
    // Datatables script
    $(document).ready(function() {
        $('.table').DataTable({
            "lengthMenu": [5, 10, 25, 50, 75, 100], // Pilihan entri per halaman
            "pageLength": 10, // Jumlah entri per halaman default
            "searching": true, // Aktifkan fitur pencarian
            "ordering": true, // Aktifkan pengurutan kolom
            "info": true, // Tampilkan informasi jumlah data
            "autoWidth": false, // Nonaktifkan penyesuaian lebar otomatis
            "language": {
                "paginate": {
                    "previous": '<i class="fas fa-angle-left"></i>',
                    "next": '<i class="fas fa-angle-right"></i>'
                },
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ entri per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "infoFiltered": "(disaring dari _MAX_ total entri)"
            }
        });
    });
</script>
