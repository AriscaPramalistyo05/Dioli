@extends('admin.adminmaster')

@section('content')
    <div class="container">
        <h1>Data Blog</h1>
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createBlogModal">
                Add Blog
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
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->content }}</td>
                        <td>{{ $blog->date->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.blog.edit', ['id' => $blog->id]) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.blog.destroy', ['id' => $blog->id]) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for Blog -->
    <div class="modal fade" id="createBlogModal" tabindex="-1" role="dialog" aria-labelledby="createBlogModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createBlogModalLabel">Add Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createBlogForm" action="{{ route('admin.blog.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create-title">Title</label>
                            <input type="text" class="form-control" id="create-title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="create-content">Content</label>
                            <textarea class="form-control" id="create-content" name="content" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="create-date">Date</label>
                            <input type="text" class="form-control" id="create-date" name="date"
                                placeholder="Contoh : April 08, 2020">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
