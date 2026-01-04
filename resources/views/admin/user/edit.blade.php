@extends('admin.adminmaster')

@section('content')
    <div class="mask d-flex align-items-center h-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-5" style="border: 1px solid #000;">
                        <div class="card-header">
                            <h2>Edit User</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $user->name }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Biarkan tetap kosong jika tidak diubah">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
