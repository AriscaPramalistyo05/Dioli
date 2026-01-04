@extends('admin.adminmaster')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Edit Entry</h1>
            </div>
        </div>

        <form action="{{ route('admin.blog.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit-category">Category</label>
                <select class="form-control" id="edit-category" name="category" required>
                    <option value="blog" @if ($blog->category === 'blog') selected @endif>Blog</option>
                    <option value="feedback" @if ($blog->category === 'feedback') selected @endif>Feedback</option>
                </select>
            </div>

            <div id="blog-fields" @if ($blog->category === 'feedback') style="display: none;" @endif>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @if ($blog->foto)
                        <img src="{{ asset('storage/' . $blog->foto) }}" alt="{{ $blog->title }}" style="width: 100px;">
                    @endif
                </div>

                <div class="form-group">
                    <label for="edit-title">Title</label>
                    <input type="text" class="form-control" id="edit-title" name="title"
                        value="{{ $blog->title }}">
                </div>
                <div class="form-group">
                    <label for="edit-content">Content</label>
                    <textarea class="form-control" id="edit-content" name="content" rows="5">{{ $blog->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="edit-date">Date</label>
                    <input type="text" class="form-control" id="edit-date" name="date"
                        value="{{ $blog->date }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
